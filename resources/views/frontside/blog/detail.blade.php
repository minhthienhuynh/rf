@extends('layouts.master')
@include('layouts.includes.seo', ['model'=> $data, 'type'=>''])
@section('content')
    <section class="main">
        <div class="page-visual" style="background-image: url('{{ asset('frontside/assets/img/images/visual-img-02.jpg') }}');">
        </div>
        <div class="page-2-column">
            {{-- <div class="left-sidebar">
                <div class="searchbox">
                    <div class="input-text-wrapper">
                        <input class="search-input form-control" type="text" placeholder="Search">
                        <div class="close-btn"></div>
                    </div>
                </div>
                <div class="siderbar-block siderbar-block-category">
                    <p class="sidebar-ttl">Category</p>
                    <ul class="category-list">
                        <li><a class="list-icon" href="{{ route('blogs.index') }}">All blogs
                                ({{ $countItem }}) </a></li>
                        @if ($category->count() > 0)
                            @foreach ($category as $catI)
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $catI->id }}"
                                            id="flexCheckDefault_{{ $catI->id }}">
                                        <label class="form-check-label"
                                            for="flexCheckDefault_{{ $catI->id }}">{{ $catI->name }}
                                            ({{ $catI->posts->count() }})
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="recent-blog pc">
                    <p class="sidebar-ttl">Recent Blogs</p>
                    <div class="siderbar-block">
                        <ul class="category-list">
                            @foreach ($recent as $recentI)
                                <li>
                                    <a
                                        href="{{ route('frontside.post.detail', $recentI->slug) }}">{{ $recentI->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> --}}
            @include('frontside.blog.include.sidebar')

            <div class="page-content post-detail">
                <h2 class="post-detail-title">{{ $data->title }}</h2>
                <p class="post-detail-info">{{ $data->created_at->format('F d, Y') }}</p><img
                    src="{{ voyager::image($data->image) }}" alt="{{ $data->title }}">
                <div class="content-wrapper">
                    {!! $data->body !!}
                </div>
                <div class="block-tags">
                    @foreach($data->categories as $cate)
                        <a class="tag" href="{{ route('blogs.index') . '?category_id='. $cate->id }}">#{{ $cate->name }}</a>
                    @endforeach

                    @foreach($data->services as $service)
                        <a class="tag" href="{{ route('services.show', $service->slug) }}">#{{ $service->title }}</a>
                    @endforeach
                </div>
                <div class="recent-blog sp mt-5">
                    <p class="sidebar-ttl">Recent Blogs</p>
                    <div class="siderbar-block">
                        <ul class="category-list">
                            @foreach ($recent as $recentI)
                                <li>
                                    <a
                                        href="{{ route('frontside.post.detail', $recentI->slug) }}">{{ $recentI->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('.form-check-input').on('change', () => {
            var arr = [];
            var route = '{{ route("blogs.index") }}'
            $('input.form-check-input:checkbox:checked').each(function () {
                arr.push($(this).val());
            });
            window.location.href = route+ "?category_id=" + arr.toString()
        })    
    </script>   
@endpush


