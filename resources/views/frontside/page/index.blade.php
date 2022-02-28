@extends('layouts.master')
@include('layouts.includes.seo', ['model'=> $data, 'type'=>''])
@section('content')
    <section class="main">
        @if($slug != "term-and-conditions")
            @if (!blank($data->landscape_image))
        <div class="page-visual" style="background-image: url('{{ voyager::image($data->landscape_image) }}');"></div>
            @endif
        @endif
        <div class="container post-detail {{ $slug == "term-and-conditions" ? 'padding-topnn' : ''}}">
            <h2 class="primary-title text-center">
                @if($slug != "term-and-conditions")
                    <span class="section-sub-ttl">ABOUT US</span>
                @endif
                <span class="section-ttl">{{ $data->title }}</span>
            </h2>
            @if ($slug == 'members' || $slug == 'people')
                <div class="row section-members">
                    @foreach ($dataMember as $member)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card post-card member-card"><img class="card-img-top"
                                    src="{{ voyager::image($member->avatar) }}" alt="{{ $member->full_name }}">
                                <div class="card-body">
                                    <h4 class="card-title primary-title text-center">
                                        <span class="section-sub-ttl">{{ $member->position }}</span>
                                        <span class="section-ttl">{{ $member->full_name }}</span>
                                    </h4>
                                    <p class="card-text text-center">{{ $member->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            <div class="content-wrapper">
                {!! $data->content !!}
            </div>
            @endif
        </div>
    </section>
@endsection
