<?php

namespace App\Http\Controllers;

use App\Carosel;
use Illuminate\Http\Request;

class LookController extends Controller
{
    public function index(){
        $carosels = Carosel::all();
        return view('Blog/look', compact('carosels'));
    }
}
