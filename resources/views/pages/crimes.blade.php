<x-main title="{{$category->slug}}">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{$category->slug}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('categoryId', $category->id) }}">{{$category->slug}}</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{$research->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">{{$research->name}}</h1>
            </div>
            <div class="row g-4 " >
                <div class="col-12 " >
                    <iframe
                        src="{{ asset('storage/' . $research->file_path) }}#toolbar=0"
                        width="900px"
                        height="900px"
                        style="border: none;
                         display: block; background-color: white; margin: 0 auto; padding: 0; overflow: hidden;"
                    ></iframe>
                    <a href="{{ asset('storage/' . $research->file_path) }}" download>Yuklab olish</a>
                </div>
            </div>
            {{--                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">--}}
            {{--                    <div class="rounded overflow-hidden">--}}
            {{--                        <div class="position-relative overflow-hidden">--}}
            {{--                            <img class="img-fluid w-100" src="img/portfolio-1.jpg" alt="">--}}
            {{--                            <div class="portfolio-overlay">--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="border border-5 border-light border-top-0 p-4">--}}
            {{--                            <p class="text-primary fw-medium mb-2">General Carpentry</p>--}}
            {{--                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.3s">--}}
            {{--                    <div class="rounded overflow-hidden">--}}
            {{--                        <div class="position-relative overflow-hidden">--}}
            {{--                            <img class="img-fluid w-100" src="img/portfolio-2.jpg" alt="">--}}
            {{--                            <div class="portfolio-overlay">--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-2.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="border border-5 border-light border-top-0 p-4">--}}
            {{--                            <p class="text-primary fw-medium mb-2">Custom Carpentry</p>--}}
            {{--                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.5s">--}}
            {{--                    <div class="rounded overflow-hidden">--}}
            {{--                        <div class="position-relative overflow-hidden">--}}
            {{--                            <img class="img-fluid w-100" src="img/portfolio-3.jpg" alt="">--}}
            {{--                            <div class="portfolio-overlay">--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-3.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="border border-5 border-light border-top-0 p-4">--}}
            {{--                            <p class="text-primary fw-medium mb-2">General Carpentry</p>--}}
            {{--                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.1s">--}}
            {{--                    <div class="rounded overflow-hidden">--}}
            {{--                        <div class="position-relative overflow-hidden">--}}
            {{--                            <img class="img-fluid w-100" src="img/portfolio-4.jpg" alt="">--}}
            {{--                            <div class="portfolio-overlay">--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-4.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="border border-5 border-light border-top-0 p-4">--}}
            {{--                            <p class="text-primary fw-medium mb-2">Custom Carpentry</p>--}}
            {{--                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.3s">--}}
            {{--                    <div class="rounded overflow-hidden">--}}
            {{--                        <div class="position-relative overflow-hidden">--}}
            {{--                            <img class="img-fluid w-100" src="img/portfolio-5.jpg" alt="">--}}
            {{--                            <div class="portfolio-overlay">--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-5.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="border border-5 border-light border-top-0 p-4">--}}
            {{--                            <p class="text-primary fw-medium mb-2">General Carpentry</p>--}}
            {{--                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.5s">--}}
            {{--                    <div class="rounded overflow-hidden">--}}
            {{--                        <div class="position-relative overflow-hidden">--}}
            {{--                            <img class="img-fluid w-100" src="img/portfolio-6.jpg" alt="">--}}
            {{--                            <div class="portfolio-overlay">--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-6.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="border border-5 border-light border-top-0 p-4">--}}
            {{--                            <p class="text-primary fw-medium mb-2">Custom Carpentry</p>--}}
            {{--                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
</x-main>
