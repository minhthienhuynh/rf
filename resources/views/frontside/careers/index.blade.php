@extends('layouts.master')
@section('content')
    <section class="main">
        <div class="page-visual" style="background-image: url('frontside/assets/img/images/visual-img-04.jpg');"></div>
        <div class="container large post-detail">
            <h2 class="primary-title text-center"><span class="section-ttl">Join With Our Team To Make <br /> Good Things
                    Happen </span></h2>
            <h3>Resilient Forestry Is Hiring!</h3>
            <p>Want to get paid to hike and camp in the woods? Come work for a growing company on ecologically focused
                projects with opportunities to learn alongside experienced ecologists!</p>
            <p>Resilient Forestry works in all aspects of forestry, forest science, and forest management, specializing in
                ecological forest restoration. We are based in Seattle and work across the Pacific Northwest (PNW) with
                small and large public and private landowners on a range of projects.</p>
            <hr class="my-5">
            <h3>All Jobs</h3>
            @if ($data->count() > 0)
                <div class="row list-jobs">
                    @foreach ($data as $item) 
                        <div class="col-md-3">
                            <div class="card post-card job-post"><a class="post-link-img" href="{{ route('frontside.careers.detail', $item->slug) }}"><img
                                        class="card-img-top" src="{{ Voyager::image($item->image) }}"
                                        alt="">{{ $item->title }}</a>
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
            <h3>Our Hiring Policy</h3>
            <p>Resilient Forestry is an equal opportunity employer that is committed to diversity and inclusion in the
                workplace. We prohibit discrimination and harassment of any kind based on race, color, sex, religion, sexual
                orientation, national origin, disability, genetic information, pregnancy, or any other protected
                characteristic as outlined by federal, state, or local laws.</p>
            <p>This policy applies to all employment practices within our organization, including hiring, recruiting,
                promotion, termination, layoff, recall, leave of absence, compensation, benefits, training, and
                apprenticeship. Resilient Forestry makes hiring decisions based solely on qualifications, merit, and
                business needs at the time.</p>
            <p>Resilient Forestry does not discriminate based on disability in its hiring or employment practices and
                complies with all regulations promulgated by the U.S. Equal Employment Opportunity Commission under Title I
                of the Americans with Disabilities Act (ADA).</p>
            <p>Resilient Forestry requires all employees to provide proof of vaccination against Covid-19.</p>
        </div>
    </section>
@endsection
