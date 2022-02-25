@inject ('seoService', 'App\Services\FrontSeoService')

@php
	$type = !empty($type) ? $type : '';
    $meta = $seoService->getMeta($model, $type);
@endphp

@section('seo')
<title>{{$meta['title']}}</title>
    <meta name="description" content="{{$meta['description']}}">
    <meta name="keywords" content="{{$meta['keywords']}}">
    <meta property="og:image" content="{{$meta['og_image']}}" />
@endsection

