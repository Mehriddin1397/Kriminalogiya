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
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Institut</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('institut.update', $academy->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label">Nomi(uz):</label>
                            <input type="text" name="name_uz" value="{{old('name_uz',$academy->name_uz)}}" class="form-control @error('name_uz') is-invalid @enderror">
                            @error('name_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(ru):</label>
                            <input type="text" name="name_ru" value="{{old('name_ru',$academy->name_ru)}}" class="form-control @error('name_ru') is-invalid @enderror">
                            @error('name_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(en):</label>
                            <input type="text" name="name_en" value="{{old('name_en',$academy->name_en)}}" class="form-control @error('name_en') is-invalid @enderror">
                            @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(kr):</label>
                            <input type="text" name="name_kr" value="{{old('name_kr',$academy->name_kr)}}" class="form-control @error('name_kr') is-invalid @enderror">
                            @error('name_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label"> Matni(uz):</label>
                        <textarea name="description_uz" class="form-control @error('description_uz') is-invalid @enderror">{{old('description_uz',$academy->description_uz)}}</textarea>
                        @error('description_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label"> Matni(ru):</label>
                        <textarea name="description_ru" class="form-control @error('description_ru') is-invalid @enderror">{{old('description_ru',$academy->description_ru)}}</textarea>
                        @error('description_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label"> Matni(en):</label>
                        <textarea name="description_en" class="form-control @error('description_en') is-invalid @enderror">{{old('description_en',$academy->description_en)}}</textarea>
                        @error('description_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label"> Matni(kr):</label>
                        <textarea name="description_kr" class="form-control @error('description_kr') is-invalid @enderror">{{old('description_kr',$academy->description_kr)}}</textarea>
                        @error('description_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    @if($academy->photos()->exists())
                        <!-- Munosabat mavjudligini tekshirish -->
                        @foreach($academy->photos as $photo)
                            <!-- Munosabatni chaqirish va kolleksiyani aylanish -->
                            <img src="{{ asset('storage/' . $photo->file_path) }}" alt="Question Image"
                                 class="img-fluid mt-2" width="150">
                        @endforeach
                    @endif
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Rasmi (yangilash uchun tanlang, aks holda bo'sh qoldiring):</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label" for="categories">Kategoriyalari:</label>
                            <select name="categories[]" class="form-select form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if($academy->categories->contains($category->id)) selected @endif>{{ $category->name_uz }}</option>
                                @endforeach
                            </select>
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
