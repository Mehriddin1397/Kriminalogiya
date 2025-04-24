<x-main title="{{$category->slug}}">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{$category->slug}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{$category->slug}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->



    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">
                            {{$category->slug}}
                </h1>
            </div>

            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        @if($categories->isNotEmpty())
                        @foreach($categories as $category)
                            <li class="mx-2 {{ $id == $category->id ? 'active' : '' }}"><a href="{{ route('categoryId', $category->id) }}" style="color: {{ $id == $category->id ? '#0a0a0a' : '' }} ">{{$category->name}}</a></li>
{{--                            <li class="mx-2 "><a href="#">{{$category->name}}</a></li>--}}
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="row g-4 ">
                <div class="col-12 ">

                    @foreach($researchs as $research)
                        <div class="xalqaro-hankorlik-section">
                            <div class="xalqaro-hankorlik-content">
                                <div class="xalqaro-hankorlik-image-container">
                                    @foreach($research->photos as $photo)
                                        <img src="{{asset('storage/'.$photo->file_path)}}" alt="Xalqaro hankorlik"
                                             class="xalqaro-hankorlik-img" width="100px" height="110px">
                                    @endforeach
                                </div>
                                <div class="xalqaro-hankorlik-text-container">
                                    <p class="xalqaro-hankorlik-quote">
                                        @foreach($research->categories as $category)
                                        <a href="{{route('show',['category_id'=>$category->id,'id'=>$research->id])}}">{{$research->name}}</a>
                                        @endforeach
                                    </p>
                                    <div class="xalqaro-hankorlik-meta">
                                        <span class="xalqaro-hankorlik-date">{{ $research->created_at->format('Y') }}.{{ $research->created_at->format('m') }}.{{ $research->created_at->format('d') }}
</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <style>
                        .xalqaro-hankorlik-section {
                            margin: 10px 0;
                            padding: 15px;
                            background-color: #f3f0ea;
                            border-radius: 4px;
                            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                        }

                        .xalqaro-hankorlik-content {
                            max-width: 800px;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            font-family: 'Segoe UI', Arial, sans-serif;
                            position: relative; /* Separator uchun parent konteyner */
                        }

                        .xalqaro-hankorlik-image-container {
                            margin: 0px 15px 0px 10px;
                        }

                        .xalqaro-hankorlik-text-container {
                            flex-grow: 1; /* Matn qismini kengaytirish */
                        }

                        .xalqaro-hankorlik-separator {
                            height: 80%;
                            /*background-color: #e0e0e0;*/
                            position: absolute;
                            right: -120px;
                            top: 20%;
                        }

                        .xalqaro-hankorlik-separator:hover
                        {
                            transform: scale(1.2); /* 10% kattalashadi */
                            transition: transform 0.3s ease;
                            cursor: pointer;
                        }

                        .xalqaro-hankorlik-quote {
                            font-size: 1.25rem;
                            line-height: 1.5;
                            color: #333;
                            margin: 0 0 15px 0;
                            font-weight: 500;
                        }

                        .xalqaro-hankorlik-meta {
                            text-align: left; /* Sanani chapga joylash */
                            margin-top: 10px;
                        }

                        .xalqaro-hankorlik-date {
                            color: #666;
                            font-size: 0.875rem;
                        }
                    </style>



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
