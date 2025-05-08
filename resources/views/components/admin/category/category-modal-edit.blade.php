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

                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(uz):</label>
                    <input type="text" class="form-control" name="name_uz" value="{{ $category->name_uz }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(ru):</label>
                    <input type="text" class="form-control" name="name_ru" value="{{ $category->name_ru }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(en):</label>
                    <input type="text" class="form-control" name="name_en" value="{{ $category->name_en }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriya nomi(kr):</label>
                    <input type="text" class="form-control" name="name_kr" value="{{ $category->name_kr }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(uz):</label>
                    <input type="text" class="form-control" name="slug_uz" value="{{ $category->slug_uz }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(ru):</label>
                    <input type="text" class="form-control" name="slug_ru" value="{{ $category->slug_ru }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(en):</label>
                    <input type="text" class="form-control" name="slug_en" value="{{ $category->slug_en }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Obekt nomi(kr):</label>
                    <input type="text" class="form-control" name="slug_kr" value="{{ $category->slug_kr }}" required>
                </div>
                <div class="form-group mb-4">
                    <label for="object_type">Obyekt turi:</label>
                    <select name="object_type" required class="form-select form-control">
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


                <button type="submit" class="btn btn-primary">Yangilash</button>
            </form>
        </div>
        </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
