@extends('layouts.master')
@include('layouts.includes.seo', ['model'=> $data, 'type'=>''])
@section('content')
    <section class="main">
        <div class="page-visual" style="background-image: url('{{ voyager::image($data->hero_picture) }}');"></div>
        <div class="container post-detail">
            <h2 class="primary-title text-center"><span class="section-sub-ttl">OUR SERVICES</span><span
                    class="section-ttl">{{ $data->title }}</span></h2>
            @if (count(json_decode($data->slider)) > 0)
                <div class="block-gallery">
                    <div class="gallery-main">
                        @foreach (json_decode($data->slider) as $item)
                            <div class="gallery-main-item"><img src="{{ voyager::image($item) }}"
                                    alt="{{ $data->title }}"></div>
                        @endforeach
                    </div>
                    <div class="gallery-thumbnail">
                        @foreach (json_decode($data->slider) as $item)
                            <div class="gallery-thumbnail-item"
                                style="background-image: url('{{ voyager::image($item) }}');">
                                <img src="{{ voyager::image($item) }}" alt="{{ $data->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="content-wrapper">
                {!! $data->content !!}
            </div>
            <p></p>
            @if ($data->blogs->count() > 0)
                <div class="services-block-slider basic-slider block-full">
                    @foreach ($data->blogs as $blog)
                        <div class="card post-card services-post"><a class="post-link-img" href="{{ route('frontside.post.detail', $blog->slug) }}"><img
                                    class="card-img-top" src="{{ voyager::image($blog->image) }}" alt="{{ $blog->title}}"></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ route('frontside.post.detail', $blog->slug) }}">{{ $blog->title}}</a></h5>
                                <p class="card-text">{{ $blog->excerpt }}</p>
                                <div class="card-footer">
                                    <p class="post-date">{{ $blog->created_at->format('m/d/Y') }}</p><a class="post-link btn-more"
                                    href="{{ route('frontside.post.detail', $blog->slug) }}">More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="section-button text-center"> <a class="text-link-arrow"
                        href="{{ route('blogs.index', ['service_id' => $data->id]) }}">See More <span class="uppercase">{{ $data->title }}</span> Projects</a>
                </div>
            @endif
        </div>
    </section>
@endsection
