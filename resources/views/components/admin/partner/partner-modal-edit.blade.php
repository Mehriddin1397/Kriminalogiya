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
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Hamkorlar</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('partner.update', $academy->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(uz):</label>
                            <input type="text" name="name_uz" value="{{old('name_uz',$academy->name_uz)}}" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(ru):</label>
                            <input type="text" name="name_ru" value="{{old('name_ru',$academy->name_ru)}}" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(en):</label>
                            <input type="text" name="name_en" value="{{old('name_en',$academy->name_en)}}" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(kr):</label>
                            <input type="text" name="name_kr" value="{{old('name_kr',$academy->name_kr)}}" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label">Link:</label>
                            <input type="text" name="link" value="{{old('link',$academy->link)}}" class="form-control">
                        </div>
                        @if($academy->photos()->exists())
                            <!-- Munosabat mavjudligini tekshirish -->
                            @foreach($academy->photos as $photo)
                                <!-- Munosabatni chaqirish va kolleksiyani aylanish -->
                                <img src="{{ asset('storage/' . $photo->file_path) }}" alt="Question Image"
                                     class="img-fluid mt-2" width="150">
                            @endforeach
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label">Rasmi:</label>
                            <input type="file" name="photo" class="form-control" >
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="categories">Kategoriyalari:</label>
                            <select name="categories[]" class="form-select form-control" >
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($academy->categories->contains($category->id)) selected @endif>{{ $category->name_uz }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-inline-block mt-4">Saqlash</button>

                </div>
            </form>
        </div>
    </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
