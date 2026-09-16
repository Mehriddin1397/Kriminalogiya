<!--! ================================================================ !-->
@foreach($categories as $category )
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit{{ $category->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Kategoriya</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line">Kategoriya o'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(uz):</label>
                    <input type="text" class="form-control @error('name_uz') is-invalid @enderror" name="name_uz" value="{{ old('name_uz', $category->name_uz) }}" required>
                    @error('name_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(ru):</label>
                    <input type="text" class="form-control @error('name_ru') is-invalid @enderror" name="name_ru" value="{{ old('name_ru', $category->name_ru) }}" required>
                    @error('name_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(en):</label>
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ old('name_en', $category->name_en) }}" required>
                    @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(kr):</label>
                    <input type="text" class="form-control @error('name_kr') is-invalid @enderror" name="name_kr" value="{{ old('name_kr', $category->name_kr) }}" required>
                    @error('name_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(uz):</label>
                    <input type="text" class="form-control @error('slug_uz') is-invalid @enderror" name="slug_uz" value="{{ old('slug_uz', $category->slug_uz) }}" required>
                    @error('slug_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(ru):</label>
                    <input type="text" class="form-control @error('slug_ru') is-invalid @enderror" name="slug_ru" value="{{ old('slug_ru', $category->slug_ru) }}" required>
                    @error('slug_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(en):</label>
                    <input type="text" class="form-control @error('slug_en') is-invalid @enderror" name="slug_en" value="{{ old('slug_en', $category->slug_en) }}" required>
                    @error('slug_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(kr):</label>
                    <input type="text" class="form-control @error('slug_kr') is-invalid @enderror" name="slug_kr" value="{{ old('slug_kr', $category->slug_kr) }}" required>
                    @error('slug_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label for="object_type">Obyekt turi:</label>
                    <select name="object_type" required class="form-select form-control @error('object_type') is-invalid @enderror">
                        <option value="academia" {{ old('object_type', $category->object_type ?? '') == 'academia' ? 'selected' : '' }}>
                            Ilmiy kengash
                        </option>
                        <option value="bibliophilia" {{ old('object_type', $category->object_type ?? '') == 'bibliophilia' ? 'selected' : '' }}>
                            Kitobxonlik
                        </option>
                        <option value="crimes" {{ old('object_type', $category->object_type ?? '') == 'crimes' ? 'selected' : '' }}>
                            Jinoyatlar
                        </option>
                        <option value="institut" {{ old('object_type', $category->object_type ?? '') == 'institut' ? 'selected' : '' }}>
                            Institut va ishga qabul
                        </option>
                        <option value="jurnal" {{ old('object_type', $category->object_type ?? '') == 'jurnal' ? 'selected' : '' }}>
                            Jurnallar
                        </option>
                        <option value="news" {{ old('object_type', $category->object_type ?? '') == 'news' ? 'selected' : '' }}>
                            Yangiliklar
                        </option>
                        <option value="research" {{ old('object_type', $category->object_type ?? '') == 'research' ? 'selected' : '' }}>
                            Tadqiqotlar
                        </option>
                        <option value="scholars" {{ old('object_type', $category->object_type ?? '') == 'scholars' ? 'selected' : '' }}>
                            Tadqiqotchilar va amaliy yordam
                        </option>
                        <option value="partner" {{ old('object_type', $category->object_type ?? '') == 'partner' ? 'selected' : '' }}>
                            Hamkorlar
                        </option>
                        <option value="expertise" {{ old('object_type', $category->object_type ?? '') == 'expertise' ? 'selected' : '' }}>
                            Ilmiy salohiyat va hamkorlar
                        </option>
                        <option value="articles" {{ old('object_type', $category->object_type ?? '') == 'articles' ? 'selected' : '' }}>
                            Maqola va disertatsiya mavzulari
                        </option>
                    </select>
                </div>

                @if($category->photos()->exists())
                    <!-- Munosabat mavjudligini tekshirish -->
                    @foreach($category->photos as $photo)
                        <!-- Munosabatni chaqirish va kolleksiyani aylanish -->
                        <img src="{{ asset('storage/' . $photo->file_path) }}" alt="Question Image"
                             class="img-fluid mt-2" width="150">
                    @endforeach
                @endif
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Rasmi:</label>
                        <input type="file" name="photos[]" class="form-control" multiple >
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Yangilash</button>
            </form>
        </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
