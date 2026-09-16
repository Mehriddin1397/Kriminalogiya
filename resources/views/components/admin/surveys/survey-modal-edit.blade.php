<!--! ================================================================ !-->
@foreach($surveys as $survey)
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="surveyDetailsOffcanvasEdit{{ $survey->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">So'rovnoma</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line">O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('surveys.update', $survey->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                            <label class="form-label">Sarlavha (uz):</label>
                            <input type="text" name="title_uz" value="{{ old('title_uz', $survey->title_uz) }}" class="form-control @error('title_uz') is-invalid @enderror">
                            @error('title_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Sarlavha (ru):</label>
                            <input type="text" name="title_ru" value="{{ old('title_ru', $survey->title_ru) }}" class="form-control @error('title_ru') is-invalid @enderror">
                            @error('title_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Sarlavha (en):</label>
                            <input type="text" name="title_en" value="{{ old('title_en', $survey->title_en) }}" class="form-control @error('title_en') is-invalid @enderror">
                            @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Sarlavha (kr):</label>
                            <input type="text" name="title_kr" value="{{ old('title_kr', $survey->title_kr) }}" class="form-control @error('title_kr') is-invalid @enderror">
                            @error('title_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Tavsif (uz):</label>
                        <textarea name="description_uz" rows="6" class="form-control @error('description_uz') is-invalid @enderror">{{ old('description_uz', $survey->description_uz) }}</textarea>
                        @error('description_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Tavsif (ru):</label>
                        <textarea name="description_ru" rows="6" class="form-control @error('description_ru') is-invalid @enderror">{{ old('description_ru', $survey->description_ru) }}</textarea>
                        @error('description_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Tavsif (en):</label>
                        <textarea name="description_en" rows="6" class="form-control @error('description_en') is-invalid @enderror">{{ old('description_en', $survey->description_en) }}</textarea>
                        @error('description_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Tavsif (kr):</label>
                        <textarea name="description_kr" rows="6" class="form-control @error('description_kr') is-invalid @enderror">{{ old('description_kr', $survey->description_kr) }}</textarea>
                        @error('description_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Qatnashish havolasi (link):</label>
                        <input type="url" name="link" value="{{ old('link', $survey->link) }}" class="form-control @error('link') is-invalid @enderror" placeholder="https://...">
                        @error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <img src="{{ asset('storage/' . $survey->image) }}" alt=""
                         class="img-fluid mt-2 mb-3" width="150">

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Rasmi (yangilash uchun tanlang):</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-4">
                            <label class="form-label">Tartib raqami:</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $survey->sort_order) }}" class="form-control @error('sort_order') is-invalid @enderror">
                            @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-4">
                            <label class="form-label d-block">Holati:</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                       value="1" id="is_active_edit_survey{{ $survey->id }}"
                                       @checked($survey->is_active)>
                                <label class="form-check-label" for="is_active_edit_survey{{ $survey->id }}">Faol</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-inline-block mt-4">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
