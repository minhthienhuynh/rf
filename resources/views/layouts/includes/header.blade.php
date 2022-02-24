<header class="header">
    <div class="container large">
        <div class="logo"><a href="/"><img src="{{ asset('frontside/assets/img/images/logo.png')}}" alt="Resilient Forestry"
                    width="150"></a></div>
        <div class="main-nav">
            <ul class="global-nav">
                {{ menu('user', 'layouts.includes.menu-custom') }}
            </ul>
        </div>
        @if ( voyager::setting('site.header_login_link') )
            <div class="account-buttons">
                <div class="login-button"> <a class="btn btn-light" target="_blank" href="{{ voyager::setting('site.header_login_link') }}">Login</a></div>
            </div>
        @endif
    </div>
</header>
