@extends('layouts.admin')

@section('title', 'Boshqaruv paneli')

@section('content')
@php
    $stats = $stats ?? [
        'news'          => \App\Models\News::count(),
        'announcements' => \App\Models\Announcement::count(),
        'journals'      => \App\Models\Journal::count(),
        'issues'        => \App\Models\Issue::count(),
        'papers'        => \App\Models\Paper::count(),
        'videos'        => \App\Models\Video::count(),
        'messages'      => \App\Models\Message::count(),
    ];
    $latest_news = $latest_news ?? \App\Models\News::latest()->take(5)->get();
    $latest_messages = $latest_messages ?? \App\Models\Message::latest()->take(5)->get();
@endphp

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header mb-4">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10 mb-0">Boshqaruv paneli</h5>
            </div>
            <ul class="breadcrumb ms-3 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto d-flex align-items-center gap-2">
            <a href="{{ route('main') }}" target="_blank" class="btn btn-sm btn-outline-primary">
                <i class="feather-external-link me-1"></i> Saytni ko'rish
            </a>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <!-- Salomlashish bloki -->
        <div class="card stretch stretch-full mb-4 border-0 shadow-sm" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; border-radius: 12px;">
            <div class="card-body p-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('assets/images/logoo.jfif') }}" alt="Logo" style="width: 60px; height: 60px; border-radius: 50%; border: 3px solid rgba(255,255,255,0.3); object-fit: cover;">
                    <div>
                        <h4 class="text-white mb-1">Xush kelibsiz, {{ Auth::user()->name }}!</h4>
                        <p class="mb-0 text-white-50 fs-13">Kriminologiya tadqiqot instituti veb-saytini boshqarish tizimi</p>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('news.index') }}" class="btn btn-light btn-sm fw-semibold text-primary">
                        <i class="feather-plus me-1"></i> Yangilik qo'shish
                    </a>
                    <a href="{{ route('issues.index') }}" class="btn btn-outline-light btn-sm fw-semibold">
                        <i class="feather-book-open me-1"></i> Jurnal soni
                    </a>
                    <a href="{{ route('announcements.index') }}" class="btn btn-outline-light btn-sm fw-semibold">
                        <i class="feather-alert-circle me-1"></i> E'lon
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistika kartalari -->
        <div class="row g-3 mb-4">
            <!-- Yangiliklar -->
            <div class="col-xxl-2 col-md-4 col-sm-6">
                <div class="card stretch stretch-full border-0 shadow-sm h-100" style="border-radius: 10px;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fs-12 text-muted fw-semibold">Yangiliklar</span>
                            <div class="avatar-text avatar-sm bg-primary-subtle text-primary rounded-circle">
                                <i class="feather-file-text"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-1 text-dark">{{ $stats['news'] ?? 0 }}</h3>
                        <a href="{{ route('news.index') }}" class="fs-11 text-primary fw-medium">Ro'yxatga o'tish →</a>
                    </div>
                </div>
            </div>

            <!-- Jurnal sonlari -->
            <div class="col-xxl-2 col-md-4 col-sm-6">
                <div class="card stretch stretch-full border-0 shadow-sm h-100" style="border-radius: 10px;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fs-12 text-muted fw-semibold">Jurnal sonlari</span>
                            <div class="avatar-text avatar-sm bg-success-subtle text-success rounded-circle">
                                <i class="feather-book-open"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-1 text-dark">{{ $stats['issues'] ?? 0 }}</h3>
                        <a href="{{ route('issues.index') }}" class="fs-11 text-success fw-medium">Ro'yxatga o'tish →</a>
                    </div>
                </div>
            </div>

            <!-- Maqolalar (PDF) -->
            <div class="col-xxl-2 col-md-4 col-sm-6">
                <div class="card stretch stretch-full border-0 shadow-sm h-100" style="border-radius: 10px;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fs-12 text-muted fw-semibold">Maqolalar (PDF)</span>
                            <div class="avatar-text avatar-sm bg-info-subtle text-info rounded-circle">
                                <i class="feather-file"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-1 text-dark">{{ $stats['papers'] ?? 0 }}</h3>
                        <a href="{{ route('papers.index') }}" class="fs-11 text-info fw-medium">Ro'yxatga o'tish →</a>
                    </div>
                </div>
            </div>

            <!-- E'lonlar -->
            <div class="col-xxl-2 col-md-4 col-sm-6">
                <div class="card stretch stretch-full border-0 shadow-sm h-100" style="border-radius: 10px;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fs-12 text-muted fw-semibold">E'lonlar</span>
                            <div class="avatar-text avatar-sm bg-warning-subtle text-warning rounded-circle">
                                <i class="feather-bell"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-1 text-dark">{{ $stats['announcements'] ?? 0 }}</h3>
                        <a href="{{ route('announcements.index') }}" class="fs-11 text-warning fw-medium">Ro'yxatga o'tish →</a>
                    </div>
                </div>
            </div>

            <!-- Videolar -->
            <div class="col-xxl-2 col-md-4 col-sm-6">
                <div class="card stretch stretch-full border-0 shadow-sm h-100" style="border-radius: 10px;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fs-12 text-muted fw-semibold">Videolar</span>
                            <div class="avatar-text avatar-sm bg-danger-subtle text-danger rounded-circle">
                                <i class="feather-video"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-1 text-dark">{{ $stats['videos'] ?? 0 }}</h3>
                        <a href="{{ route('videos.index') }}" class="fs-11 text-danger fw-medium">Ro'yxatga o'tish →</a>
                    </div>
                </div>
            </div>

            <!-- Kelgan Murojaatlar -->
            <div class="col-xxl-2 col-md-4 col-sm-6">
                <div class="card stretch stretch-full border-0 shadow-sm h-100" style="border-radius: 10px;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fs-12 text-muted fw-semibold">Murojaatlar</span>
                            <div class="avatar-text avatar-sm bg-secondary-subtle text-secondary rounded-circle">
                                <i class="feather-mail"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-1 text-dark">{{ $stats['messages'] ?? 0 }}</h3>
                        <span class="fs-11 text-muted fw-medium">Sayt xabarlari</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 Ustun: Oxirgi yangiliklar va Oxirgi xabarlar -->
        <div class="row g-4">
            <!-- Oxirgi yangiliklar -->
            <div class="col-lg-7">
                <div class="card stretch stretch-full border-0 shadow-sm" style="border-radius: 10px;">
                    <div class="card-header d-flex align-items-center justify-content-between py-3 px-4 border-bottom">
                        <h6 class="mb-0 fw-bold"><i class="feather-file-text me-2 text-primary"></i>Oxirgi qo'shilgan yangiliklar</h6>
                        <a href="{{ route('news.index') }}" class="btn btn-sm btn-light fs-12">Barchasi →</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light fs-12 text-muted">
                                    <tr>
                                        <th style="width: 50px;">Rasm</th>
                                        <th>Sarlavha</th>
                                        <th style="width: 120px;">Sana</th>
                                        <th style="width: 80px;" class="text-end">Amal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latest_news as $item)
                                        <tr>
                                            <td>
                                                @if($item->photos && $item->photos->count() > 0)
                                                    <img src="{{ asset('storage/' . $item->photos->first()->file_path) }}" alt="" style="width: 36px; height: 36px; border-radius: 6px; object-fit: cover;">
                                                @else
                                                    <div class="avatar-text avatar-sm bg-light text-muted rounded">
                                                        <i class="feather-image"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="fw-semibold text-dark text-truncate" style="max-width: 320px;" title="{{ $item->name_uz }}">
                                                    {{ $item->name_uz ?? 'Nomsiz' }}
                                                </div>
                                            </td>
                                            <td class="fs-12 text-muted">
                                                {{ $item->created_at ? $item->created_at->format('d.m.Y H:i') : '-' }}
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('news.index') }}" class="btn btn-sm btn-icon btn-light" title="Boshqarish">
                                                    <i class="feather-edit-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-muted fs-13">Hozircha yangiliklar yo'q</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Oxirgi kelgan murojaatlar -->
            <div class="col-lg-5">
                <div class="card stretch stretch-full border-0 shadow-sm" style="border-radius: 10px;">
                    <div class="card-header d-flex align-items-center justify-content-between py-3 px-4 border-bottom">
                        <h6 class="mb-0 fw-bold"><i class="feather-mail me-2 text-danger"></i>Saytdan kelgan murojaatlar</h6>
                        <span class="badge bg-primary-subtle text-primary fs-11">{{ $stats['messages'] ?? 0 }} ta</span>
                    </div>
                    <div class="card-body p-3">
                        @forelse($latest_messages as $msg)
                            <div class="p-3 mb-2 bg-light rounded border-start border-3 border-primary">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <strong class="fs-13 text-dark">{{ $msg->name ?? 'Foydalanuvchi' }}</strong>
                                    <span class="fs-11 text-muted">{{ $msg->created_at ? $msg->created_at->diffForHumans() : '' }}</span>
                                </div>
                                <div class="fs-12 text-primary mb-1">
                                    <i class="feather-phone me-1"></i>{{ $msg->phone ?? '-' }}
                                </div>
                                <p class="fs-12 text-muted mb-0 text-truncate-2-line" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $msg->message ?? '' }}
                                </p>
                            </div>
                        @empty
                            <div class="text-center py-4 text-muted fs-13">
                                <i class="feather-inbox fs-24 d-block mb-2 text-muted"></i>
                                Yangi murojaatlar yo'q
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection
