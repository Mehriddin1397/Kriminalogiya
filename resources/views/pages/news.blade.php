<x-main title="{{$category->slug}}">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 ">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{$category->slug}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('main')}}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{$category->slug}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">{{$category->slug}}</h1>
            </div>

            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                    </ul>
                </div>
            </div>
            <div class="row g-4">
                @foreach($news as $new)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">

                            <img class="img-fluid" src="{{asset('storage/'.$new->photos->first()->file_path)}}" alt="" style="width:408px; height:245px; !important;"  >

                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">{{$new->name}}</h4>
                            <p>{{$new->title}}</p>
                            <a class="fw-medium" href="{{route('show',['category_id'=>$category->id,'id'=>$new->id])}}">Batafsil<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div>
                    {{$news->links('pagination::bootstrap-4')}}
                </div>
                    <div class="text-center mt-3 p-3">
                        <a href="{{route('main')}}" class="btn btn-danger">
                            {{ __('lan.bosh')}}
                        </a>
                    </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

</x-main>
