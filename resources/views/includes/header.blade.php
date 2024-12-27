<nav class="navbar navbar-expand-lg bg-body-tertiary border border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">Linebet Promocode Bot</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'index' ? 'active' : '' }}" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'telegram-users.index' ? 'active' : '' }}" href="{{ route('telegram-users.index') }}">Telegram users</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Telegram
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ Route::currentRouteName() == 'telegram-bot.messages.index' ? 'active' : '' }}" href="{{ route('telegram-bot.messages.index') }}">Messages</a></li>
                        <li><a class="dropdown-item {{ Route::currentRouteName() == 'telegram-bot.buttons.index' ? 'active' : '' }}" href="{{ route('telegram-bot.buttons.index') }}">Buttons</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">

                </li>
            </ul>
            <div class="d-flex align-items-center">
                <div class="form-check form-switch mx-2 w-100 d-flex align-items-center justify-content-between p-0">
                    <div class="d-flex align-items-center justify-content-between w-auto border-end pe-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="themeSwitcher">
                        <p class="m-0 ms-1">Dark theme</p>
                    </div>
                </div>
                @if(auth()->check())
                    <div class="d-flex align-items-center">
                        <p class="m-0 me-1">{{ auth()->user()->login }}</p>
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-danger">Logout</button>
                        </form>
                    </div>
                @else
                    <a class="btn btn-sm btn-primary" href="{{ route('login') }}">Login</a>
                @endif
            </div>
        </div>
    </div>
</nav>

@push('js')
    <script>
        let themeSwitcher = document.getElementById('themeSwitcher');
        let currentTheme = document.documentElement.getAttribute('data-bs-theme');
        if (localStorage.getItem('theme') == null) {
            localStorage.setItem('theme', currentTheme);
        } else {
            document.documentElement.setAttribute('data-bs-theme', localStorage.getItem('theme'))
            localStorage.getItem('theme') === 'light' ? themeSwitcher.checked = false : themeSwitcher.checked = true;
        }        themeSwitcher.addEventListener('change', function () {
            let newTheme;
            if (themeSwitcher.checked) {
                newTheme = 'dark';
            } else {
                newTheme = 'light';
            }            localStorage.setItem('theme', newTheme);
            document.documentElement.setAttribute('data-bs-theme', newTheme);
        })    </script>
@endpush
