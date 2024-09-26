<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="AdminLTE Logo" class="brand-image img-circle">
            <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
        </a>

        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="true">
                    <img src="{{ asset('assets/images/avatar.jpg') }}" class="user-image img-circle"
                        alt="img" />
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-profile">
                    <li class="user-header bg-primary">
                        <img src="{{ asset('assets/images/avatar.jpg') }}" class="img-circle"
                            alt="avatar" />
                        <p>
                            {{ Auth::user()->name }}
                            <small>{{ __('Member since') }} {{ Auth::user()->created_at->format('M d, Y') }}</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="{{ route('logout') }}" class="btn btn-default w-100">
                            {{ __('Sign out') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
