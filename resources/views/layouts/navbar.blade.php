<nav class="navbar navbar-expand-sm bg-black navbar-dark">
    <div class="container">
        <a class="navbar-brand text-white" href="/">Klub statočných turistov</a>
        <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('hikes.index', ['category_id'=>1]) }}">Vysoké Tatry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('hikes.index', ['category_id'=>2]) }}">Nízke Tatry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('hikes.index', ['category_id'=>3]) }}">Západné Tatry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('hikes.index', ['category_name'=>'all']) }}">Všetky</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('login') }}">{{ __('Prihlásenie') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('register') }}">{{ __('Registrácia') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Odhlásiť') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
