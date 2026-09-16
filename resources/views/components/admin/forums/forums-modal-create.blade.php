<!--! [Start] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvas" xmlns="http://www.w3.org/1999/html">
    <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
        <div class="d-flex align-items-center">
            <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                 data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i
                    class="feather-arrow-left"></i></div>
            <span class="vr text-muted mx-4"></span>
            <a href="javascript:void(0);">
                <h2 class="fs-14 fw-bold text-truncate-1-line">Yaratish</h2>
                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Forum qo'shish</span>
            </a>
        </div>

    </div>
    <div class="offcanvas-body">
        <form action="{{ route('forums.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(uz), masalan "1-xalqaro forum":</label>
                        <input type="text" name="label_uz" value="{{ old('label_uz') }}" class="form-control @error('label_uz') is-invalid @enderror">
                        @error('label_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(ru):</label>
                        <input type="text" name="label_ru" value="{{ old('label_ru') }}" class="form-control @error('label_ru') is-invalid @enderror">
                        @error('label_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(en):</label>
                        <input type="text" name="label_en" value="{{ old('label_en') }}" class="form-control @error('label_en') is-invalid @enderror">
                        @error('label_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(kr):</label>
                        <input type="text" name="label_kr" value="{{ old('label_kr') }}" class="form-control @error('label_kr') is-invalid @enderror">
                        @error('label_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Mavzu/Sarlavha(uz):</label>
                        <input type="text" name="theme_uz" value="{{ old('theme_uz') }}" class="form-control @error('theme_uz') is-invalid @enderror">
                        @error('theme_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Mavzu/Sarlavha(ru):</label>
                        <input type="text" name="theme_ru" value="{{ old('theme_ru') }}" class="form-control @error('theme_ru') is-invalid @enderror">
                        @error('theme_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Mavzu/Sarlavha(en):</label>
                        <input type="text" name="theme_en" value="{{ old('theme_en') }}" class="form-control @error('theme_en') is-invalid @enderror">
                        @error('theme_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Mavzu/Sarlavha(kr):</label>
                        <input type="text" name="theme_kr" value="{{ old('theme_kr') }}" class="form-control @error('theme_kr') is-invalid @enderror">
                        @error('theme_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Boshlanish sanasi:</label>
                        <input type="date" name="event_start_date" value="{{ old('event_start_date') }}" class="form-control @error('event_start_date') is-invalid @enderror">
                        @error('event_start_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Tugash sanasi (ixtiyoriy):</label>
                        <input type="date" name="event_end_date" value="{{ old('event_end_date') }}" class="form-control @error('event_end_date') is-invalid @enderror">
                        @error('event_end_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label">Matni(uz):</label>
                    <textarea name="description_uz" rows="6" class="form-control @error('description_uz') is-invalid @enderror">{{ old('description_uz') }}</textarea>
                    @error('description_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Matni(ru):</label>
                    <textarea name="description_ru" rows="6" class="form-control @error('description_ru') is-invalid @enderror">{{ old('description_ru') }}</textarea>
                    @error('description_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Matni(en):</label>
                    <textarea name="description_en" rows="6" class="form-control @error('description_en') is-invalid @enderror">{{ old('description_en') }}</textarea>
                    @error('description_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Matni(kr):</label>
                    <textarea name="description_kr" rows="6" class="form-control @error('description_kr') is-invalid @enderror">{{ old('description_kr') }}</textarea>
                    @error('description_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group mb-4">
                    <label class="form-label">Statistika(uz) — ixtiyoriy, har bir raqamni yangi qatorga "son|izoh" ko'rinishida yozing. Masalan: <code>10|xorijiy davlat</code></label>
                    <textarea name="stats_uz" rows="4" placeholder="10|xorijiy davlat&#10;5|xalqaro tashkilot" class="form-control @error('stats_uz') is-invalid @enderror">{{ old('stats_uz') }}</textarea>
                    @error('stats_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Statistika(ru):</label>
                    <textarea name="stats_ru" rows="4" placeholder="10|зарубежное государство" class="form-control @error('stats_ru') is-invalid @enderror">{{ old('stats_ru') }}</textarea>
                    @error('stats_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Statistika(en):</label>
                    <textarea name="stats_en" rows="4" placeholder="10|foreign countries" class="form-control @error('stats_en') is-invalid @enderror">{{ old('stats_en') }}</textarea>
                    @error('stats_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Statistika(kr):</label>
                    <textarea name="stats_kr" rows="4" placeholder="10|хорижий давлат" class="form-control @error('stats_kr') is-invalid @enderror">{{ old('stats_kr') }}</textarea>
                    @error('stats_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Rasmlari:</label>
                        <input type="file" name="photos[]" class="form-control @error('photos') is-invalid @enderror" multiple required>
                        @error('photos')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary d-inline-block mt-4">Qo'shish</button>

            </div>
        </form>
    </div>

</div>
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
