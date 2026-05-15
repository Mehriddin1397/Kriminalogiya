<x-main title="{{__('lan.Gallery')}}">
<div class="home-luxury">

    {{-- ─────── Page hero ─────── --}}
    @php
        $heroBg = collect([
            'assets/img/banner2.jpg',
            'assets/img/banner4.jpg',
            'assets/img/banner1.jpg',
            'assets/img/bg1.jpg',
        ])->first(fn ($p) => file_exists(public_path($p)));
    @endphp

    <section class="lx-page-hero">
        @if($heroBg)
            <div class="lx-page-hero-bg" aria-hidden="true">
                <img src="{{ asset($heroBg) }}" alt="" loading="lazy">
            </div>
        @endif

        <div class="lx-page-hero-decor" aria-hidden="true">
            <img src="{{ asset('assets/img/kti-logo.png') }}" alt="">
        </div>

        <div class="container">
            <div class="lx-breadcrumb" data-aos="fade-up">
                <a href="{{ route('main') }}">{{ __('lan.bosh_sahifa') ?? 'Bosh sahifa' }}</a>
                <span class="sep">—</span>
                <span>{{ __('Gallery') }}</span>
            </div>


        </div>
    </section>

    {{-- ─────── Leaders grid ─────── --}}
    <section class="gallery-page">

        <div class="gallery-container">

            {{-- TITLE --}}
            <div class="gallery-header">
                <h1>{{ __('messages.fotogaleriya') }}</h1>
            </div>

            {{-- GALLERY --}}
            <div class="gallery-grid">

                @foreach($photos as $photo)

                    <div class="gallery-card">

                        <img
                            src="{{ asset('storage/' . $photo->file_path) }}"
                            alt="gallery-image"
                            class="gallery-image"
                            onclick="openGalleryModal('{{ asset('storage/' . $photo->file_path) }}')"
                        >

                    </div>

                @endforeach

            </div>

            {{-- PAGINATION --}}
            <div class="gallery-pagination">
                {{ $photos->links() }}
            </div>

        </div>

    </section>

    {{-- MODAL --}}
    <div class="gallery-modal" id="galleryModal">

    <span class="gallery-modal-close" onclick="closeGalleryModal()">
        &times;
    </span>

        <img src="" id="galleryModalImage" class="gallery-modal-image">

    </div>

    {{-- STYLE --}}
    <style>

        .gallery-page{
            width:100%;
            padding:60px 0;
            background:#f5f5f5;
        }

        .gallery-container{
            width:92%;
            max-width:1400px;
            margin:auto;
        }

        .gallery-header{
            text-align:center;
            margin-bottom:40px;
        }

        .gallery-header h1{
            font-size:42px;
            font-weight:700;
            color:#111;
            margin:0;
        }

        /* GRID */

        .gallery-grid{
            display:grid;
            grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
            gap:20px;
        }

        .gallery-card{
            position:relative;
            overflow:hidden;
            border-radius:18px;
            background:#fff;
            cursor:pointer;
            height:260px;
            box-shadow:0 4px 14px rgba(0,0,0,0.08);
            transition:0.3s;
        }

        .gallery-card:hover{
            transform:translateY(-5px);
            box-shadow:0 10px 30px rgba(0,0,0,0.15);
        }

        .gallery-image{
            width:100%;
            height:100%;
            object-fit:cover;
            display:block;
            transition:0.4s;
        }

        .gallery-card:hover .gallery-image{
            transform:scale(1.08);
        }

        /* MODAL */

        .gallery-modal{
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100vh;
            background:rgba(0,0,0,0.92);
            z-index:99999;

            display:none;
            align-items:center;
            justify-content:center;

            padding:30px;
        }

        .gallery-modal.active{
            display:flex;
        }

        .gallery-modal-image{
            max-width:95%;
            max-height:90vh;
            border-radius:20px;
            animation:galleryZoom .25s ease;
        }

        .gallery-modal-close{
            position:absolute;
            top:20px;
            right:35px;
            color:#fff;
            font-size:55px;
            cursor:pointer;
            line-height:1;
            z-index:2;
        }

        @keyframes galleryZoom{
            from{
                transform:scale(0.8);
                opacity:0;
            }
            to{
                transform:scale(1);
                opacity:1;
            }
        }

        /* PAGINATION */

        .gallery-pagination{
            margin-top:50px;
            display:flex;
            justify-content:center;
        }

        /* RESPONSIVE */

        @media(max-width:768px){

            .gallery-header h1{
                font-size:30px;
            }

            .gallery-grid{
                grid-template-columns:repeat(2,1fr);
                gap:14px;
            }

            .gallery-card{
                height:180px;
                border-radius:14px;
            }

            .gallery-modal-close{
                top:10px;
                right:20px;
                font-size:45px;
            }

        }

        @media(max-width:480px){

            .gallery-grid{
                grid-template-columns:1fr 1fr;
            }

            .gallery-card{
                height:150px;
            }

        }

    </style>

    {{-- SCRIPT --}}
    <script>

        const galleryModal = document.getElementById('galleryModal');
        const galleryModalImage = document.getElementById('galleryModalImage');

        function openGalleryModal(image){
            galleryModal.classList.add('active');
            galleryModalImage.src = image;

            document.body.style.overflow = 'hidden';
        }

        function closeGalleryModal(){
            galleryModal.classList.remove('active');

            document.body.style.overflow = 'auto';
        }

        // Outside bosilganda yopiladi
        galleryModal.addEventListener('click', function(e){

            if(e.target === galleryModal){
                closeGalleryModal();
            }

        });

        // ESC bosilganda yopiladi
        document.addEventListener('keydown', function(e){

            if(e.key === 'Escape'){
                closeGalleryModal();
            }

        });

    </script>


</div>
</x-main>
