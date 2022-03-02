@inject ('seoService', 'App\Services\FrontSeoService')

@php
	$type = !empty($type) ? $type : '';
    $meta = $seoService->getMeta($model, $type);
@endphp

@section('seo')
<title>{{ $meta['title'] }}</title>
    <link rel="shortcut icon" href="{{$meta['favicon']}}" />
    <meta name="description" content="{{$meta['description']}}">
    <meta name="keywords" content="{{$meta['keywords']}}">
    <meta property="og:title" content="{{ $meta['title'] }}" />
    <meta property="og:description" content="{{$meta['description']}}" />
    <meta property="og:image" content="{{$meta['og_image']}}" />

@endsection

