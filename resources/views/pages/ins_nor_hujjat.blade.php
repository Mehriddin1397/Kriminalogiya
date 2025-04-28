<x-main title="{{__('lan.ins_nor_hujjat')}}">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{__('lan.ins_nor_hujjat')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{__('lan.ins_nor_hujjat')}}</li>
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
                                        <a href="#"><h4>{{__('lan.ins_nor_hujjat')}}</h4></a>
                                        <p>2025.04.28</p>
                                        <p class="description">
                                            <a href="https://lex.uz/uz/docs/7034904" target="_blank">{{__('lan.qaror_kri')}}</a> <br>
                                            <a href="https://www.lex.uz/uz/docs/-6755597" target="_blank">{{__('lan.farmoni')}}</a><br>
                                            <a href="https://www.lex.uz/docs/-6755253" target="_blank">{{__('lan.qarori')}}</a>

                                        </p>
                                        <div class="row">
                                            <div class="col-lg-12">
{{--                                                <div class="d-flex pt-2 ">--}}
{{--                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="{{$contact->telegram_link}}"><i class="fab fa-telegram"></i></a>--}}
{{--                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="{{$contact->facebook_link}}"><i class="fab fa-facebook-f"></i></a>--}}
{{--                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="{{$contact->whatsapp_link}}"><i class="fab fa-whatsapp"></i></a>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="main-button-red text-center">
                                    <a href="{{route('main')}}">Ortga</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-main>
