<div class="left-sidebar">
    <div class="searchbox">
        <div class="input-text-wrapper">
            <form action="{{ route("blogs.search") }}">
                <input class="search-input form-control" type="text" name="q" minlength="3" value="{{ request()->input('q') }}" placeholder="Search" required>
                <div class="close-btn"></div>
            </form>
        </div>
    </div>
    <div class="siderbar-block siderbar-block-category">
        <p class="sidebar-ttl">Category</p>
        <ul class="category-list">
            <li><a class="list-icon" href="{{ route('blogs.index') }}">All blogs ({{ $countItem }})</a></li>
            <li>
                <form>
                    @php($itemIds = explode(',', request()->input('category_id', '')))
                    @foreach ($category as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="flexCheckDefault{{ $item->id }}" name="category_id[]" {{ in_array($item->id, $itemIds) ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault{{ $item->id }}">{{ $item->name }} ({{ $item->posts->count() }})</label>
                        </div>
                    @endforeach
                </form>
            </li>
        </ul>
    </div>
    <div class="recent-blog pc">
        @include('frontside.blog.include.recent')
    </div>
</div>

@push('scripts')
    <script>
        $('.form-check-input').on('change', () => {
            let arr = [];
            let route = '{{ route("blogs.index") }}'
            $('input.form-check-input:checkbox:checked').each(function () {
                arr.push($(this).val());
            });
            window.location.href = route + "?category_id=" + arr.toString();
        })
    </script>
@endpush
