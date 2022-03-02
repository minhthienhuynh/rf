
@foreach ($items as $item)
    @php
        $originalItem = $item;
    @endphp
    <ul class="f-nav">
        <li class="f-nav-ttl">{{$item->title}}</li>
        @if(!$originalItem->children->isEmpty())
            @foreach ($originalItem->children as $child)
                <li><a href="{{ url($child->link()) }}">{{ $child->title }}</a></li>
            @endforeach
        @endif
    </ul>
@endforeach