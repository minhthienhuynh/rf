<footer class="footer">
    <div class="container large">
        <div class="contact-info-section" id="contact-section">
            <p class="section-title">Contact Us</p>
            <div class="section-info">
                <dl>
                    <dt>Email</dt>
                    <dd>{{ voyager::setting('site.email') }}</dd>
                </dl>
                <dl>
                    <dt>Address</dt>
                    <dd>{{ voyager::setting('site.address') }}</dd>
                </dl>
                <dl>
                    <dt>Phone</dt>
                    <dd>{{ voyager::setting('site.phone') }}</dd>
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
                <ul class="f-nav">
                    <li class="f-nav-ttl"><a href="#">Company</a></li>
                    <li><a href="#">Mission</a></li>
                    <li><a href="#">Vision</a></li>
                    <li><a href="#">Members</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
                <ul class="f-nav">
                    <li class="f-nav-ttl"><a href="#">Services</a></li>
                    <li><a href="#">Stewardship</a></li>
                    <li><a href="#">Planning & Adaptive Management</a></li>
                    <li><a href="#">Science</a></li>
                    <li><a href="#">Timber</a></li>
                    <li><a href="#">Geospatial and Software</a></li>
                </ul>
                <ul class="f-nav">
                    <li class="f-nav-ttl"><a href="#">Help</a></li>
                    <li><a href="{{ route('pages.show', 'term-and-conditions') }}">Term and Conditions</a></li>
                </ul>
            </div>
        </div>
        <address class="text-center">©2022 by Resilient Forestry</address>
    </div>
</footer>
