@extends('layouts.master')
@section('content')
    <section class="main">
        <!-- END: PAGE - HOME PAGE-->
        <div class="main-visual" style="background-image: url('frontside/assets/img/images/visual-img-01.jpg');">
            <div class="container large">
                <h2 class="text-center">
                    Conservation, Forestry, and <br>Management in a Changing Landscape</h2>
                <p class="visual-desc text-center">Resilient Forestry has a unique skill set in monitoring changes in
                    forests over time for compliance or research objectives. </p>
                <div class="visual-button text-center"><a class="btn btn-contact" href="#">Contact Us</a></div>
            </div>
        </div>
        <div class="content-section section-services">
            <div class="container large">
                <h3 class="primary-title text-center"><span class="section-sub-ttl">OUR services</span><span
                        class="section-ttl">
                        Services of forest inventories and<br>management planning</span></h3>
                <ul class="nav nav-tabs tab-title-only" id="tab-services" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="stewardship-tab" data-bs-toggle="tab"
                            data-bs-target="#stewardship" type="button" role="tab" aria-controls="stewardship"
                            aria-selected="true">Stewardship</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="planning-tab" data-bs-toggle="tab" data-bs-target="#planning"
                            type="button" role="tab" aria-controls="planning" aria-selected="true">Planning & Adaptive
                            Management</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="science-tab" data-bs-toggle="tab" data-bs-target="#science"
                            type="button" role="tab" aria-controls="science" aria-selected="true">Science</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="timber-tab" data-bs-toggle="tab" data-bs-target="#timber"
                            type="button" role="tab" aria-controls="timber" aria-selected="true">Timber</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="geospatial-tab" data-bs-toggle="tab" data-bs-target="#geospatial"
                            type="button" role="tab" aria-controls="geospatial" aria-selected="true">Geospatial and
                            Software</button>
                    </li>
                </ul>
                <div class="tab-content" id="tab-services-content">
                    <div class="tab-pane fade show active" id="stewardship" role="tabpanel"
                        aria-labelledby="stewardship-tab">
                        <div class="services-content">
                            <div class="services-block-intro">
                                <h4 class="services-intro-ttl">STEWARDSHIP</h4>
                                <p>We combine field forestry capabilities with landscape-scale analyses and
                                    multi-stakeholder decision making for publicly-owned lands, private forest owners,
                                    and non-profits. Services include forest inventories and management planning, sale
                                    layout and harvest administration.</p>
                                <div class="block-button"><a class="text-link-arrow" href="./services.html">See
                                        More</a></div>
                            </div>
                            <div class="services-block-slider basic-slider">
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="./blog-detail.html"><img class="card-img-top"
                                            src="frontside/assets/img/images/services-post-img-01.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="./blog-detail.html">Miller River</a></h5>
                                        <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren
                                            Et has minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                        <div class="card-footer">
                                            <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                                href="./blog-detail.html">More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="./blog-detail.html"><img class="card-img-top"
                                            src="frontside/assets/img/images/services-post-img-02.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="card-title"> <a href="./blog-detail.html">Other Small Private
                                                Land Owner Projects</a></h5>
                                        <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren
                                            Et has minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                        <div class="card-footer">
                                            <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                                href="./blog-detail.html">More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="./blog-detail.html"><img class="card-img-top"
                                            src="frontside/assets/img/images/services-post-img-03.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="./blog-detail.html">King’s Country</a></h5>
                                        <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren
                                            Et has minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                        <div class="card-footer">
                                            <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                                href="./blog-detail.html">More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="./blog-detail.html"><img class="card-img-top"
                                            src="frontside/assets/img/images/services-post-img-02.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="./blog-detail.html">Other Small Private
                                                Land Owner Projects</a></h5>
                                        <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no
                                            suscipitquaeren Et has minim elitr intellegat ntiopam.Mea aeterno eleifen
                                        </p>
                                        <div class="card-footer">
                                            <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                                href="./blog-detail.html">More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="planning" role="tabpanel" aria-labelledby="stewardship-tab">
                        <div class="services-content">
                            <div class="services-block-intro">
                                <h4 class="services-intro-ttl">Planning & Adaptive Management</h4>
                                <p>We combine field forestry capabilities with landscape-scale analyses and
                                    multi-stakeholder decision making for publicly-owned lands, private forest owners,
                                    and non-profits. Services include forest inventories and management planning, sale
                                    layout and harvest administration.</p>
                                <div class="block-button"><a class="text-link-arrow" href="./blog-category.html">See
                                        More</a></div>
                            </div>
                            <div class="services-block-slider basic-slider">
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="./blog-detail.html"><img class="card-img-top"
                                            src="frontside/assets/img/images/services-post-img-01.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="./blog-detail.html">Miller River</a></h5>
                                        <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no
                                            suscipitquaeren Et has minim elitr intellegat ntiopam.Mea aeterno eleifen
                                        </p>
                                        <div class="card-footer">
                                            <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                                href="./blog-detail.html">More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="science" role="tabpanel" aria-labelledby="stewardship-tab">
                        <div class="services-content">
                            <div class="services-block-intro">
                                <h4 class="services-intro-ttl">Science</h4>
                                <p>We combine field forestry capabilities with landscape-scale analyses and
                                    multi-stakeholder decision making for publicly-owned lands, private forest owners,
                                    and non-profits. Services include forest inventories and management planning, sale
                                    layout and harvest administration.</p>
                                <div class="block-button"><a class="text-link-arrow" href="./blog-category.html">See
                                        More</a></div>
                            </div>
                            <div class="services-block-slider basic-slider">
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="./blog-detail.html"><img class="card-img-top"
                                            src="frontside/assets/img/images/services-post-img-01.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="./blog-detail.html">Miller River</a></h5>
                                        <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no
                                            suscipitquaeren Et has minim elitr intellegat ntiopam.Mea aeterno eleifen
                                        </p>
                                        <div class="card-footer">
                                            <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                                href="./blog-detail.html">More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="timber" role="tabpanel" aria-labelledby="stewardship-tab">
                        <div class="services-content">
                            <div class="services-block-intro">
                                <h4 class="services-intro-ttl">Timber</h4>
                                <p>We combine field forestry capabilities with landscape-scale analyses and
                                    multi-stakeholder decision making for publicly-owned lands, private forest owners,
                                    and non-profits. Services include forest inventories and management planning, sale
                                    layout and harvest administration.</p>
                                <div class="block-button"><a class="text-link-arrow" href="./blog-category.html">See
                                        More</a></div>
                            </div>
                            <div class="services-block-slider basic-slider">
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="./blog-detail.html"><img class="card-img-top"
                                            src="frontside/assets/img/images/services-post-img-01.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="./blog-detail.html">Miller River</a></h5>
                                        <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no
                                            suscipitquaeren Et has minim elitr intellegat ntiopam.Mea aeterno eleifen
                                        </p>
                                        <div class="card-footer">
                                            <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                                href="./blog-detail.html">More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="geospatial" role="tabpanel" aria-labelledby="stewardship-tab">
                        <div class="services-content">
                            <div class="services-block-intro">
                                <h4 class="services-intro-ttl">Geospatial and Software</h4>
                                <p>We combine field forestry capabilities with landscape-scale analyses and
                                    multi-stakeholder decision making for publicly-owned lands, private forest owners,
                                    and non-profits. Services include forest inventories and management planning, sale
                                    layout and harvest administration.</p>
                                <div class="block-button"><a class="text-link-arrow" href="./blog-category.html">See
                                        More</a></div>
                            </div>
                            <div class="services-block-slider basic-slider">
                                <div class="card post-card services-post"><a class="post-link-img"
                                        href="./blog-detail.html"><img class="card-img-top"
                                            src="frontside/assets/img/images/services-post-img-01.jpg" alt=""></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="./blog-detail.html">Miller River</a></h5>
                                        <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no
                                            suscipitquaeren Et has minim elitr intellegat ntiopam.Mea aeterno eleifen
                                        </p>
                                        <div class="card-footer">
                                            <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                                href="./blog-detail.html">More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-section section-aboutus">
            <div class="container large">
                <h3 class="primary-title text-center"><span class="section-sub-ttl">ABOUT US</span><span
                        class="section-ttl">Exceptional Solution For Forestry Project</span></h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="aboutus-card">
                            <div class="card-img"> <img src="frontside/assets/img/images/about-img-01.jpg"
                                    width="100%" alt=""></div>
                            <div class="card-content">
                                <h4 class="card-ttl text-center">MISSION/ VISION</h4>
                                <p class="card-txt">Et has minim elitr intellegat. Meaning aeterno eleife
                                    antiopam ad, nam no suscipiuaeren. Et has minim elitrele intellegat mea aeterno
                                    eleifemination antiopam ad, nam no suscipituition.</p>
                            </div><a class="card-link" href="./vision.html"> </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="aboutus-card">
                            <div class="card-img"> <img src="frontside/assets/img/images/about-img-02.jpg"
                                    width="100%" alt=""></div>
                            <div class="card-content">
                                <h4 class="card-ttl text-center">DIVERSITY</h4>
                                <p class="card-txt">Et has minim elitr intellegat. Meaning aeterno eleife
                                    antiopam ad, nam no suscipiuaeren. Et has minim elitrele intellegat mea aeterno
                                    eleifemination antiopam ad, nam no suscipituition.</p>
                            </div><a class="card-link" href="./diversity.html"> </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="aboutus-card">
                            <div class="card-img"> <img src="frontside/assets/img/images/about-img-03.jpg"
                                    width="100%" alt=""></div>
                            <div class="card-content">
                                <h4 class="card-ttl text-center">MEMBERS</h4>
                                <p class="card-txt">Et has minim elitr intellegat. Meaning aeterno eleife
                                    antiopam ad, nam no suscipiuaeren. Et has minim elitrele intellegat mea aeterno
                                    eleifemination antiopam ad, nam no suscipituition.</p>
                            </div><a class="card-link" href="./members.html"> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-section section-blog">
            <div class="container large">
                <h3 class="primary-title text-center"><span class="section-sub-ttl">BLOG</span><span
                        class="section-ttl">Our Latest Blogs</span></h3>
                <div class="latest-blog-section">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card post-card services-post"><a class="post-link-img"
                                    href="./blog-detail.html"><img class="card-img-top"
                                        src="frontside/assets/img/images/blog-img-01.jpg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="./blog-detail.html">Weyerhaeuser</a></h5>
                                    <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et
                                        has minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                    <div class="card-footer">
                                        <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                            href="./blog-detail.html">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card post-card services-post"><a class="post-link-img"
                                    href="./blog-detail.html"><img class="card-img-top"
                                        src="frontside/assets/img/images/blog-img-02.jpg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="./blog-detail.html">Orchard-Loner</a></h5>
                                    <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et
                                        has minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                    <div class="card-footer">
                                        <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                            href="./blog-detail.html">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card post-card services-post"><a class="post-link-img"
                                    href="./blog-detail.html"><img class="card-img-top"
                                        src="frontside/assets/img/images/blog-img-03.jpg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="./blog-detail.html">Bluesource</a></h5>
                                    <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et
                                        has minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                    <div class="card-footer">
                                        <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                            href="./blog-detail.html">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card post-card services-post"><a class="post-link-img"
                                    href="./blog-detail.html"><img class="card-img-top"
                                        src="frontside/assets/img/images/blog-img-04.jpg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="./blog-detail.html">Sean's PhD</a></h5>
                                    <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et
                                        has minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                    <div class="card-footer">
                                        <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                            href="./blog-detail.html">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-button text-center"> <a class="text-link-arrow" href="#">See All
                        Blogs</a></div>
            </div>
        </div>
        <div class="content-section section-clients">
            <div class="container large">
                <h3 class="primary-title text-center"><span class="section-sub-ttl">CLIENTS</span><span
                        class="section-ttl">Trusted By</span></h3>
                <ul class="list-clients">
                    <li><img src="frontside/assets/img/images/clients/client-01.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-02.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-03.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-04.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-05.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-06.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-07.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-08.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-09.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-10.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-11.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-12.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-13.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-14.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-15.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-16.svg" widht="157" alt=""></li>
                    <li><img src="frontside/assets/img/images/clients/client-17.svg" widht="157" alt=""></li>
                </ul>
            </div>
        </div>
    </section>
@endsection
