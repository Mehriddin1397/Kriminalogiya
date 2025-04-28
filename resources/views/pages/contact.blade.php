<x-main title="Contact">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{__('lan.boglanish')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{__('lan.boglanish')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">{{__('lan.boglanish')}}</h1>
                        </div>
                        <p class="mb-4">{{__('lan.kriminalog')}}</p>
                        <p class="mb-4"><b>Manzil: </b> {{$contact->address}}</p>
                        <p class="mb-4"><b>Telefon raqami: </b> {{$contact->phone}}</p>
                        <p class="mb-4"><b>Elektron manzili: </b> {{$contact->email}}</p>
                        <p class="mb-4"><b>Ish vaqti: </b> {{$contact->worktime}}</p>
                        <p class="mb-4"><b>YouTube: </b> <a  target="_blank" href="{{$contact->youtube_link}}">{{$contact->youtube_link}}</a> <a class="btn btn-sm-square bg-white text-primary me-1" target="_blank" href="{{$contact->youtube_link}}"><i class="fab fa-youtube"></i></a></p>
                        <p class="mb-4"><b>Telegram: </b> <a  target="_blank" href="{{$contact->telegram_link}}">{{$contact->telegram_link}}  </a><a class="btn btn-sm-square bg-white text-primary me-1" target="_blank" href="{{$contact->telegram_link}}"><i class="fab fa-telegram"></i></a></p>
                        <p class="mb-4"><b>Whatsapp: </b> <a  target="_blank" href="{{$contact->whatsapp_link}}">{{$contact->whatsapp_link}} </a><a class="btn btn-sm-square bg-white text-primary me-0" target="_blank" href="{{$contact->whatsapp_link}}"><i class="fab fa-whatsapp"></i></a></p>
                        <p class="mb-4"><b>Facebook: </b> <a  target="_blank" href="{{$contact->facebook_link}}">{{$contact->facebook_link}}</a> <a class="btn btn-sm-square bg-white text-primary me-1" target="_blank" href="{{$contact->facebook_link}}"><i class="fab fa-facebook-f"></i></a></p>

                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.7171271314264!2d69.35085011134264!3d41.33676407118661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef5000b14d5e3%3A0x4aaeaebef082e1c2!2sKriminologiya%20tadqiqot%20instituti!5e0!3m2!1suz!2s!4v1745345559699!5m2!1suz!2s"
                                frameborder="0" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</x-main>
