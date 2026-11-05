<!--! [Start] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="tasksDetailsOffcanvas" style="width: 760px; max-width: 95vw;">
    <div class="offcanvas-header border-bottom py-3 px-4 bg-light">
        <div class="d-flex align-items-center">
            <div class="avatar-text avatar-md items-details-close-trigger cursor-pointer me-3" data-bs-dismiss="offcanvas" title="Yopish">
                <i class="feather-arrow-left"></i>
            </div>
            <div>
                <h5 class="mb-0 fw-bold">Yangi e'lon qo'shish</h5>
                <span class="fs-12 text-muted">E'lon matnini barcha tillarda qulay to'ldiring</span>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body p-4">
        <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if($errors->any())
                <div class="alert alert-danger py-2">
                    <ul class="mb-0 fs-13">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Til tablari -->
            <div class="card border mb-4">
                <div class="card-header bg-white p-2 border-bottom">
                    <ul class="nav nav-pills nav-fill gap-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active py-2 fs-13 fw-semibold" data-bs-toggle="tab" href="#ann_tab_uz" role="tab">
                                🇺🇿 O'zbekcha
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 fs-13 fw-semibold" data-bs-toggle="tab" href="#ann_tab_ru" role="tab">
                                🇷🇺 Русский
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 fs-13 fw-semibold" data-bs-toggle="tab" href="#ann_tab_en" role="tab">
                                🇬🇧 English
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 fs-13 fw-semibold" data-bs-toggle="tab" href="#ann_tab_kr" role="tab">
                                🇺🇿 Ўзбекча (Кр)
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-3">
                    <div class="tab-content">
                        <!-- O'zbekcha -->
                        <div class="tab-pane fade show active" id="ann_tab_uz" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Sarlavha (UZ): <span class="text-danger">*</span></label>
                                <input type="text" name="title_uz" value="{{ old('title_uz') }}" class="form-control @error('title_uz') is-invalid @enderror" placeholder="E'lon sarlavhasi..." required>
                                @error('title_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tavsif (UZ):</label>
                                <textarea name="description_uz" rows="6" class="form-control" placeholder="E'lon matni...">{{ old('description_uz') }}</textarea>
                            </div>
                        </div>

                        <!-- Ruscha -->
                        <div class="tab-pane fade" id="ann_tab_ru" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Заголовок (RU):</label>
                                <input type="text" name="title_ru" value="{{ old('title_ru') }}" class="form-control" placeholder="Заголовок объявления...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Описание (RU):</label>
                                <textarea name="description_ru" rows="6" class="form-control" placeholder="Текст объявления...">{{ old('description_ru') }}</textarea>
                            </div>
                        </div>

                        <!-- Inglizcha -->
                        <div class="tab-pane fade" id="ann_tab_en" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Title (EN):</label>
                                <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control" placeholder="Announcement title...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description (EN):</label>
                                <textarea name="description_en" rows="6" class="form-control" placeholder="Announcement content...">{{ old('description_en') }}</textarea>
                            </div>
                        </div>

                        <!-- Kirillcha -->
                        <div class="tab-pane fade" id="ann_tab_kr" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Сарлавҳа (КР):</label>
                                <input type="text" name="title_kr" value="{{ old('title_kr') }}" class="form-control" placeholder="Эълон сарлавҳаси...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Тавсиф (КР):</label>
                                <textarea name="description_kr" rows="6" class="form-control" placeholder="Эълон матни...">{{ old('description_kr') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parametrlar -->
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Rasmlar: <span class="text-danger">*</span></label>
                    <input type="file" name="photos[]" class="form-control" multiple required accept="image/*">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Tartib raqami:</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold d-block">Holati:</label>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" role="switch" name="is_active" value="1" id="is_active_create" checked>
                        <label class="form-check-label" for="is_active_create">Faol</label>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas">Bekor qilish</button>
                <button type="submit" class="btn btn-primary px-4 fw-semibold">
                    <i class="feather-check me-1"></i> Qo'shish
                </button>
            </div>
        </form>
    </div>
</div>
<!--! ================================================================ !-->
