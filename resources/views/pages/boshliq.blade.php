<x-main title="{{__('lan.rahbariyat')}}">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{__('lan.rahbariyat')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{__('lan.rahbariyat')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->



    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">
                    {{__('lan.rahbariyat')}}
                </h1>
            </div>

            <div class="row g-4 ">
                <div class="col-12 ">

                    @foreach($boss as $bos)
                        <div class="xalqaro-hankorlik-section">
                            <div class="xalqaro-hankorlik-content">
                                <div class="xalqaro-hankorlik-image-container">
                                    @foreach($bos->photos as $photo)
                                        <img src="{{asset('storage/'.$photo->file_path)}}" alt="Xalqaro hankorlik"
                                             class="xalqaro-hankorlik-img" width="100px" height="110px">
                                    @endforeach
                                </div>
                                <div class="xalqaro-hankorlik-text-container">
                                    <p class="xalqaro-hankorlik-quote">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bossModal{{ $bos->id }}">
                                      {{$bos->name}}
                                        </a>
                                    </p>
                                    <div class="xalqaro-hankorlik-meta">
                                        <span class="xalqaro-hankorlik-date">{{__('lan.lavozim')}}: </span> {{$bos->post}}
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="bossModal{{ $bos->id }}" tabindex="-1" aria-labelledby="bossModalLabel{{ $bos->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content rounded-3 shadow">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="bossModalLabel{{ $bos->id }}">{{ $bos->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Yopish"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>{{__('lan.telefon')}}:</strong> {{ $bos->phone }}</p>
                                                <p><strong>{{__('lan.ish_jadvali')}}:</strong> {{ $bos->worktime }}</p>
                                                <p><strong>{{__('lan.email')}}:</strong> {{ $bos->email }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    {{__('lan.yopish')}}</button>
                                            </div>
                                        </div>
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
                            border-radius: 6px;
                            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                        }

                        .xalqaro-hankorlik-content {
                            display: flex;
                            flex-wrap: wrap; /* Mobil qurilmalar uchun o'rash */
                            align-items: center;
                            justify-content: flex-start;
                            font-family: 'Segoe UI', Arial, sans-serif;
                            gap: 15px;
                        }

                        .xalqaro-hankorlik-image-container img {
                            width: 100px;
                            height: 110px;
                            border-radius: 6px;
                            object-fit: cover;
                        }

                        .xalqaro-hankorlik-text-container {
                            flex-grow: 1;
                            min-width: 200px;
                        }

                        .xalqaro-hankorlik-quote {
                            font-size: 1.2rem;
                            color: #333;
                            margin: 0 0 10px 0;
                            font-weight: 600;
                            line-height: 1.4;
                        }

                        .xalqaro-hankorlik-meta {
                            font-size: 0.95rem;
                            color: #666;
                        }

                        /* Modal kichik ekranlarda yaxshi ko'rinishi uchun */
                        .modal-dialog {
                            max-width: 100%;
                            margin: 1.75rem auto;
                            padding: 0 1rem;
                        }

                        .modal-content {
                            border-radius: 12px;
                        }

                        /* ========================
                           RESPONSIVE DESIGN
                        ======================== */

                        @media (max-width: 768px) {
                            .xalqaro-hankorlik-content {
                                flex-direction: column;
                                align-items: flex-start;
                            }

                            .xalqaro-hankorlik-image-container img {
                                width: 90px;
                                height: 100px;
                                margin-bottom: 10px;
                            }

                            .xalqaro-hankorlik-text-container {
                                width: 100%;
                            }

                            .xalqaro-hankorlik-quote {
                                font-size: 1rem;
                            }

                            .xalqaro-hankorlik-meta {
                                font-size: 0.85rem;
                            }
                        }

                        @media (max-width: 480px) {
                            .xalqaro-hankorlik-image-container img {
                                width: 80px;
                                height: 90px;
                            }

                            .xalqaro-hankorlik-quote {
                                font-size: 0.95rem;
                            }

                            .xalqaro-hankorlik-meta {
                                font-size: 0.8rem;
                            }
                        }
                    </style>



                </div>
            </div>
        </div>
    </div>
</x-main>
