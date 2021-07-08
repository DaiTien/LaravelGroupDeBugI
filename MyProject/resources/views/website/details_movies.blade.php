@extends('website.layouts.master')
@section('title', 'Details')
@section('content')
    <!-- PRICING SECTION -->
    <div class="section">
        <div class="container">
            <div class="pricing">
                <div class="pricing-header">
                    <span class="main-color"></span>Thông tin phim
                </div>
                <div class="pricing-list">
                    <div class="row">
                        <div class="col-dt-8 col-tl-12 col-mb-12">
                            <div class="pricing-box hightlight">
                                {{-- <div class="pricing-box-header">
                                    <h2 class="title-details__movie">Start Trek</h2>
                                </div> --}}
                                <div class="pricing-box-content text-left">
                                    <h2 class="title-details__movie">Start Trek</h2>
                                    <p class="content-details__movie ">
                                        It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                        it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                        here, content here', making it look like readable English.
                                    </p>

                                </div>
                                <div class="pricing-box-action">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/pKFUZ10Wmbw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    <div class="article__actions article__actions--details">
                                        <div class="article__download">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z">
                                                </path>
                                            </svg>
                                            Download:
                                            <a href="#" download="#">480p</a>
                                            <a href="#" download="#">720p</a>
                                            <a href="#" download="#">1080p</a>
                                            <a href="#" download="#">4k</a>
                                        </div>

                                        <!-- add .active class -->
                                        <a class="article__favorites" href="/details"><svg height="512pt"
                                                viewBox="0 -31 512.00026 512" width="512pt"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m164.960938 300.003906h.023437c.019531 0 .039063-.003906.058594-.003906h271.957031c6.695312 0 12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531-5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406 6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531 0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0" />
                                                <path
                                                    d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0" />
                                                <path
                                                    d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0" />
                                            </svg> Đặt vé</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-dt-4 col-tl-12 col-mb-12">
                            <div class="pricing-box pricing-box__image hightlight">
                                <a href="#" class="movie-item">
                                    <img src="/website/images/series/star-trek.jpg" alt="">
                                    <div class="movie-item-content">
                                        <div class="movie-item-title">
                                            Star Trek
                                        </div>
                                        <div class="movie-infos">
                                            <div class="movie-info">
                                                <i class="bx bxs-star"></i>
                                                <span>9.5</span>
                                            </div>
                                            <div class="movie-info">
                                                <i class="bx bxs-time"></i>
                                                <span>120 mins</span>
                                            </div>
                                            <div class="movie-info">
                                                <span>HD</span>
                                            </div>
                                            <div class="movie-info">
                                                <span>16+</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                {{-- <div class="pricing-box-content pricing-box-content__image">
                                    <p>ădjalwdkawkjawlkdj</p>
                                </div> --}}
                            </div>

                            {{-- <div class="pricing-box-action">

                            </div> --}}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END PRICING SECTION -->
@endsection
