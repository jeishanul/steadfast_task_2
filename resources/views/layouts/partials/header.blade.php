<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="{{ config('app.url') }}" class="navbar-brand">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="AdminLTE Logo" class="brand-image img-circle">
            <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        

        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                <a href="{{ route('url.index') }}" class="nav-link">Home</a>
              </li>
            <li class="nav-item dropdown user-menu mt-2">
                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="true">
                    <img src="{{ asset('assets/images/avatar.jpg') }}" class="user-image img-circle elevation-2"
                        alt="img" />
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-profile">
                    <li class="user-header bg-primary">
                        <img src="{{ asset('assets/images/avatar.jpg') }}" class="img-circle elevation-2"
                            alt="avatar" />
                        <p>
                            {{ Auth::user()->name }}
                            <small>{{ __('Member since') }} {{ Auth::user()->created_at->format('M d, Y') }}</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="javascript:void(0)" class="btn btn-default btn-flat">
                            {{ __('Profile') }}
                        </a>
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right">
                            {{ __('Sign out') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
