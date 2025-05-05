<x-main title="{{__('lan.qidirish')}}">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{__('lan.qidirish')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{__('lan.qidirish')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">
                    {{__('lan.seatch1')}} <br>
                    "{{ $q }}"
                </h1>
            </div>

            <div class="row g-4 ">
                <div class="col-12 ">
                    @if ($articles->isNotEmpty())
                        <h3>{{__('lan.maqolalar')}}:</h3>
                        @foreach($articles as $article)
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="{{asset('storage/'.$article->photos->first()->file_path)}}" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">
                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="{{route('article_show',$article->id)}}">{{$article->name}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                    @if ($scholars->isNotEmpty())
                            <h3>{{__('lan.tadqiq')}}:</h3>
                        @foreach($scholars as $article)
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="{{asset('storage/'.$article->photos->first()->file_path)}}" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="{{route('scholar_show',$article->id)}}">{{$article->name}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                    @if ($researchs->isNotEmpty())
                            <h3>{{__('lan.ijti_ama_tad')}}:</h3>
                        @foreach($researchs as $article)
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="{{asset('storage/'.$article->photos->first()->file_path)}}" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="{{route('research_show',$article->id)}}">{{$article->name}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                    @if ($rahbariyats->isNotEmpty())
                            <h3>{{__('lan.rahbariyat')}}:</h3>
                        @foreach($rahbariyats as $article)
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="{{asset('storage/'.$article->photos->first()->file_path)}}" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bossModal{{ $article->id }}">{{$article->name}}</a>
                                        </p>
                                        <div class="xalqaro-hankorlik-meta">
                                            <span class="xalqaro-hankorlik-date">{{__('lan.lavozim')}}: </span> {{$article->post}}
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="bossModal{{ $article->id }}" tabindex="-1" aria-labelledby="bossModalLabel{{ $article->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-3 shadow">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="bossModalLabel{{ $article->id }}">{{ $article->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Yopish"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>{{__('lan.telefon')}}:</strong> {{ $article->phone }}</p>
                                                    <p><strong>{{__('lan.ish_jadvali')}}:</strong> {{ $article->worktime }}</p>
                                                    <p><strong>{{__('lan.email')}}:</strong> {{ $article->email }}</p>
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
                    @endif
                    @if ($bibliophilias->isNotEmpty())
                            <h3>{{__('lan.kitobxonlik')}}:</h3>
                        @foreach($bibliophilias as $article)
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="{{asset('storage/'.$article->photos->first()->file_path)}}" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="{{route('bibliophilia_show',$article->id)}}">{{$article->name}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                    @if ($news->isNotEmpty())
                            <h3>{{__('lan.yangilik')}}:</h3>
                        @foreach($news as $article)
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="{{asset('storage/'.$article->photos->first()->file_path)}}" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="{{route('news_show',$article->id)}}">{{$article->name}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                    @if ($journals->isNotEmpty())
                            <h3>{{__('lan.jurnallar')}}:</h3>
                        @foreach($journals as $article)
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="{{asset('storage/'.$article->photos->first()->file_path)}}" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="{{route('journal_show',$article->id)}}">{{$article->name}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                    @if ($crimes->isNotEmpty())
                            <h3>{{__('lan.jinoyatlar')}}:</h3>
                        @foreach($crimes as $article)
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="{{asset('storage/'.$article->photos->first()->file_path)}}" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="{{route('crimes_show',$article->id)}}">{{$article->name}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                    @if ($academias->isNotEmpty())
                            <h3>{{__('lan.ilm_dar_ber')}}:</h3>
                        @foreach($academias as $article)
                            <div class="xalqaro-hankorlik-section">
                                <div class="xalqaro-hankorlik-content">
                                    <div class="xalqaro-hankorlik-image-container">

                                            <img src="{{asset('storage/'.$article->photos->first()->file_path)}}" alt="Xalqaro hankorlik"
                                                 class="xalqaro-hankorlik-img" width="100px" height="110px">

                                    </div>
                                    <div class="xalqaro-hankorlik-text-container">
                                        <p class="xalqaro-hankorlik-quote">
                                            <a href="{{route('academia_show',$article->id)}}">{{$article->name}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif

                    <style>
                        .xalqaro-hankorlik-section {
                            margin: 10px 0;
                            padding: 15px;
                            background-color: #f3f0ea;
                            border-radius: 4px;
                            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                        }

                        .xalqaro-hankorlik-content {
                            display: flex;
                            align-items: flex-start;
                            gap: 15px;
                            flex-wrap: wrap;
                        }

                        .xalqaro-hankorlik-image-container {
                            flex-shrink: 0;
                        }

                        .xalqaro-hankorlik-img {
                            width: 100px;
                            height: auto;
                            border-radius: 4px;
                            object-fit: cover;
                        }

                        .xalqaro-hankorlik-text-container {
                            flex: 1;
                        }

                        .xalqaro-hankorlik-quote {
                            font-size: 1.1rem;
                            margin: 0;
                            font-weight: 500;
                        }

                        .xalqaro-hankorlik-meta {
                            font-size: 0.9rem;
                            color: #555;
                            margin-top: 5px;
                        }

                        /* RESPONSIV QO‘LLAB-QUVVATLASH */
                        @media (max-width: 576px) {
                            .xalqaro-hankorlik-content {
                                flex-direction: column;
                                align-items: center;
                                text-align: center;
                            }

                            .xalqaro-hankorlik-img {
                                width: 80px;
                                height: 100px;
                            }

                            .xalqaro-hankorlik-text-container {
                                width: 100%;
                            }
                        }
                    </style>


                </div>
            </div>
        </div>
    </div>
</x-main>
