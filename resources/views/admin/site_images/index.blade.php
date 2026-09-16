@extends('layouts.admin')

@section('title', "Sayt rasmlari")

@php
    $lxGroups = [
        [
            'key' => \App\Models\SiteImage::GROUP_HERO_SLIDER,
            'title' => 'Bosh sahifa banner rasmlari',
            'hint' => "Bosh sahifadagi asosiy slayder rasmlari. Hech qanday rasm yuklanmasa, saytdagi standart rasmlar ko'rsatiladi.",
            'items' => $heroImages,
        ],
        [
            'key' => \App\Models\SiteImage::GROUP_INSTITUTE_OLD,
            'title' => "Institut haqida — avvalgi holat",
            'hint' => "\"Institut haqida\" sahifasidagi \"Institutning avvalgi holati\" galereyasi.",
            'items' => $oldImages,
        ],
        [
            'key' => \App\Models\SiteImage::GROUP_INSTITUTE_CURRENT,
            'title' => "Institut haqida — hozirgi holat",
            'hint' => "\"Institut haqida\" sahifasidagi \"Institutning hozirgi holati\" galereyasi.",
            'items' => $currentImages,
        ],
    ];
@endphp

@section('content')

    <div class="nxl-content d-flex flex-column h-100">
        <!-- [ page-header ] start -->
        <div class="page-header position-fixed">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sayt rasmlari</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item">Sayt rasmlari</li>
                </ul>
            </div>
        </div>
        <!-- [ page-header ] end -->

        <!-- [ Main Content ] start -->
        <div class="main-content">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach($lxGroups as $group)
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h6 class="mb-0">{{ $group['title'] }}</h6>
                                <p class="text-muted fs-12 mb-0 mt-1">{{ $group['hint'] }}</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('site-images.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                                    @csrf
                                    <input type="hidden" name="group" value="{{ $group['key'] }}">
                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                        <input type="file" name="photos[]" class="form-control" style="max-width:420px" multiple accept="image/png,image/jpeg,image/gif,image/webp,image/svg+xml" required>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="feather-upload me-2"></i> Yuklash
                                        </button>
                                    </div>
                                    <small class="text-muted d-block mt-2">jpg, png, gif, webp, svg — 10MB gacha, bir nechta rasmni birga tanlashingiz mumkin.</small>
                                </form>

                                @if($group['items']->count())
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach($group['items'] as $img)
                                            <div class="position-relative" style="width:150px;">
                                                <img src="{{ asset('storage/'.$img->file_path) }}" alt=""
                                                     class="rounded border w-100" style="height:110px;object-fit:cover;">
                                                <form action="{{ route('site-images.destroy', $img->id) }}" method="POST"
                                                      class="position-absolute top-0 end-0 m-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Rostan o‘chirasizmi?')"
                                                            title="O'chirish">
                                                        <i class="feather-trash-2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted mb-0">Hozircha rasm yuklanmagan.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- [ Main Content ] end -->
    </div>

@endsection
