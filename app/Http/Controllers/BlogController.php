<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Feedback;
use App\Subscribe;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        if (isset($search) && $search != ""){
            $blogs = Blog::where('Title', 'LIKE', "%". $search . "%")->where('published', "=", "1")->orderBy('created_at', "DESC")->paginate(15);
            $message = "Search result for '" . $search . "'";
            return view('Blog/home')->with('blogs', $blogs)->with('message', $message)->with('search', $search);
        }
        else{
            $blogs = Blog::select("*")->where('published', "=", "1")->orderBy('created_at', "DESC")->paginate(15);
            $message = "Recent Posts";
            return view('Blog/home')->with('blogs', $blogs)->with('message', $message);
        }
    }

    public function create(){
        return view('Blog/new');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'contents' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $is_published = 0;

        if(!isset($request->published)){
            $is_published = 0;
        }
        else{
            $is_published = $request->published;
        }

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->image  = $imageName;
        $blog->content = $request->contents;
        $blog->published = $is_published;

        $blog->save();

        return redirect(route('home'))->with('successMsg', "Blog created");
    }

    public function detail(Request $request){
        $blog_id = $request->blog_id;

        if (isset($blog_id) && $blog_id != 0){
            $blog = Blog::where("id", "=", $blog_id)->where('published', "=", "1")->get();
            if (sizeof($blog) > 0){
                $blog = $blog[0];
            }
            else{
                return redirect(route('home'));
            }
            return view('Blog/detail')->with('blog', $blog);
        }
    }

    public function edit(Request $request){
        $blog_id = $request->blog_id;

        if (isset($blog_id) && $blog_id != 0){
            $blog = Blog::where("id", "=", $blog_id)->get();
            $blog = $blog[0];
            if ($blog) {
                return view('Blog/edit')->with('blog', $blog);
            }
            else{
                return redirect(route('home'));
            }
        }
    }

    public function update(Request $request){
        $blog_id = $request->blog_id;

        $this->validate($request, [
            'title' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'contents' => 'required',
        ]);

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $is_published = 0;

        if(!isset($request->published)){
            $is_published = 0;
        }
        else{
            $is_published = $request->published;
        }

        $blog = Blog::find($blog_id);

        $blog->title = $request->title;

        if(isset($request->image)){
            $blog->image  = $imageName;
        }

        $blog->content = $request->contents;
        $blog->published = $is_published;

        $blog->save();
        return redirect(route('detail', $blog_id))->with('successMsg', "Blog Updated");


    }

    public function all(){
        $blogs = Blog::select('*')->orderBy('created_at', "DESC")->paginate(15);
        return view('Blog/all')->with('blogs', $blogs);
    }

    public function contact(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $feedback = new Feedback;
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->subject = $request->subject;
        $feedback->message = $request->message;

        $feedback->save();

        return redirect('home')->with('successMsg', "Feedback sent successfully");
    }

    public function feedback(){
        $feedbacks = Feedback::select('*')->orderBy('created_at', "DESC")->paginate(15);
        return view('Blog/feedback_list')->with('feedbacks', $feedbacks);
    }

    public function delete(Request $request){
        $blog_id = $request->blog_id;

        if (isset($blog_id) && $blog_id != 0){
            $blog = Blog::find($blog_id);
            $blog->delete();

            return redirect(route('all'))->with('successMsg', 'Blog Deleted');
        }
    }


    public function subscribe(Request $request){
        $email = $request->email;
        if (Subscribe::find($email)) {
            $sub = new Subscribe();

            $sub->email = $email;
            $sub->save();

            return redirect(route('home'))->with('successMsg', 'Subscribed');
        }
        else{
            return redirect(route('home'))->with('successMsg', 'You are already subscribed');
        }


    }
}
