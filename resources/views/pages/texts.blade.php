<x-main title="{{$category->slug}}">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{$category->slug}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">{{$category->slug}}</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{$institut->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-xxl py-5">
        <section class="meetings-page" id="meetings" style=" padding-top: 20px; !important;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="meeting-single-item">
                                    <div class="thumb">

                                    </div>
                                    <div class="down-content">
                                        <a href="#"><h4>{{$institut->name}}</h4></a>
                                        <p>{{ $institut->created_at->format('Y') }}.{{ $institut->created_at->format('m') }}.{{ $institut->created_at->format('d') }}</p>
                                        <p class="description">
                                            {!! $institut->description !!}
                                        </p>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex pt-2 ">
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="{{$contact->telegram_link}}"><i class="fab fa-telegram"></i></a>
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="{{$contact->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="{{$contact->whatsapp_link}}"><i class="fab fa-whatsapp"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="main-button-red text-center">
                                    <a href="{{route('categoryId',$category->id)}}">{{__('lan.ortga')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-main>
