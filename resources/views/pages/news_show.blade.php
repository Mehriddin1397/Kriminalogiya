<x-main title="{{$category->slug}}">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{$category->slug}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('categoryId',$category->id)}}">{{$category->slug}}</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{$new->name}}</li>
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
                                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach($new->photos as $photo)
                                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                        <img src="{{ asset('storage/' . $photo->file_path) }}" alt="" >
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="down-content">
                                        <a href="#"><h4>{{$new->name}}</h4></a>
                                        <p>{{ $new->created_at->format('Y') }}.{{ $new->created_at->format('m') }}.{{ $new->created_at->format('d') }}</p>
                                        <p class="description">
                                            {{$new->title}}

                                            <br><br>
                                            {!! $new->description !!}
                                        </p>
                                        @php
                                            function toEmbedLink($url) {
                                                // parse_url yordamida querydan video ID ajratamiz
                                                $parts = parse_url($url);
                                                if (isset($parts['query'])) {
                                                    parse_str($parts['query'], $query);
                                                    if (isset($query['v'])) {
                                                        return 'https://www.youtube.com/embed/' . $query['v'];
                                                    }
                                                }

                                                // youtu.be formatiga ishlov berish
                                                if (isset($parts['host']) && $parts['host'] === 'youtu.be') {
                                                    return 'https://www.youtube.com/embed' . $parts['path'];
                                                }

                                                return null;
                                            }

                                            $embedLink = $new->youtube_link ? toEmbedLink($new->youtube_link) : null;
                                        @endphp

                                        @if($embedLink)
                                            <div class="container mt-4">
                                                <div class="ratio ratio-16x9">
                                                    <iframe
                                                        src="{{ $embedLink }}"
                                                        title="YouTube video"
                                                        allowfullscreen>
                                                    </iframe>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex pt-2 ">
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="{{$contact->telegram_link}}"><i class="fab fa-telegram"></i></a>
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="{{$contact->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
                                                    @if(!empty($new->youtube_link))
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="{{$contact->youtube_link}}"><i class="fab fa-youtube"></i></a>
                                                    @endif
                                                    <a class="btn btn-outline-dark btn-social" target="_blank" href="{{$contact->whatsapp_link}}"><i class="fab fa-whatsapp"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="main-button-red text-center">
                                    <a href="{{route('categoryId',$category->id)}}">Ortga</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-main>
