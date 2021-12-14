    <nav class="navbar navbar-expand-sm navbar-dark fixed-top text-bold" style="background-color: #7868E6">
        <div class="container">
        <a class="navbar-brand" href="#"><img class="image-flex"  src="{{asset('/webinar/logo.svg')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2  mb-md-0">
                
                <li class="nav-item ">
                    <a class="nav-link {{(Request::is('/') ? 'active':'')}}" aria-current="page" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(Request::is('webinar-if*') ? 'active':'')}}" href="{{route('webinar')}}">Webinar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(Request::is('') ? 'active':'')}}" href="#">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(Request::is('') ? 'active':'')}}" href="#">About</a>
                </li>
                @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link {{(Request::is('login') ? 'active':'')}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{(Request::is('register') ? 'active':'')}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (auth()->user()->hasRole('Admin'))
                                        <a class="dropdown-item" href="{{route('admin.')}}">Dashboard</a>
                                    @endif
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                
            </ul>
            
        </div>
        </div>
    </nav>