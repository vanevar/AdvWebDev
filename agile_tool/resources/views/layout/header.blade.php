<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">Advanced Web Development</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                <!--
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                -->
    
                <!-- Authentication Links -->
                @guest
                <li class="nav-item active" >
                    <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active" >
                    <a class="nav-link" href="{{ route('register') }}">Register <span class="sr-only">(current)</span></a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="#" >
                        Welcome, {{ Auth::user()->firstname }} 
                    </a>
                </li>
                <li class="nav-item active">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                </li>
                @endguest
    
            </div>
      </nav>
    </header>