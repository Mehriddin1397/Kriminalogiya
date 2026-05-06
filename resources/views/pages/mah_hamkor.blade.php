<x-main title="{{__('lan.hamkor')}}">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{__('lan.hamkor')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{__('lan.hamkor')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-xxl py-5">
        <section class="meetings-page" id="meetings">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">

                        <div class="meeting-single-item shadow p-4 rounded bg-light">
                            <div class="down-content text-center">

                                <!-- Katta text -->
                                <h2 class="fw-bold display-5 mb-4">
                                    {!! $text->description !!}
                                </h2>

                                <!-- Hamkorlar -->
                                <div class="row">
                                    @foreach($mah_hamkor as $hamkor)
                                        <div class="col-md-4 col-sm-6 mb-3">
                                            <div class="p-2 border rounded bg-white h-100">

                                                <!-- Rasm -->
                                                @if($photo = $hamkor->photos->first())
                                                    <img src="{{ asset('storage/'.$photo->file_path) }}"
                                                         alt="{{ $hamkor->name }}"
                                                         class="img-fluid mb-2"
                                                         style="max-height:80px; object-fit:contain;"
                                                         loading="lazy"
                                                         onerror="this.style.display='none'">
                                                @endif

                                                <!-- Nomi -->
                                                <p class="mb-0 small fw-semibold">
                                                    <a href="{{$hamkor->link}}" target="_blank">{{ $hamkor->name }}</a>
                                                </p>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="main-button-red text-center mt-4">
                            <a href="{{ route('main') }}">{{ __('lan.ortga') }}</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

</x-main>
