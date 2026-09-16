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
                <h2 class="fs-14 fw-bold text-truncate-1-line">Kategoriya</h2>
                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Kategoriya yaratish</span>
            </a>
        </div>

    </div>
    <div class="offcanvas-body">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label class="form-label">Kategoriya nomi (uz):</label>
                        <input type="text" name="name_uz" value="{{ old('name_uz') }}" class="form-control @error('name_uz') is-invalid @enderror">
                        @error('name_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Kategoriya nomi (ru):</label>
                        <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control @error('name_ru') is-invalid @enderror">
                        @error('name_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Kategoriya nomi (en):</label>
                        <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control @error('name_en') is-invalid @enderror">
                        @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Kategoriya nomi (kr):</label>
                        <input type="text" name="name_kr" value="{{ old('name_kr') }}" class="form-control @error('name_kr') is-invalid @enderror">
                        @error('name_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Obekt nomi (uz):</label>
                        <input type="text" name="slug_uz" value="{{ old('slug_uz') }}" class="form-control @error('slug_uz') is-invalid @enderror">
                        @error('slug_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Obekt nomi (ru):</label>
                        <input type="text" name="slug_ru" value="{{ old('slug_ru') }}" class="form-control @error('slug_ru') is-invalid @enderror">
                        @error('slug_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Obekt nomi (en):</label>
                        <input type="text" name="slug_en" value="{{ old('slug_en') }}" class="form-control @error('slug_en') is-invalid @enderror">
                        @error('slug_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Obekt nomi (kr):</label>
                        <input type="text" name="slug_kr" value="{{ old('slug_kr') }}" class="form-control @error('slug_kr') is-invalid @enderror">
                        @error('slug_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="object_type">Obyekt turi:</label>
                        <select name="object_type" class="form-select form-control @error('object_type') is-invalid @enderror" required>
                            <option value="academia" {{ old('object_type') == 'academia' ? 'selected' : '' }}>Ilmiy kengash </option>
                            <option value="bibliophilia" {{ old('object_type') == 'bibliophilia' ? 'selected' : '' }}>Kitobxonlik</option>
                            <option value="crimes" {{ old('object_type') == 'crimes' ? 'selected' : '' }}>Jinoyatlar</option>
                            <option value="institut" {{ old('object_type') == 'institut' ? 'selected' : '' }}>Institut va ishga qabul</option>
                            <option value="jurnal" {{ old('object_type') == 'jurnal' ? 'selected' : '' }}>Jurnallar</option>
                            <option value="news" {{ old('object_type') == 'news' ? 'selected' : '' }}>Yangiliklar</option>
                            <option value="research" {{ old('object_type') == 'research' ? 'selected' : '' }}>Tadqiqotlar</option>
                            <option value="scholars" {{ old('object_type') == 'scholars' ? 'selected' : '' }}>Tadqiqotchilar va amaliy yordam</option>
                            <option value="partner" {{ old('object_type') == 'partner' ? 'selected' : '' }}>Hamkorlar</option>
                            <option value="expertise" {{ old('object_type') == 'expertise' ? 'selected' : '' }}>Ilmiy salohiyat va hamkorlar</option>
                            <option value="articles" {{ old('object_type') == 'articles' ? 'selected' : '' }}>Maqola va disertatsiya mavzulari</option>
                            <option value="exploration" {{ old('object_type') == 'exploration' ? 'selected' : '' }}>Tadqiqot loyihalari</option>
                        </select>
                        @error('object_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Rasmi:</label>
                            <input type="file" name="photos[]" class="form-control" multiple >
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-inline-block mt-4">Kategoriya qo'shish</button>

            </div>
        </form>
    </div>

</div>
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
