<!--! ================================================================ !-->
@foreach($academia as $academy )
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit{{ $academy->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Memorandum</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('memorandum.update', $academy->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label">Davlat nomi(uz):</label>
                            <input type="text" name="country_uz" value="{{old('country_uz',$academy->country_uz)}}" class="form-control @error('country_uz') is-invalid @enderror">
                            @error('country_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Davlat nomi(ru):</label>
                            <input type="text" name="country_ru" value="{{old('country_ru',$academy->country_ru)}}" class="form-control @error('country_ru') is-invalid @enderror">
                            @error('country_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Davlat nomi(en):</label>
                            <input type="text" name="country_en" value="{{old('country_en',$academy->country_en)}}" class="form-control @error('country_en') is-invalid @enderror">
                            @error('country_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Davlat nomi(kr):</label>
                            <input type="text" name="country_kr" value="{{old('country_kr',$academy->country_kr)}}" class="form-control @error('country_kr') is-invalid @enderror">
                            @error('country_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Tashkilot nomi / memorandum nomi(uz):</label>
                            <input type="text" name="org_uz" value="{{old('org_uz',$academy->org_uz)}}" class="form-control @error('org_uz') is-invalid @enderror">
                            @error('org_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Tashkilot nomi / memorandum nomi(ru):</label>
                            <input type="text" name="org_ru" value="{{old('org_ru',$academy->org_ru)}}" class="form-control @error('org_ru') is-invalid @enderror">
                            @error('org_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Tashkilot nomi / memorandum nomi(en):</label>
                            <input type="text" name="org_en" value="{{old('org_en',$academy->org_en)}}" class="form-control @error('org_en') is-invalid @enderror">
                            @error('org_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Tashkilot nomi / memorandum nomi(kr):</label>
                            <input type="text" name="org_kr" value="{{old('org_kr',$academy->org_kr)}}" class="form-control @error('org_kr') is-invalid @enderror">
                            @error('org_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Davlat bayrog'i:</label>
                            <select name="flag" class="form-select form-control @error('flag') is-invalid @enderror">
                                @foreach(['uz'=>'O‘zbekiston','hu'=>'Vengriya','in'=>'Hindiston','kr'=>'Janubiy Koreya','intl'=>'Xalqaro','qa'=>'Qatar','tr'=>'Turkiya','de'=>'Germaniya','ru'=>'Rossiya','by'=>'Belarus','cn'=>'Xitoy','tj'=>'Tojikiston','un'=>'BMT'] as $code => $label)
                                    <option value="{{ $code }}" {{ old('flag', $academy->flag) === $code ? 'selected' : '' }}>{{ $label }} ({{ $code }})</option>
                                @endforeach
                            </select>
                            @error('flag')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Hujjat turi:</label>
                            <select name="doc_type" class="form-select form-control @error('doc_type') is-invalid @enderror">
                                <option value="memorandum" {{ old('doc_type', $academy->doc_type) === 'memorandum' ? 'selected' : '' }}>Memorandum</option>
                                <option value="protocol" {{ old('doc_type', $academy->doc_type) === 'protocol' ? 'selected' : '' }}>Bayonnoma (Protokol)</option>
                                <option value="protocol_program" {{ old('doc_type', $academy->doc_type) === 'protocol_program' ? 'selected' : '' }}>Bayonnoma (Dastur)</option>
                            </select>
                            @error('doc_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Sana:</label>
                            <input type="date" name="date" value="{{ old('date', optional($academy->date)->format('Y-m-d')) }}" class="form-control @error('date') is-invalid @enderror">
                            @error('date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Link (memorandum nomi bosilganda o'tiladigan havola):</label>
                            <input type="text" name="link" value="{{old('link',$academy->link)}}" class="form-control @error('link') is-invalid @enderror">
                            @error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        @if($academy->photos->count())
                            @foreach($academy->photos as $photo)
                                <img src="{{ asset('storage/' . $photo->file_path) }}" alt=""
                                     class="img-fluid mt-2 me-2" width="120">
                            @endforeach
                        @endif
                        <div class="form-group mb-4 mt-2">
                            <label class="form-label">Rasmlari (yangi yuklansa, eskilari almashtiriladi):</label>
                            <input type="file" name="photos[]" class="form-control @error('photos') is-invalid @enderror" multiple>
                            @error('photos')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
