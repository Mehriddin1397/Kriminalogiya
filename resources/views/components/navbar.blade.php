<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
    <div class="container-fluid">
        <div class="d-flex align-items-center w-100 justify-content-between">
            <!-- Logo va Sarlavha -->
            <div class="d-flex align-items-center">
                <div class="rasm1  px-4 px-lg-5 " style="padding-right: 1rem !important;">
                    <a href="{{route('main')}}" class="navbar-brand">
                        <img
                            class="w-16 h-16 max-md:w-10 max-md:h-10 cursor-pointer rasm11"
                            src="{{ asset('assets/img/file.png') }}"
                        />
                    </a>
                </div>
                <div class="d-none d-md-block">
                    <p class="mb-0 font-weight-bold text-dark "><strong>{{__('lan.kriminalog')}} </strong></p>
                </div>
            </div>

            <!-- Qidiruv va Sana -->
            <div class="d-flex  align-items-center">
                <div class="d-flex align-items-center me-3">
                    <form id="searchForm" action="{{ route('search') }}" method="get">
                        <input
                            type="text"
                            class="search-box"
                            name="query"
                            placeholder="{{__('lan.qidirish')}}"
                            required
                        >
                    </form>
                    <div class="currency-menu">
                        <img src="{{asset('assets/img/language.svg')}}" alt="">
                        <select class="form-select nice-select mr-3 pl-5" id="languageSelect" onchange="changeLanguage(this)">
                            <option value="uz" {{ App::getLocale() === 'uz' ? 'selected' : '' }}>O'z</option>
                            <option value="kr" {{ App::getLocale() === 'kr' ? 'selected' : '' }}>Ўз</option>
                            <option value="ru" {{ App::getLocale() === 'ru' ? 'selected' : '' }}>Ру</option>
                            <option value="en" {{ App::getLocale() === 'en' ? 'selected' : '' }}>En</option>
                        </select>
                    </div>
                    <style>
                        .currency-menu {
                            display: flex;
                            align-items: center;
                            gap: 10px;
                        }

                        /* Til tanlov formasi uchun */
                        .currency-menu select {
                            min-width: 100px;
                            padding: 6px 12px;
                            font-size: 16px;
                            border-radius: 5px;
                        }

                        /* Rasm o'lchamini boshqarish */
                        .currency-menu img {
                            width: 24px;
                            height: 24px;
                        }

                        /* Kichik ekranlar (planshet va telefon) uchun */
                        @media (max-width: 769px) {
                            .currency-menu {
                                flex-direction: row;
                                justify-content: flex-start;
                                gap: 8px;
                            }
                            .iiv_logo {
                                display: none;
                            }
                            .currency-menu select {
                                font-size: 10px;
                                min-width: 60px;
                                padding: 4px 10px;
                            }

                            .currency-menu img {
                               display: none;
                            }
                        }

                        /* Juda kichik ekranlar (mobil telefonlar) uchun */
                        @media (max-width: 480px) {
                            .currency-menu {
                                flex-direction: column;
                                align-items: flex-start;
                            }
                            .currency-menu select {
                                width: 100%;

                            }
                        }

                    </style>
                </div>

                <div class="d-none d-md-block iiv_logo">
                    <a href="{{route('main')}}" class="navbar-brand d-flex align-items-center pr-2 px-lg-3">
                        <img class="w-[80px] cursor-pointer rasm max-md:w-12"
                             src="/assets/img/logo.svg"
                        />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .rasm11 {
            position: relative;
            color: #fff;
            font-size: 1.5em;
            text-align: center;
            width: 40px;
            height: 40px;
            animation: flip 4s linear infinite;
        }
        .rasm111 {
            position: relative;
            color: #fff;
            font-size: 1.5em;
            text-align: center;
            width: 200px;
            height: 200px;
            animation: flip 4s linear infinite;
        }
        .rasm {
            position: relative;
            color: #fff;
            width: 40px;
            height: 40px;
        }

        .rasm1 {
            border-radius: 50%;
        }

        @keyframes flip {
            0% {
                transform: rotateY(0deg);
            }
            50% {
                transform: rotateY(180deg);
            }
            100% {
                transform: rotateY(0deg);
            }
        }

        .search-box {
            outline: none;
            padding: 7px;
            padding-left: 10px;
            padding-right: 40px;
            height: 35px;
            width: 200px;
            border-radius: 30px;
            font-size: 15px;
            border: 1px solid #444;
            background-color: #f0f0f0;
            color: #333;
            font-weight: bold;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</nav>

<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <div class="rasm1 px-5 px-lg-4">

    </div>

    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('lan.ins_haq')}}</a>
                <div class="dropdown-menu fade-up m-0">
{{--                    <a href="{{route('show',['category_id'=>31,'id'=>4])}}" class="dropdown-item">{{__('lan.ins_tar')}}</a>--}}
                    <a href="{{route('test',['category_id'=>10,'id'=>1])}}" class="dropdown-item">{{__('lan.ins_haq2')}}</a>
                    <a href="{{route('hujjat')}}" class="dropdown-item">{{__('lan.ins_nor')}}</a>
{{--                    <a href="{{route('test',['category_id'=>19,'id'=>3])}}" class="dropdown-item">{{__('lan.ins_vaz')}}</a>--}}
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('lan.rahbariyat')}}</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{route('boss')}}" class="dropdown-item">{{__('lan.ins_rahbariyat')}}</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('lan.ilm_sal')}}</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{route('show',['category_id'=>27,'id'=>1])}}" class="dropdown-item">{{__('lan.ilm_dara')}}</a>  {{--{{route('show',['category_id'=>3,'id'=>4])}} --}}
                    <a href="{{route('categoryId',28)}}" class="dropdown-item">{{__('lan.kur_amal')}}</a> {{--{{route('categoryId',37)}} --}}
                    <a href="{{route('categoryId',14)}}" class="dropdown-item">{{__('lan.maqolalar')}}</a> {{--{{route('categoryId',23)}} --}}
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('lan.kengashlar')}}</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{route('show',['category_id'=>2,'id'=>1])}}" class="dropdown-item">{{__('lan.ins_keng')}}</a>{{--{{route('show',['category_id'=>31,'id'=>4])}} --}}
                    <a href="{{route('show',['category_id'=>1,'id'=>2])}}" class="dropdown-item">{{__('lan.kri_keng')}}</a>{{--{{route('show',['category_id'=>31,'id'=>4])}} --}}
                    <a href="{{route('show',['category_id'=>3,'id'=>3])}}" class="dropdown-item">{{__('lan.ilm_dar_ber')}}</a>{{--{{route('show',['category_id'=>31,'id'=>4])}} --}}
                    <a href="{{route('show',['category_id'=>4,'id'=>4])}}" class="dropdown-item">{{__('lan.xal_ex_keng')}}</a>{{--{{route('show',['category_id'=>31,'id'=>4])}} --}}
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('lan.elon')}}</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{route('categoryId',34)}}" class="dropdown-item">{{__('lan.ish_qab')}}</a>{{--{{route('test',['category_id'=>19,'id'=>3])}} --}}
                    <a href="{{route('show',['category_id'=>30,'id'=>3])}}" class="dropdown-item">{{__('lan.dis_mav')}}</a>{{--{{route('test',['category_id'=>19,'id'=>3])}} --}}
                    <a href="{{route('categoryId',31)}}" class="dropdown-item">{{__('lan.tadqiq')}}</a>{{--{{route('categoryId',39)}} --}}
                    <a href="{{route('show',['category_id'=>35,'id'=>1])}}" class="dropdown-item">{{__('lan.pul_xiz')}}</a>{{--{{route('show',['category_id'=>31,'id'=>4])}} --}}
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('lan.yangilik')}}</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{route('categoryId',22)}}" class="dropdown-item">{{__('lan.xor_yan')}}</a>
                    <a href="{{route('categoryId',8)}}" class="dropdown-item">{{__('lan.mah_yan')}}</a>
                    <a href="{{route('categoryId',23)}}" class="dropdown-item">{{__('lan.ins_tash')}}</a>{{--{{route('categoryId',33)}} --}}
                    <a href="{{route('categoryId',24)}}" class="dropdown-item">{{__('lan.ilm_saf')}}</a>{{--{{route('categoryId',34)}} --}}
                    <a href="{{route('categoryId',32)}}" class="dropdown-item">{{__('lan.telek')}}</a>{{--{{route('categoryId',40)}} --}}
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('lan.hamkor')}}</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{route('categoryId',12)}}" class="dropdown-item">{{__('lan.xor_ham')}}</a>{{--{{route('categoryId',39)}} --}}
                    <a href="{{route('categoryId',11)}}" class="dropdown-item">{{__('lan.mah_ham')}}</a>{{--{{route('categoryId',38)}} --}}
                    <a href="{{route('contact')}}" class="dropdown-item">{{__('lan.boglanish')}}</a>
                </div>
            </div>
{{--            <a href="{{route('contact')}}" class="nav-item nav-link">{{__('lan.boglanish')}}</a>--}}
        </div>

    </div>
    <script>
        function changeLanguage(selectElement) {
            const selectedValue = selectElement.value;
            window.location.href = "/locale/" + selectedValue;
        }
    </script>

</nav>
