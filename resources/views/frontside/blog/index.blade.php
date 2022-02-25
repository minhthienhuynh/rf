@extends('layouts.master')
@include('layouts.includes.seo', ['model'=> '', 'type'=>'blog'])
@section('content')

@if(request()->q && $result == 0)
<section class="main">
    <div class="page-visual" style="background-image: url('{{ asset("frontside/assets/img/images/visual-img-02.jpg")}}');"></div>
    <div class="page-2-column search-content">
        <div class="searchbox">
            <div class="input-text-wrapper">
                <input class="search-input blog-key-search form-control" type="text" value="{{ request()->q }}"
                    placeholder="Search">
                <div class="close-btn"></div>
            </div>
        </div>
        <div class="page-content">
            <h2 class="primary-title text-center title-small"><span class="section-sub-ttl">SEARCH RESULTS</span><span
                    class="main-ttl">Your search for "<b>{{ request()->q }}</b>" didn’t return any results.</span></h2>
            <div class="row archive-post-card"></div>
        </div>
    </div>
</section>
@else
<section class="main">
    <div class="page-visual" style="background-image: url('{{ asset("frontside/assets/img/images/visual-img-02.jpg")}}');"></div>
    <div class="page-2-column">
        <div class="left-sidebar">
            <div class="searchbox">
                <div class="input-text-wrapper">
                    <input class="search-input form-control blog-key-search" value="{{ request()->q }}" type="text"
                        placeholder="Search">
                    <div class="close-btn"></div>
                </div>
            </div>
            <p class="sidebar-ttl">Category</p>
            <div class="siderbar-block">
                <ul class="category-list">
                    <li><a class="list-icon" href="{{ route('blogs.index') }}">All blogs
                            ({{ $countItem }}) </a></li>
                    @if ($category->count() > 0)
                    @foreach ($category as $catI)
                    @php
                        $checked = request()->category_id;
                        $arrayC = explode(',', $checked);
                    @endphp
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" {{ in_array($catI->id, $arrayC) ? 'checked'
                            : '' }} value="{{ $catI->id }}"
                            id="flexCheckDefault_{{ $catI->id }}">
                            <label class="form-check-label" for="flexCheckDefault_{{ $catI->id }}">{{ $catI->name }}
                                ({{ $catI->posts->count() }})
                            </label>
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
            @if ($recent->count() > 0)
            <p class="sidebar-ttl">Recent Blogs</p>
            <div class="siderbar-block">
                <ul class="category-list">
                    @foreach ($recent as $recentI)
                    <li>
                        <a href="{{ route('frontside.post.detail', $recentI->slug) }}">{{ $recentI->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="page-content">
            <h2 class="primary-title">
                @if(request()->q && $result > 0)
                <span class="section-sub-ttl">{{ $result }} Results</span>
                @else
                <span class="section-sub-ttl">ALL BLOGS</span>
                <span class="section-ttl">Journeys to Nature</span>
                @endif

            </h2>
            <div class="row archive-post-card">
                @if ($data->count() > 0)
                @foreach ($data as $blog)
                <div class="col-md-4">
                    <div class="card post-card services-post"><a class="post-link-img"
                            href="{{ route('frontside.post.detail', $blog->slug) }}"><img class="card-img-top"
                                src="{{ voyager::image($blog->image) }}" alt="{{ $blog->title }}"></a>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('frontside.post.detail', $blog->slug) }}">{{
                                    $blog->title }}</a>
                            </h5>
                            <p class="card-text">{{ $blog->excerpt }}</p>
                            <div class="card-footer">
                                <p class="post-date">{{ $blog->created_at->format('m/d/Y') }}</p><a
                                    class="post-link btn-more"
                                    href="{{ route('frontside.post.detail', $blog->slug) }}">More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="list-jobs">
                    <h5>Data is empty</h5>
                </div>
                @endif
            </div>
            <div class="pagination">
                {{ $data->links('layouts.includes.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@endif
@endsection

@push('scripts')
<script>
    $('.form-check-input').on('change', () => {
            let q = '{{ request()->q }}'
            let arr = [];
            let route = '{{ route("blogs.index") }}'
            $('input.form-check-input:checkbox:checked').each(function () {
                arr.push($(this).val());
            });
            window.location.href = route + "?category_id=" + arr.toString() + "&q=" + q
        })    

        $('.blog-key-search').on('input', function() {
            let q = $(this).val()
            let route = '{{ route("blogs.index") }}'

            $(document).on('keypress', function(e) {
                if (e.which == 13) {
                    window.location.href = route + "?q=" + q
                }
            });
        })
        
</script>
@endpush