<x-main title="Bosh sahifa" >
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5" >
        <div class="owl-carousel header-carousel position-relative" >
            <div class="owl-carousel-item position-relative ">
                <img class="img-fluid" src="img/1.6.png" alt="">
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.2.png" alt="">
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.4.png" alt="">
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.3.png" alt="">
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.1.png" alt="">
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/1.5.png" alt="">
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Mahalliy Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">{{__('lan.sun_yan')}}</h1>
            </div>
            <div class="row g-4">
                @foreach($mnews as $new)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('storage/'.$new->photos->first()->file_path)}}" alt="" style="width:408px; height:245px; !important;"  >
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3"></h4>
                            <p>{{$new->name}}</p>
                            <a class="fw-medium" href="{{route('show',['category_id'=>8,'id'=>$new->id])}}">{{__('lan.batafsil')}}<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Mahalliy end -->

    <!-- Xorijiy Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">{{__('lan.sun_yann')}}</h1>
            </div>
            <div class="row g-4">
                @foreach($xnews as $new)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('storage/'.$new->photos->first()->file_path)}}" alt="" style="width:408px; height:245px; !important;"  >
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3"></h4>
                            <p>{{$new->name}}</p>
                            <a class="fw-medium" href="{{route('show',['category_id'=>22,'id'=>$new->id])}}">{{__('lan.batafsil')}}<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Xorijiy End -->


    <!-- Ma'lumotlar Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">{{__('lan.malumot')}}</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="assets/img/i2.jfif" alt="" style="width:275px; height:183px; !important;">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <a href="{{route('categoryId',13)}}"><h5 class="mb-0">{{__('lan.ijti_ama_tad')}}</h5></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="assets/img/i3.jfif" alt="" style="width:275px; height:183px; !important;">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                             <a href="{{route('categoryId',15)}}"><h5 class="mb-0">{{__('lan.kitobxonlik')}}</h5> </a>
                         </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="assets/img/i4.jfif" alt="" style="width:275px; height:183px; !important;">

                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                             <a href="{{route('categoryId',15)}}"><h5 class="mb-0">{{__('lan.jin_va_jin_saq')}}</h5> </a>
                         </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="assets/img/kriminalogiya.jpg" alt="" style="width:275px; height:183px; !important;">
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                             <a href="{{route('categoryId',33)}}"><h5 class="mb-0">{{__('lan.krimina_ins_jur')}}</h5>  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ma'lumotlar End -->

    <!-- About Start -->
    <div class="container-xxl py-5 bg-light">
        <div class="containerr">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">{{__('lan.ins_haq')}}</h1>
            </div>
            <div class="containerr">
                <div class="stat-card">
                    <div class="overflow-hidden  position-relative d-flex justify-content-center ">
                        <img class="img-fluid" src="assets/img/talaba.png" width="50px" alt="">
                    </div>
                    <div class="number">{{$researchcount}}</div>
                    <div class="label">{{__('lan.maqolalar')}}</div>
                </div>

                <div class="stat-card">
                    <div class="overflow-hidden  position-relative d-flex justify-content-center ">
                        <img class="img-fluid" src="assets/img/training.png" width="50px" alt="">

                    </div>
                    <div class="number">{{$newscount}}</div>
                    <div class="label">{{__('lan.yangilik')}}</div>
                </div>

                <div class="stat-card">
                    <div class="overflow-hidden  position-relative d-flex justify-content-center ">
                        <img class="img-fluid" src="assets/img/book.png" width="50px" alt="">


                    </div>
                    <div class="number">{{$category2PartnersCount}}</div>
                    <div class="label">{{__('lan.xor_ham')}}</div>
                </div>

                <div class="stat-card">
                    <div class="overflow-hidden  position-relative d-flex justify-content-center ">
                        <img class="img-fluid" src="assets/img/partnership.png" width="50px" alt="">
                    </div>
                    <div class="number">{{$category1PartnersCount}}</div>
                    <div class="label">{{__('lan.mah_ham')}}</div>
                </div>
            </div>
            <style>
                .containerr {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 20px;
                    justify-content: center;
                }

                .stat-card {
                    background-color: white;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    width: 250px;
                    padding: 20px;
                    text-align: center;
                    transition: transform 0.3s ease;
                }

                .stat-card:hover {
                    transform: translateY(-5px);
                    .number{
                        color: greenyellow;
                    }
                    .label{
                        color: blue;
                    }
                }

                .number {
                    font-size: 25px;
                    font-weight: bold;
                    color: #2c3e50;
                    margin-bottom: 10px;
                }

                .label {
                    font-size: 16px;
                    color: #7f8c8d;
                    text-transform: uppercase;
                }
            </style>

        </div>
    </div>

    <!-- About End -->


</x-main>
