@extends('layouts.master')
@section('content')
    <section class="main">
        <div class="page-visual" style="background-image: url('frontside/assets/img/images/visual-img-02.jpg');"></div>
        <div class="page-2-column">
            <div class="left-sidebar">
                <div class="searchbox">
                    <div class="input-text-wrapper">
                        <input class="search-input form-control" type="text" placeholder="Search">
                        <div class="close-btn"></div>
                    </div>
                </div>
                <p class="sidebar-ttl">Category</p>
                <div class="siderbar-block">
                    <ul class="category-list">
                        <li><a class="list-icon" href="{{ route('frontside.post.index') }}">All blogs
                                ({{ $countItem }}) </a></li>
                        @if ($category->count() > 0)
                            @foreach ($category as $catI)
                                @php
                                    $checked = request()->category_id;
                                    $arrayC = explode(',', $checked);
                                @endphp
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" {{ in_array($catI->id, $arrayC) ? 'checked' : '' }}  value="{{ $catI->id }}"
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
                @if ($recent->count() > 0)
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
                @endif
            </div>
            <div class="page-content">
                <h2 class="primary-title"><span class="section-sub-ttl">ALL BLOGS</span><span
                        class="section-ttl">Journeys to Nature</span></h2>
                <div class="row archive-post-card">
                    @if ($data->count() > 0)
                        @foreach ($data as $blog)
                            <div class="col-md-4">
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="{{ route('frontside.post.detail', $blog->slug) }}"><img
                                            class="card-img-top" src="{{ voyager::image($blog->image) }}"
                                            alt="{{ $blog->title }}"></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="{{ route('frontside.post.detail', $blog->slug) }}">{{ $blog->title }}</a>
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
                        <h5>Data is empty</h5>
                    @endif
                </div>
                <div class="pagination">
                    {{ $data->links('layouts.includes.bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('.form-check-input').on('change', () => {
            var arr = [];
            var route = '{{ route("frontside.post.index") }}'
            $('input.form-check-input:checkbox:checked').each(function () {
                arr.push($(this).val());
            });
            window.location.href = route+ "?category_id=" + arr.toString()
        })    
    </script>   
@endpush

