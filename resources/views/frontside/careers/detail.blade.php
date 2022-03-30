@extends('layouts.master')
@include('layouts.includes.seo', ['model'=> $data, 'type'=>''])
@section('content')
    <section class="main">
        @if(career_setting('index.banner'))
            <div class="page-visual" style="background-image: url('{{ Voyager::image(career_setting('index.banner')) }}');"></div>
        @endisset
        <div class="container large post-detail">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('careers.index') }}">Careers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
                </ol>
            </nav>
            <h2 class="post-detail-title">{{ $data->title }}</h2>
            <p class="post-detail-info">{{ $data->created_at->format('F d, Y') }}</p><img src="{{ voyager::image($data->image) }}"
                alt="">
            <div class="content-wrapper">
                {!! $data->content !!}
            </div>
            <p></p>
            <hr class="my-4">
            <div class="post-detail-status">
                @if ($data->expired_at && $data->expired_at < now())
                    <h3>Job Status<span class="btn status closed ml-4">Closed</span></h3>
                    <div class="desc">We are not currently accepting applications for this position</div>
                @else
                    <h3>Job Status<span class="btn status open ml-4">Open</span></h3>
                    <div class="desc">We are currently accepting applications for this position</div>
                @endif
            </div>
            <div class="post-detail-footer">
                @if ($data->expired_at && $data->expired_at < now())
                    <a class="btn btn-grey btn-apply mr-3" href="javascript:void(0);">
                        <span class="pc">Apply For This Job</span><span class="mb">Apply</span></a>
                @else
                    <a class="btn btn-primary btn-apply mr-3" href="{{ $data->link }}" target="_blank">
                        <span class="pc">Apply For This Job</span><span class="mb">Apply</span></a>
                @endif
                @if (!empty(json_decode($data->pdf)))
                    <a class="btn btn-light" href="{{ $data->pdf ? url(Storage::url(json_decode($data->pdf, true)[0]['download_link'])) : '' }}" target="_blank">Download Flyer</a>
                @endif
            </div>
        </div>
    </section>
@endsection
