<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('categories')}}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                </li>
                @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.subcategories', [$category->id])}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>

            <div class="d-sm-none">
                <form id="search-form-small" class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="POST" role="search">
                    @csrf
                    <div class="input-group">
                        <label class="sr-only" for="searchFormInputSmall">{{__('Search')}}</label>
                        <input id="searchFormInputSmall" class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <!--Divider-->
            <hr class="my-2">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('dashboard')}}">{{__('Profile')}}</a>

                            <!--Divider-->
                            <hr class="my-0 mx-2">

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); $('#logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light d-none d-md-block">
    <div class="container-fluid">
        <form id="search-form" class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="POST" role="search">
            @csrf
            <div class="input-group">
                <label class="sr-only" for="searchFormInput">Search</label>
                <input id="searchFormInput" name="searchValue" class="form-control" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</nav>


