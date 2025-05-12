<x-main title="{{$category->slug}}">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{$category->slug}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white"
                                                   href="{{ route('categoryId', $category->id) }}">{{$category->slug}}</a>
                    </li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{$research->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center ">
                <h1 class="display-5 mb-5 section__h1">{{ $research->name }}</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-12">
                    <div class="responsive-pdf-container">
                        <iframe
                            src="{{ asset('storage/' . $research->file_path) }}#toolbar=0"
                            frameborder="0"
                            allowfullscreen
                        ></iframe>
                    </div>
                    <div class="d-flex justify-content-center d__flex_button" >
                        <div class="text-center mt-3 p-3">
                            <a href="{{route('main')}}" class="btn btn-danger">
                                {{ __('lan.bosh')}}
                            </a>
                        </div>
                        <div class="text-center mt-3 p-3">
                            <a href="{{ asset('storage/' . $research->file_path) }}" class="btn btn-primary" download>
                                {{ __('lan.yuklab_olish')}}
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .responsive-pdf-container {
            position: relative;
            padding-bottom: 125%; /* Aspect ratio (height/width), taxminan 4:3 */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .responsive-pdf-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 768px) {
            .responsive-pdf-container {
                padding-bottom: 150%; /* Mobil qurilmalar uchun balandroq qilish */
            }
        }

        @media (max-width: 480px) {
            .responsive-pdf-container {
                padding-bottom: 170%;
            }
            .d__flex_button div a {
                font-size: 0.5rem;

            }
            .section__h1{
                font-size: 1rem;
            }

        }
    </style>

</x-main>
