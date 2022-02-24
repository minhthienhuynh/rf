@extends('layouts.master')
@section('content')
    <section class="main">
        <!-- END: PAGE - HOME PAGE-->
        <div class="main-visual" style="background-image: url('frontside/assets/img/images/visual-img-01.jpg');">
            <div class="container large">
                <h2 class="text-center">
                    Conservation, Forestry, and <br>Management in a Changing Landscape</h2>
                <p class="visual-desc text-center">Resilient Forestry has a unique skill set in monitoring changes in
                    forests over time for compliance or research objectives. </p>
                <div class="visual-button text-center"><a class="btn btn-contact" href="#">Contact Us</a></div>
            </div>
        </div>
        <div class="content-section section-services">
            <div class="container large">
                <h3 class="primary-title text-center"><span class="section-sub-ttl">OUR services</span><span
                        class="section-ttl">
                        Services of forest inventories and<br>management planning</span></h3>
                <ul class="nav nav-tabs tab-title-only" id="tab-services" role="tablist">
                    @foreach ($dataService as $key => $service)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $service->slug }}-tab"
                                data-bs-toggle="tab" data-bs-target="#{{ $service->slug }}" type="button" role="tab"
                                aria-controls="{{ $service->slug }}" aria-selected="true">{{ $service->title }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="tab-services-content">
                    @foreach ($dataService as $index => $item)
                        <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $item->slug }}"
                            role="tabpanel" aria-labelledby="{{ $item->slug }}-tab">
                            <div class="services-content">
                                <div class="services-block-intro">
                                    <h4 class="services-intro-ttl">{{ $item->title }}</h4>
                                    <p>{{ $item->description }}</p>
                                    <div class="block-button">
                                        <a class="text-link-arrow"
                                            href="{{ route('services.show', $item->slug) }}">See More</a>
                                    </div>
                                </div>
                                <div class="services-block-slider basic-slider">
                                    @foreach ($item->blogs as $item)
                                        <div class="card post-card services-post"><a class="post-link-img"
                                                href="{{ route('frontside.post.detail', $item->slug) }}"><img
                                                    class="card-img-top" src="{{ voyager::image($item->image) }}"
                                                    alt=""></a>
                                            <div class="card-body">
                                                <h5 class="card-title"><a
                                                        href="{{ route('frontside.post.detail', $item->slug) }}">{{ $item->title }}</a>
                                                </h5>
                                                <p class="card-text">{{ $item->excerpt }}</p>
                                                <div class="card-footer">
                                                    <p class="post-date">{{ $item->created_at->format('m/d/Y') }}</p>
                                                    <a class="post-link btn-more"
                                                        href="{{ route('frontside.post.detail', $item->slug) }}">More</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="content-section section-aboutus">
            <div class="container large">
                <h3 class="primary-title text-center"><span class="section-sub-ttl">ABOUT US</span><span
                        class="section-ttl">Exceptional Solution For Forestry Project</span></h3>
                <div class="row">
                    @foreach ($dataPage as $page)
                        <div class="col-md-4">
                            <div class="aboutus-card">
                                <div class="card-img"> <img src="{{ voyager::image($page->hero_picture) }}"
                                        width="100%" alt="{{ $page->title }}"></div>
                                <div class="card-content">
                                    <h4 class="card-ttl text-center">{{ $page->title }}</h4>
                                    <p class="card-txt">{{ $page->description }}</p>
                                </div><a class="card-link" href="{{ route('pages.show', $page->slug) }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="content-section section-blog">
            <div class="container large">
                <h3 class="primary-title text-center"><span class="section-sub-ttl">BLOG</span><span
                        class="section-ttl">Our Latest Blogs</span></h3>
                <div class="latest-blog-section">
                    <div class="row">
                        @foreach ($dataBlog as $blog)
                            <div class="col-md-3">
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="{{ route('frontside.post.detail', $blog->slug) }}"><img class="card-img-top"
                                            src="{{ voyager::image($blog->image) }}" alt="{{ $blog->title }}"></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{ route('frontside.post.detail', $blog->slug) }}">{{ $blog->title }}</a></h5>
                                        <p class="card-text">{{ $blog->description }}</p>
                                        <div class="card-footer">
                                            <p class="post-date">{{ $blog->created_at->format('m/d/Y') }}</p><a class="post-link btn-more"
                                                href="{{ route('frontside.post.detail', $blog->slug) }}">More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="section-button text-center"> 
                    <a class="text-link-arrow" href="{{ route('blogs.index') }}">See All Blogs</a>
                </div>
            </div>
        </div>
        <div class="content-section section-clients">
            <div class="container large">
                <h3 class="primary-title text-center"><span class="section-sub-ttl">CLIENTS</span><span
                        class="section-ttl">Trusted By</span></h3>
                <ul class="list-clients">
                    <li><img src="frontside/assets/img/images/clients/client-01.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-02.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-03.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-04.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-05.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-06.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-07.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-08.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-09.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-10.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-11.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-12.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-13.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-14.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-15.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-16.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-17.svg" widht="157" alt=""></li>
                </ul>
            </div>
        </div>
    </section>
@endsection
