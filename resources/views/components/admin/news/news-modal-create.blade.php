<!--! [Start] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="tasksDetailsOffcanvas" style="width: 760px; max-width: 95vw;">
    <div class="offcanvas-header border-bottom py-3 px-4 bg-light">
        <div class="d-flex align-items-center">
            <div class="avatar-text avatar-md items-details-close-trigger cursor-pointer me-3" data-bs-dismiss="offcanvas" title="Yopish">
                <i class="feather-arrow-left"></i>
            </div>
            <div>
                <h5 class="mb-0 fw-bold">Yangi yangilik qo'shish</h5>
                <span class="fs-12 text-muted">Barcha tillardagi ma'lumotlarni qulay to'ldiring</span>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body p-4">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
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
                            <a class="nav-link active py-2 fs-13 fw-semibold" data-bs-toggle="tab" href="#create_tab_uz" role="tab">
                                🇺🇿 O'zbekcha
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 fs-13 fw-semibold" data-bs-toggle="tab" href="#create_tab_ru" role="tab">
                                🇷🇺 Русский
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 fs-13 fw-semibold" data-bs-toggle="tab" href="#create_tab_en" role="tab">
                                🇬🇧 English
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 fs-13 fw-semibold" data-bs-toggle="tab" href="#create_tab_kr" role="tab">
                                🇺🇿 Ўзбекча (Кр)
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-3">
                    <div class="tab-content">
                        <!-- O'zbekcha -->
                        <div class="tab-pane fade show active" id="create_tab_uz" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nomi (UZ): <span class="text-danger">*</span></label>
                                <input type="text" name="name_uz" value="{{ old('name_uz') }}" class="form-control @error('name_uz') is-invalid @enderror" placeholder="Yangilik nomi..." required>
                                @error('name_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Qisqa sarlavha / Title (UZ):</label>
                                <input type="text" name="title_uz" value="{{ old('title_uz') }}" class="form-control" placeholder="Qisqacha mazmuni...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">To'liq matni (UZ):</label>
                                <textarea name="description_uz" rows="8" id="editor1" class="form-control">{{ old('description_uz') }}</textarea>
                            </div>
                        </div>

                        <!-- Ruscha -->
                        <div class="tab-pane fade" id="create_tab_ru" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Название (RU):</label>
                                <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control" placeholder="Название новости...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Краткое описание / Title (RU):</label>
                                <input type="text" name="title_ru" value="{{ old('title_ru') }}" class="form-control" placeholder="Краткое описание...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Полный текст (RU):</label>
                                <textarea name="description_ru" rows="8" id="editor2" class="form-control">{{ old('description_ru') }}</textarea>
                            </div>
                        </div>

                        <!-- Inglizcha -->
                        <div class="tab-pane fade" id="create_tab_en" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Title / Name (EN):</label>
                                <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control" placeholder="News title...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Short description (EN):</label>
                                <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control" placeholder="Short summary...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Content (EN):</label>
                                <textarea name="description_en" rows="8" id="editor3" class="form-control">{{ old('description_en') }}</textarea>
                            </div>
                        </div>

                        <!-- Kirillcha -->
                        <div class="tab-pane fade" id="create_tab_kr" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Номи (КР):</label>
                                <input type="text" name="name_kr" value="{{ old('name_kr') }}" class="form-control" placeholder="Янгилик номи...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Қисқа сарлавҳа (КР):</label>
                                <input type="text" name="title_kr" value="{{ old('title_kr') }}" class="form-control" placeholder="Қисқача мазмуни...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Тўлиқ матни (КР):</label>
                                <textarea name="description_kr" rows="8" id="editor4" class="form-control">{{ old('description_kr') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Umumiy parametrlar (Rasm, Kategoriya) -->
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Rasmlar (Bir nechta tanlash mumkin): <span class="text-danger">*</span></label>
                    <input type="file" name="photos[]" class="form-control" multiple required accept="image/*">
                    <span class="fs-11 text-muted">Formatlar: JPG, PNG, WEBP</span>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold" for="categories">Kategoriyasi:</label>
                    <select name="categories[]" class="form-select form-control @error('categories') is-invalid @enderror">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ collect(old('categories'))->contains($category->id) ? 'selected' : '' }}>
                                {{ $category->name_uz }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Ijtimoiy tarmoqlar havolalari (ixtiyoriy) -->
            <div class="card border mb-4">
                <div class="card-header bg-light py-2 px-3">
                    <span class="fs-12 fw-semibold text-muted text-uppercase">Ijtimoiy tarmoqlar (ixtiyoriy)</span>
                </div>
                <div class="card-body p-3">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text"><i class="feather-youtube text-danger"></i></span>
                                <input type="text" name="youtube_link" value="{{ old('youtube_link') }}" class="form-control" placeholder="YouTube havolasi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text"><i class="feather-send text-primary"></i></span>
                                <input type="text" name="telegram_link" value="{{ old('telegram_link') }}" class="form-control" placeholder="Telegram havolasi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text"><i class="feather-facebook text-primary"></i></span>
                                <input type="text" name="facebook_link" value="{{ old('facebook_link') }}" class="form-control" placeholder="Facebook havolasi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text"><i class="feather-message-circle text-success"></i></span>
                                <input type="text" name="whatsapp_link" value="{{ old('whatsapp_link') }}" class="form-control" placeholder="WhatsApp havolasi">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas">Bekor qilish</button>
                <button type="submit" class="btn btn-primary px-4 fw-semibold">
                    <i class="feather-check me-1"></i> Saqlash
                </button>
            </div>
        </form>
    </div>
</div>
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
