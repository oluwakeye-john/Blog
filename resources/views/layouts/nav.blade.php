<!--Navbar-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top scrolling-navbar">
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="{{ route('home') }}">Blog</a>
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">
            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#contact_form">Contact Us</a>
                </li>
                <!-- Dropdown -->

                @if(Auth::check())
                    <li class="nav-item dropdown multi-level-dropdown">
                        <a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle w-100">Admin</a>
                        <ul class="dropdown-menu mt-2 rounded-0  border-0 z-depth-1">

                            <li class="dropdown-item dropdown-submenu p-0">
                                <a href="{{ route('new') }}" class="text-dark w-100">Add Blog </a>
                            </li>

                            <li class="dropdown-item dropdown-submenu p-0">
                                <a href="{{ route('all') }}" class="text-dark w-100">All Blogs</a>
                            </li>

                            <li class="dropdown-item dropdown-submenu p-0">
                                <a href="{{ route('feedback') }}" class="text-dark w-100">Feedbacks</a>
                            </li>

                            <li class="dropdown-item dropdown-submenu  p-0">
                                <a class="text-dark w-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('search_form').submit()" class="text-dark w-100">Logout</a>
                                <form method="post" action="{{ route('logout') }}" id="search_form">
                                    @method('post')
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif


            </ul>
            <!-- Links -->
            <form class="form-inline" method="get" action="{{ route('home') }}">
                <div class="md-form my-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search for blog..." value="{{ $search ?? '' }}" name="search" aria-label="Search">
                </div>
            </form>
        </div>
        <!-- Collapsible content -->
    </div>
</nav>
<!--/.Navbar-->
