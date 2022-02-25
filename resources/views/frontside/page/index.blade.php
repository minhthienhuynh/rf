@extends('layouts.master')
@include('layouts.includes.seo', ['model'=> $data, 'type'=>''])
@section('content')
    <section class="main">
        <div class="page-visual" style="background-image: url('{{ voyager::image($data->hero_picture) }}');"></div>
        <div class="container post-detail">
            <h2 class="primary-title text-center">
                <span class="section-sub-ttl">ABOUT US</span>
                <span class="section-ttl">{{ $data->title }}</span>
            </h2>
            @if ($slug == 'members')
                <div class="row section-members">
                    @foreach ($dataMember as $member)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card post-card member-card"><img class="card-img-top"
                                    src="{{ voyager::image($member->avatar) }}" alt="{{ $member->full_name }}">
                                <div class="card-body">
                                    <h4 class="card-title primary-title text-center">
                                        <span class="section-sub-ttl">{{ $member->position }}</span>
                                    </h4>
                                    <p class="card-text text-center">{{ $member->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {!! $data->content !!}
            @endif
        </div>
    </section>
@endsection
