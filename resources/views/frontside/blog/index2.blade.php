@extends('layouts.master')

@include('layouts.includes.seo', ['model' => '', 'type' => 'blog'])

@section('content')
    <section class="main">
        <div class="page-visual" style="background-image: url('/frontside/assets/img/images/visual-img-02.jpg');"></div>
        <div class="page-2-column">
            @include('frontside.blog.include.sidebar2')
            <div class="page-content">
                <h2 class="primary-title">
                    <span class="section-sub-ttl">ALL BLOGS</span>
                    <span class="section-ttl">Journeys to Nature</span>
                </h2>
                <div class="row archive-post-card">
                    @foreach ($data as $item)
                        <div class="col-6 col-lg-4">
                            <div class="card post-card services-post">
                                <a class="post-link-img" href="{{ route('frontside.post.detail', $item->slug) }}">
                                    <img class="card-img-top" src="{{ Voyager::image($item->image) }}" alt="{{ $item->title }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('frontside.post.detail', $item->slug) }}">{{ $item->title }}</a>
                                    </h5>
                                    <p class="card-text">{{ $item->excerpt }}</p>
                                    <div class="card-footer">
                                        <p class="post-date">{{ $item->created_at->format('m/d/Y') }}</p>
                                        <a class="post-link btn-more" href="{{ route('frontside.post.detail', $item->slug) }}">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination">
                    {{ $data->links('layouts.includes.bootstrap-4') }}
                </div>
                <div class="recent-blog sp mt-5">
                    @include('frontside.blog.include.recent')
                </div>
            </div>
        </div>
    </section>
@endsection
