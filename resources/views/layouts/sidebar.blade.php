<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="{{ asset('js/fontawesome.js') }}"></script>

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Sample Q/A') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ url('/profile/'.Auth::user()->username) }}">Dashboard</a>
                                  <a class="dropdown-item" href="{{ url('/profile/'.Auth::user()->username.'/edit') }}">Edit Profile</a>
                                  @if(Auth::user()->hasRole('admin'))
                                    <a class="dropdown-item" href="{{ url('/channels/create') }}">
                                        Add Channel
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/countries/create') }}">
                                      Add Country
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/todos/create') }}">
                                      Add TODO
                                    </a>
                                  @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
        <div class="container-fluid">
          <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
              <div class="sidebar-sticky">
                <ul class="nav flex-column">
                  @auth
                  <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/discussions/create') }}">
                      <span data-feather="home"></span>
                      <i class="fa fa-plus"></i> Create Thread <span class="sr-only"></span>
                    </a>
                  </li>
                  @endauth
                  <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/discussions') }}">
                      <span data-feather="home"></span>
                      <i class="fa fa-th-list"></i> All Threads <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/discussions/threads') }}">
                      <span data-feather="layers"></span>
                      <i class="fa fa-question"></i> &nbsp;My Threads
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/discussions/participations') }}">
                      <span data-feather="layers"></span>
                      <i class="fa fa-hand-paper-o"></i> My Participations
                    </a>
                  </li>
                  @endauth
                  <li class="nav-item">
                    <a class="nav-link" href="/discussions/solved">
                      <span data-feather="file"></span>
                      <i class="fa fa-check"></i> Solved
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/discussions/unsolved">
                      <span data-feather="shopping-cart"></span>
                      <i class="fa fa-times"></i> Unsolved
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/discussions/noreplies">
                      <span data-feather="users"></span>
                      <i class="fa fa-minus"></i> No Replies Yet
                    </a>
                  </li>
                </ul>
              </div>
            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-4" style="padding-top: 10px">
                @include('inc.messages')
                @yield('content')
            </main>
          </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popover.min.js') }}"></script>
    <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
</body>
</html>
