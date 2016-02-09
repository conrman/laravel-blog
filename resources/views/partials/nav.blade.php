<nav class="navbar">
    <div class="container">
        <div class="navbar-header">

            {{-- Hamburger! --}}
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app_navbar_collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{-- Branding Image --}}
            <a class="navbar-brand" href="{{ url('/') }}">
                Blog
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app_navbar_collapse">
            
            {{-- Left Side Of Navbar --}}
            <ul class="nav navbar-nav">
                @unless ($tags)
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                            Tags <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach ($tags as $tag)
                                <li><a href="{{ url('/tags/'. $tag->name) }}">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endunless
            </ul>

            {{-- Right Side Of Navbar --}}
            <ul class="nav navbar-nav navbar-right">

                {{-- Authentication Links --}}
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/user/' . Auth::user()->id) . '/profile' }}"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li><div><a class="btn btn-primary btn-icon" href="{{ action('PostsController@create') }}" title="Create Post"><i class="fa fa-pencil"></i> <span class="hidden-md hidden-sm hidden-xs">Create Post</span></a></div></li>
                @endif
            </ul>
        </div>
    </div>
</nav>