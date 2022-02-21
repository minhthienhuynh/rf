@extends('layouts.master')
@section('content')
    <section class="main">
        <div class="page-visual" style="background-image: url('frontside/assets/img/images/visual-img-02.jpg');"></div>
        <div class="page-2-column">
            <div class="left-sidebar">
                <div class="searchbox">
                    <div class="input-text-wrapper">
                        <input class="search-input form-control" type="text" placeholder="Search">
                        <div class="close-btn"></div>
                    </div>
                </div>
                <p class="sidebar-ttl">Category</p>
                <div class="siderbar-block">
                    <ul class="category-list">
                        <li><a class="list-icon" href="#">All blogs (18) </a></li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                <label class="form-check-label" for="flexCheckDefault1">Stewardship (4)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                <label class="form-check-label" for="flexCheckDefault2">Planning & Adaptive Management
                                    (4)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                <label class="form-check-label" for="flexCheckDefault3">Science (3)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                                <label class="form-check-label" for="flexCheckDefault4">Timber (3)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
                                <label class="form-check-label" for="flexCheckDefault5">Geospatial and Software (4)</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <p class="sidebar-ttl">Recent Blogs</p>
                <div class="siderbar-block">
                    <ul class="category-list">
                        <li><a href="#">Weyerhaeuser</a></li>
                        <li><a href="#">Orchard-Loner</a></li>
                        <li><a href="#">Bluesource</a></li>
                        <li><a href="#">Sean's PhD</a></li>
                        <li><a href="#">Miles' PNW work</a></li>
                        <li><a href="#">Allison’s work?</a></li>
                        <li><a href="#">KC FLAT (soon?)</a></li>
                        <li><a href="#">O-L lidar flight (soon?)</a></li>
                        <li><a href="#">Twisp</a></li>
                        <li><a href="#">Oly M&E</a></li>
                    </ul>
                </div>
            </div>
            <div class="page-content">
                <h2 class="primary-title"><span class="section-sub-ttl">ALL BLOGS</span><span
                        class="section-ttl">Journeys to Nature</span></h2>
                <div class="row archive-post-card">
                    <div class="col-md-4">
                        <div class="card post-card services-post"><a class="post-link-img" href="./blog-detail.html"><img
                                    class="card-img-top" src="frontside/assets/img/images/services-post-img-01.jpg" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="./blog-detail.html">Miller River</a></h5>
                                <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et has
                                    minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                <div class="card-footer">
                                    <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                        href="./blog-detail.html">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card post-card services-post"><a class="post-link-img" href="./blog-detail.html"><img
                                    class="card-img-top" src="frontside/assets/img/images/services-post-img-02.jpg" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="./blog-detail.html">Other Small Private Land Owner
                                        Projects</a></h5>
                                <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et has
                                    minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                <div class="card-footer">
                                    <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                        href="./blog-detail.html">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card post-card services-post"><a class="post-link-img" href="./blog-detail.html"><img
                                    class="card-img-top" src="frontside/assets/img/images/services-post-img-03.jpg" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="./blog-detail.html">King’s Country</a></h5>
                                <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et has
                                    minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                <div class="card-footer">
                                    <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                        href="./blog-detail.html">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card post-card services-post"><a class="post-link-img" href="./blog-detail.html"><img
                                    class="card-img-top" src="frontside/assets/img/images/services-post-img-04.jpg" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="./blog-detail.html">Miller River</a></h5>
                                <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et has
                                    minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                <div class="card-footer">
                                    <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                        href="./blog-detail.html">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card post-card services-post"><a class="post-link-img" href="./blog-detail.html"><img
                                    class="card-img-top" src="frontside/assets/img/images/services-post-img-05.jpg" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="./blog-detail.html">Orchard-Loner</a></h5>
                                <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et has
                                    minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                <div class="card-footer">
                                    <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                        href="./blog-detail.html">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card post-card services-post"><a class="post-link-img" href="./blog-detail.html"><img
                                    class="card-img-top" src="frontside/assets/img/images/services-post-img-06.jpg" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="./blog-detail.html">Bluesource</a></h5>
                                <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et has
                                    minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                <div class="card-footer">
                                    <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                        href="./blog-detail.html">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card post-card services-post"><a class="post-link-img" href="./blog-detail.html"><img
                                    class="card-img-top" src="frontside/assets/img/images/services-post-img-07.jpg" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="./blog-detail.html">Sean's PhD</a></h5>
                                <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et has
                                    minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                <div class="card-footer">
                                    <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                        href="./blog-detail.html">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card post-card services-post"><a class="post-link-img" href="./blog-detail.html"><img
                                    class="card-img-top" src="frontside/assets/img/images/services-post-img-08.jpg" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="./blog-detail.html">Miles’ PNW Work</a></h5>
                                <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et has
                                    minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                <div class="card-footer">
                                    <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                        href="./blog-detail.html">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card post-card services-post"><a class="post-link-img" href="./blog-detail.html"><img
                                    class="card-img-top" src="frontside/assets/img/images/services-post-img-09.jpg" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="./blog-detail.html">Allison’s work?</a></h5>
                                <p class="card-text">Mea aeterno eleifen ntiopam ad, nam no suscipitquaeren Et has
                                    minim elitr intellegat ntiopam.Mea aeterno eleifen</p>
                                <div class="card-footer">
                                    <p class="post-date">8/23/2021</p><a class="post-link btn-more"
                                        href="./blog-detail.html">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination"> <a class="dir disabled" href="#">Prev</a><a class="current"
                        href="#">1</a><a href="#">2</a><a href="#">3</a><span>...</span><a href="#">18</a><a
                        class="dir" href="#">Next </a></div>
            </div>
        </div>
    </section>
@endsection
