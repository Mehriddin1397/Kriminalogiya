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
                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Yaratish</span>
            </a>
        </div>

    </div>
    <div class="offcanvas-body">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label class="form-label">Nomi(uz):</label>
                        <input type="text" name="name_uz" value="{{ old('name_uz') }}" class="form-control @error('name_uz') is-invalid @enderror">
                        @error('name_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(ru):</label>
                        <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control @error('name_ru') is-invalid @enderror">
                        @error('name_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(en):</label>
                        <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control @error('name_en') is-invalid @enderror">
                        @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(kr):</label>
                        <input type="text" name="name_kr" value="{{ old('name_kr') }}" class="form-control @error('name_kr') is-invalid @enderror">
                        @error('name_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Title(uz):</label>
                    <input type="text" name="title_uz" value="{{ old('title_uz') }}" class="form-control @error('title_uz') is-invalid @enderror">
                    @error('title_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Title(ru):</label>
                    <input type="text" name="title_ru" value="{{ old('title_ru') }}" class="form-control @error('title_ru') is-invalid @enderror">
                    @error('title_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Title(en):</label>
                    <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control @error('title_en') is-invalid @enderror">
                    @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Title(kr):</label>
                    <input type="text" name="title_kr" value="{{ old('title_kr') }}" class="form-control @error('title_kr') is-invalid @enderror">
                    @error('title_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label"> Matni(uz):</label>
                    <textarea name="description_uz" rows="10" id="editor1" class="form-control @error('description_uz') is-invalid @enderror">{{ old('description_uz') }}</textarea>
                    @error('description_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label"> Matni(ru):</label>
                    <textarea name="description_ru" rows="10" id="editor2" class="form-control @error('description_ru') is-invalid @enderror">{{ old('description_ru') }}</textarea>
                    @error('description_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label"> Matni(en):</label>
                    <textarea name="description_en" rows="10" id="editor3" class="form-control @error('description_en') is-invalid @enderror">{{ old('description_en') }}</textarea>
                    @error('description_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label"> Matni(kr):</label>
                    <textarea name="description_kr" rows="10" id="editor4" class="form-control @error('description_kr') is-invalid @enderror">{{ old('description_kr') }}</textarea>
                    @error('description_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Rasmi:</label>
                        <input type="file" name="photos[]" class="form-control" multiple required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label" for="categories">Kategoriyalari:</label>
                        <select name="categories[]" class="form-select form-control @error('categories') is-invalid @enderror">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ collect(old('categories'))->contains($category->id) ? 'selected' : '' }}>{{ $category->name_uz }}</option>
                            @endforeach
                        </select>
                        @error('categories')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">youtube_link:</label>
                    <input type="text" name="youtube_link" value="{{ old('youtube_link') }}" class="form-control @error('youtube_link') is-invalid @enderror">
                    @error('youtube_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">telegram_link:</label>
                    <input type="text" name="telegram_link" value="{{ old('telegram_link') }}" class="form-control @error('telegram_link') is-invalid @enderror">
                    @error('telegram_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">facebook_link:</label>
                    <input type="text" name="facebook_link" value="{{ old('facebook_link') }}" class="form-control @error('facebook_link') is-invalid @enderror">
                    @error('facebook_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">whatsapp_link:</label>
                    <input type="text" name="whatsapp_link" value="{{ old('whatsapp_link') }}" class="form-control @error('whatsapp_link') is-invalid @enderror">
                    @error('whatsapp_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary d-inline-block mt-4">Qo'shish</button>

            </div>
        </form>
    </div>

</div>
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
