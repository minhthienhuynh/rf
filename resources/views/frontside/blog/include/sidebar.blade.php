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
            <li><a class="list-icon" href="{{ route('blogs.index') }}">All blog posts
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
            let route = '{{ route("blogs.search") }}'

            $(document).on('keypress', function(e) {
                if (e.which == 13) {
                    window.location.href = route + "?q=" + q
                }
            });
        })
        
</script>
@endpush