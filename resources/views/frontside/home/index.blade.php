@extends('layouts.master')
@include('layouts.includes.seo', ['model'=> '', 'type'=>'home'])
@section('content')
    <section class="main">
        <!-- END: PAGE - HOME PAGE-->
        <div class="main-visual" style="background-image: url('{{ voyager::image(homepage_setting('banner.image')) }}');">
            <div class="container large">
                <h2 class="text-center">{{ homepage_setting('banner.title') }}</h2>
                <p class="visual-desc text-center">{{ homepage_setting('banner.desc') }}</p>
                <div class="visual-button text-center">
                    <a class="btn btn-contact" href="{{ homepage_setting('banner.button_url')}}">{{ homepage_setting('banner.button_title') }}</a>
                </div>
            </div>
        </div>
        <div class="content-section section-services">
            <div class="container large">
                <h3 class="primary-title text-center"><span class="section-sub-ttl">{{ homepage_setting('service.subtitle') }}</span><span
                        class="section-ttl">{{ homepage_setting('service.title') }}</h3>
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
                <h3 class="primary-title text-center"><span class="section-sub-ttl">{{ homepage_setting('about.subtitle') }}</span><span
                        class="section-ttl">{{homepage_setting('about.title') }}</span></h3>
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
                <h3 class="primary-title text-center"><span class="section-sub-ttl">{{ homepage_setting('blog.subtitle') }}</span><span
                        class="section-ttl">{{ homepage_setting('blog.title') }}</span></h3>
                <div class="latest-blog-section">
                    <div class="row">
                        @foreach ($dataBlog as $blog)
                            <div class="col-md-3">
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="{{ route('frontside.post.detail', $blog->slug) }}"><img class="card-img-top"
                                            src="{{ voyager::image($blog->image) }}" alt="{{ $blog->title }}"></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{ route('frontside.post.detail', $blog->slug) }}">{{ $blog->title }}</a></h5>
                                        <p class="card-text">{{ $blog->excerpt }}</p>
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
        @if($dataClient->count() > 0)
        <div class="content-section section-clients">
            <div class="container large">
                <h3 class="primary-title text-center"><span class="section-sub-ttl">{{ homepage_setting('client.subtitle') }}</span><span
                        class="section-ttl">{{ homepage_setting('client.subtitle') }}</span></h3>
                <ul class="list-clients">
                    @foreach ($dataClient as $client)
                        <li><img src="{{ voyager::image($client->logo) }}" width="157" alt="clients"></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </section>
@endsection
