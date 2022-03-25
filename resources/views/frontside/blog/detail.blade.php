@extends('layouts.master')

@include('layouts.includes.seo', ['model' => $data, 'type' => ''])

@section('content')
    <section class="main">
        @if (setting('blog.banner'))
            <div class="page-visual" style="background-image: url('{{ Voyager::image(setting('blog.banner')) }}');"></div>
        @endif
        <div class="page-2-column">
            @include('frontside.blog.include.sidebar')
            <div class="page-content post-detail">
                <h2 class="post-detail-title">{{ $data->title }}</h2>
                <p class="post-detail-info">{{ $data->created_at->format('D, F d, Y') }}</p>
                <img src="{{ Voyager::image($data->image) }}" alt="{{ $data->title }}">
                {!! $data->body !!}
                <div class="block-tags">
                    @foreach($data->categories as $category)
                        <a class="tag" href="{{ route('blogs.index', ['category_id' => $category->id]) }}">#{{ $category->name }}</a>
                    @endforeach
                    {{--
                    @foreach($data->services as $service)
                        <a class="tag" href="{{ route('services.show', $service->slug) }}">#{{ $service->title }}</a>
                    @endforeach
                    --}}
                </div>
                <div class="recent-blog sp mt-5">
                    @include('frontside.blog.include.recent')
                </div>
            </div>
        </div>
    </section>
@endsection
