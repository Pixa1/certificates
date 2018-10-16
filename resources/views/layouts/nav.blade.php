    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-1 col-md-1 col-lg-1 mr-0" href="/">S&T</a>
        <ul class="nav px-3"> 
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
{{--                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li> --}}
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-1 d-none d-sm-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">
                  <span data-feather="home"></span>
                  Certifikati <span class="sr-only">(current)</span>
                </a>
              </li>
              @if (Auth::check() && Auth::user()->hasPermissionto('Manage Certificates'))
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/create') }}">
                  <span data-feather="file"></span>
                  Add new
                </a>
              </li>
              @endif
              @if (Auth::check() && Auth::user()->hasPermissionto('Administer roles & permissions'))
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin') }}">
                  <span data-feather="settings"></span>
                  Admin
                </a>
              </li>
              @endif
              
            </ul>

          </div>
        </nav>