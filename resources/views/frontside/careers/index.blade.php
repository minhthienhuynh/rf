@extends('layouts.master')
@include('layouts.includes.seo', ['model'=> '', 'type'=>'career'])
@section('content')
    <section class="main">
        @if(career_setting('index.banner'))
            <div class="page-visual" style="background-image: url('{{ Voyager::image(career_setting('index.banner')) }}');"></div>
        @endisset
        <div class="container large post-detail">
            <h2 class="primary-title text-center"><span class="section-ttl">{!! nl2br(career_setting('index.title')) !!}</span></h2>
            <h3>{!! nl2br(career_setting('index.summary_title')) !!}</h3>
            {!! nl2br(career_setting('index.summary_desc')) !!}
            <hr class="my-5">
            <h3>All Jobs</h3>
            @if ($data->count() > 0)
                <div class="row list-jobs">
                    @foreach ($data as $item)
                        <div class="col-6 col-lg-3">
                            <div class="card post-card job-post"><a class="post-link-img" href="{{ route('frontside.careers.detail', $item->slug) }}"><img
                                        class="card-img-top" src="{{ Voyager::image($item->image) }}"
                                        alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('frontside.careers.detail', $item->slug) }}">{{ $item->title }}</a></h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                    <div class="card-footer"><a class="post-link btn-more"
                                            href="{{ route('frontside.careers.detail', $item->slug) }}">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="list-jobs">
                    <h5>Data is empty !</h5>
                </div>
            @endif

            <hr class="my-5">
            <h3>{!! nl2br(career_setting('index.policy_title')) !!}</h3>
            {!! nl2br(career_setting('index.policy_desc')) !!}
        </div>
    </section>
@endsection
