@extends('layouts.master')

@include('layouts.includes.seo', ['model' => '', 'type' => 'blog'])

@section('content')
    <section class="main">
        <div class="page-visual" style="background-image: url('/frontside/assets/img/images/visual-img-02.jpg');"></div>
        <div class="page-2-column search-content">
            <div class="searchbox">
                <div class="input-text-wrapper">
                    <form>
                        <input class="search-input form-control" type="text" name="q" minlength="3" value="{{ request()->input('q') }}" placeholder="Search" required>
                    </form>
                    <div class="close-btn"></div>
                </div>
            </div>
            <div class="page-content">
                <h2 class="primary-title text-center title-small">
                    <span class="section-sub-ttl">SEARCH RESULTS</span>
                    @if ($posts->total())
                        <span class="main-ttl">We found <b>{{ $posts->total() }}</b> posts with <b>“{{ request()->input('q') }}”</b></span>
                    @else
                        <span class="main-ttl">Your search for "<b>{{ request()->input('q') }}</b>" didn’t return any results.</span>
                    @endif
                </h2>
                <div class="row archive-post-card">
                    @if ($posts->total())
                        @foreach ($posts as $post)
                            <div class="col-6 col-lg-3">
                                <div class="card post-card services-post">
                                    <a class="post-link-img" href="{{ route('frontside.post.detail', $post->slug) }}">
                                        <img class="card-img-top" src="{{ Voyager::image($post->image) }}" alt="{{ $post->title }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('frontside.post.detail', $post->slug) }}">{{ $post->title }}</a>
                                        </h5>
                                        <p class="card-text">{{ $post->excerpt }}</p>
                                        <div class="card-footer">
                                            <p class="post-date">{{ $post->published_at }}</p>
                                            <a class="post-link btn-more" href="{{ route('frontside.post.detail', $post->slug) }}">More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="pagination">
                    {{ $posts->appends(request()->only('q'))->links('layouts.includes.bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        let searchParams = new URLSearchParams(window.location.search);

        if (searchParams.has('q')) {
            $('.archive-post-card .card-title, .archive-post-card .card-text').each(function () {
                let text = $(this).text();

                let keyword = searchParams.get('q');
                text = text.replace(new RegExp(keyword, 'g'), `<span class="highlight">${keyword}</span>`);

                // strtoupper
                let newKeyword = keyword.toUpperCase();
                if (newKeyword !== keyword) {
                    text = text.replace(new RegExp(newKeyword, 'g'), `<span class="highlight">${newKeyword}</span>`);
                }

                // strtolower
                newKeyword = newKeyword.toLowerCase();
                if (newKeyword !== keyword) {
                    text = text.replace(new RegExp(newKeyword, 'g'), `<span class="highlight">${newKeyword}</span>`);
                }

                // ucfirst
                newKeyword = newKeyword.replace(/^[a-z]/, function(letter) {
                    return letter.toUpperCase();
                });
                if (newKeyword !== keyword) {
                    text = text.replace(new RegExp(newKeyword, 'g'), `<span class="highlight">${newKeyword}</span>`);
                }

                // ucwords
                newKeyword = newKeyword.replace(/\b[a-z]/g, function(letter) {
                    return letter.toUpperCase();
                });
                if (newKeyword !== keyword) {
                    text = text.replace(new RegExp(newKeyword, 'g'), `<span class="highlight">${newKeyword}</span>`);
                }

                $(this).html(text);
            });
        }

        $('.close-btn').on('click', function () {
            window.location.href = '{{ route('blogs.index') }}';
        });
    </script>
@endpush
