@extends('layouts.master')
@section('content')
{{-- @dd($data) --}}
    <section class="main">
        <div class="page-visual" style="background-image: url('{{ asset('frontside/assets/img/images/visual-img-04.jpg')}}');"></div>
        <div class="container large post-detail">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontside.careers.index') }}">Career</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
                </ol>
            </nav>
            <h2 class="post-detail-title">{{ $data->title }}</h2>
            <p class="post-detail-info">{{ $data->created_at->format('F d, Y') }}</p><img src="{{ voyager::image($data->image) }}"
                alt="">
            {!! $data->content !!}
            <div class="post-detail-footer">
                <a class="btn btn-primary btn-apply mr-3" href="#">Apply For This Job</a>
                <a class="btn btn-light" href="{{ $data->pdf ? url(Storage::url(json_decode($data->pdf, true)[0]['download_link'])) : '' }}" download>Download Flyer</a></div>
        </div>
    </section>
@endsection