
@php
    if (empty($level)) {
        $level = 1;
    }
@endphp

<ul class="{{ $level == 1 ? 'global-nav' : 'sub-menu' }}">

    @php
        if (Voyager::translatable($items)) {
            $items = $items->load('translations');
        }
    @endphp

    @foreach ($items as $item)
        @php
            $originalItem = $item;
            if (Voyager::translatable($item)) {
                $item = $item->translate($options->locale);
            }

            $isActive = null;
            $styles = null;
            $icon = null;
            // Background Color or Color
            if (isset($options->color) && $options->color == true) {
                $styles = 'color:'.$item->color;
            }
            if (isset($options->background) && $options->background == true) {
                $styles = 'background-color:'.$item->color;
            }
            // Check if link is current
            if(url($item->link()) == url()->current()){
                $isActive = 'active';
            }

            if(url($item->link()) == route('blogs.index') && request()->is('blog/*')){
                $isActive = 'active';   
            }

            if($item->title == 'ABOUT' && request()->is('about/*') || $item->title == 'SERVICES' && request()->is('service/*')){
                $isActive = 'active';
            }
            // Set Icon
            if(isset($options->icon) && $options->icon == true){
                $icon = '<i class="' . $item->icon_class . '"></i>';
            }
        @endphp

        <li class="{{ $level == 1 ? '' : 'sub-menu-item' }}">
            <a class="{{ $isActive }} {{ $level == 1 ? '' : 'sub-menu-item' }}" href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}">
                {!! $icon !!}
                <span>{{ $item->title }}</span>
            </a>
            @if($level > 1)
                <span class="sub-menu-desc">{{ $item->description }}</span>
            @endif
            @if(!$originalItem->children->isEmpty())
                @include('layouts.includes.menu-custom', ['items' => $originalItem->children, 'options' => $options, 'level' => $level+1])
            @endif
        </li>
    @endforeach
    
    </ul>
    