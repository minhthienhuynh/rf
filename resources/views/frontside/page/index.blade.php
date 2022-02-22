@extends('layouts.master')
@section('content')
    <section class="main">
        <div class="page-visual" style="background-image: url('{{ voyager::image($data->hero_picture) }}');"></div>
        <div class="container post-detail">
            <h2 class="primary-title text-center"><span class="section-sub-ttl">ABOUT US</span><span class="section-ttl">{{ $data->title }}</span></h2>
            {!! $data->content !!}
        </div>
    </section>
@endsection
