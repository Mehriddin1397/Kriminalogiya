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
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Rahbariyat</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('rahbariyat.update', $academy->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_edit_id" value="{{ $academy->id }}">

                <div class="row">
                    @if($errors->any() && (int) old('_edit_id') === $academy->id)
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
                            <label class="form-label">F.I.SH(uz):</label>
                            <input type="text" name="name_uz" value="{{old('name_uz',$academy->name_uz)}}" class="form-control @error('name_uz') is-invalid @enderror">
                            @error('name_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(ru):</label>
                            <input type="text" name="name_ru" value="{{old('name_ru',$academy->name_ru)}}" class="form-control @error('name_ru') is-invalid @enderror">
                            @error('name_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(en):</label>
                            <input type="text" name="name_en" value="{{old('name_en',$academy->name_en)}}" class="form-control @error('name_en') is-invalid @enderror">
                            @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(kr):</label>
                            <input type="text" name="name_kr" value="{{old('name_kr',$academy->name_kr)}}" class="form-control @error('name_kr') is-invalid @enderror">
                            @error('name_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(uz):</label>
                        <input type="text" name="post_uz" value="{{old('post_uz',$academy->post_uz)}}" class="form-control @error('post_uz') is-invalid @enderror">
                        @error('post_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(ru):</label>
                        <input type="text" name="post_ru" value="{{old('post_ru',$academy->post_ru)}}" class="form-control @error('post_ru') is-invalid @enderror">
                        @error('post_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(en):</label>
                        <input type="text" name="post_en" value="{{old('post_en',$academy->post_en)}}" class="form-control @error('post_en') is-invalid @enderror">
                        @error('post_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(kr):</label>
                        <input type="text" name="post_kr" value="{{old('post_kr',$academy->post_kr)}}" class="form-control @error('post_kr') is-invalid @enderror">
                        @error('post_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                            <label class="form-label">Rasmi (o'zgartirish uchun tanlang, aks holda bo'sh qoldiring):</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Elektron pochtasi:</label>
                        <input type="text" name="email" value="{{old('email',$academy->email)}}" class="form-control @error('email') is-invalid @enderror">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Tel_raqami:</label>
                        <input type="text" name="phone" value="{{old('phone',$academy->phone)}}" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Ish vaqti:</label>
                        <input type="text" name="worktime" value="{{old('worktime',$academy->worktime)}}" class="form-control @error('worktime') is-invalid @enderror">
                        @error('worktime')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary d-inline-block mt-4">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
    @if($errors->any() && (int) old('_edit_id') === $academy->id)
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var el = document.getElementById('tasksDetailsOffcanvasEdit{{ $academy->id }}');
                if (el && window.bootstrap && window.bootstrap.Offcanvas) {
                    window.bootstrap.Offcanvas.getOrCreateInstance(el).show();
                }
            });
        </script>
    @endif
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
