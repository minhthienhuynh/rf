<header class="header">
    <div class="container large">
        <div class="logo"><a href="/"><img src="{{ voyager::image(voyager::setting('site.logo')) }}" alt="Resilient Forestry"
                    width="150"></a></div>
        <div class="main-nav">
            <div class="block-login sp">
                <div class="login-button">
                    @if ( voyager::setting('site.header_login_link') )
                        <a class="btn btn-light" href="{{ voyager::setting('site.header_login_link') }}">Login</a>
                    @else
                    <span class="btn" disabled></span>
                    @endif
                </div>
              </div>
            {{--
            <ul class="global-nav">
            --}}
                {{ menu('user', 'layouts.includes.menu-custom') }}
            {{--
            </ul>
            --}}
        </div>
        @if ( voyager::setting('site.header_login_link') )
            <div class="account-buttons">
                <div class="login-button"> <a class="btn btn-light" target="_blank" href="{{ voyager::setting('site.header_login_link') }}">Login</a></div>
            </div>
        @endif
        <div id="menu-toggle"><span></span><span></span><span></span><span></span></div>
    </div>
</header>
