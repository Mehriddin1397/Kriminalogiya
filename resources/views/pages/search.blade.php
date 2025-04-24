<x-main title="Rahbariyat">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Rahbariyat</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Rahbariyat</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">
                    "{{ $q }}" bo‘yicha qidiruv natijalari:
                </h1>
            </div>

            <div class="row g-4 ">
                <div class="col-12 ">
                    @if ($articles->isNotEmpty())
                        <h3>Maqolalar:</h3>
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
                            <h3>Tadqiqotchilar:</h3>
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
                            <h3>Tadqiqotlar:</h3>
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
                            <h3>Rahbariyat:</h3>
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
                                            <span class="xalqaro-hankorlik-date">Lavozim: </span> {{$article->post}}
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
                                                    <p><strong>Telefon:</strong> {{ $article->phone }}</p>
                                                    <p><strong>Ish jadvali:</strong> {{ $article->worktime }}</p>
                                                    <p><strong>Email:</strong> {{ $article->email }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
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
                            <h3>Kitobxonlik:</h3>
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
                            <h3>Yangiliklar:</h3>
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
                            <h3>Jo'rnallar:</h3>
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
                            <h3>Jinoyatlar:</h3>
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
                            <h3>Ilmiy kengash:</h3>
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

                        .xalqaro-hankorlik-separator:hover {
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
        </div>
    </div>
</x-main>
