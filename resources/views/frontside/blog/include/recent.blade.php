<ul class="category-list">
    @foreach ($recent as $item)
        <li><a href="{{ route('frontside.post.detail', $item->slug) }}">{{ $item->title }}</a></li>
    @endforeach
</ul>
