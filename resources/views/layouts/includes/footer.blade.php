<footer class="footer">
    <div class="container large">
        <div class="contact-info-section" id="contact-section">
            <p class="section-title">Contact Us</p>
            <div class="section-info">
                <dl>
                    <dt>Email</dt>
                    <dd><a href="mailto:{{ voyager::setting('site.email') }}">{{ voyager::setting('site.email') }}</a></dd>
                </dl>
                <dl>
                    <dt>Address</dt>
                    <dd>{{ voyager::setting('site.address') }}</dd>
                </dl>
                <dl>
                    <dt>Phone</dt>
                    <dd><a href="tel:{{ voyager::setting('site.phone') }}">{{ voyager::setting('site.phone') }}</a></dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="f-navigation">
            <div class="f-col-left">
                <div class="f-logo">
                    <a href="/">
                        <img src="{{ voyager::image(voyager::setting('site.logo')) }}" alt="Resilient Forestry" width="150">
                    </a>
                </div>
                <ul class="list-social">
                    @if(voyager::setting('site.social_link_tw'))
                    <li>
                        <a href="{{ voyager::setting('site.social_link_tw') }}" target="_blank"> <img src="{{ asset('frontside/assets/img/icons/twitter.svg') }}" alt="Twitter" width="18"></a>
                    </li>
                    @endif
                    @if(voyager::setting('site.social_link_lk'))
                    <li>
                        <a href="{{ voyager::setting('site.social_link_lk') }}" target="_blank"> <img src="{{ asset('frontside/assets/img/icons/linked.svg') }}" alt="Linked In" width="17"></a>
                    </li>
                    @endif
                    @if(voyager::setting('site.social_link_fb'))
                    <li>
                        <a href="{{ voyager::setting('site.social_link_fb') }}" target="_blank"> <img src="{{ asset('frontside/assets/img/icons/facebook.svg') }}"alt="Facebook" width="10"></a>
                    </li>
                    @endif
                    @if(voyager::setting('site.social_link_ig') )
                    <li>
                        <a class="instagram" href="{{ voyager::setting('site.social_link_ig') }}" target="_blank"><img src="{{ asset('frontside/assets/img/icons/instagram.svg') }} " alt="Instagram" width="32"></a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="f-col-right">
                {{ menu('user_footer', 'layouts.includes.menu-footer') }}
            </div>
        </div>
        <address class="text-center">©2022 by Resilient Forestry</address>
    </div>
</footer>
