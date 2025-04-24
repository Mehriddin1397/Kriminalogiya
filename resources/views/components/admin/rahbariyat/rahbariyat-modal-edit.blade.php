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

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(uz):</label>
                            <input type="text" name="name_uz" value="{{old('name_uz',$academy->name_uz)}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(ru):</label>
                            <input type="text" name="name_ru" value="{{old('name_ru',$academy->name_ru)}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(en):</label>
                            <input type="text" name="name_en" value="{{old('name_en',$academy->name_en)}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">F.I.SH(kr):</label>
                            <input type="text" name="name_kr" value="{{old('name_kr',$academy->name_kr)}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(uz):</label>
                        <input type="text" name="post_uz" value="{{old('post_uz',$academy->post_uz)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(ru):</label>
                        <input type="text" name="post_ru" value="{{old('post_ru',$academy->post_ru)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(en):</label>
                        <input type="text" name="post_en" value="{{old('post_en',$academy->post_en)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Lavozimi(kr):</label>
                        <input type="text" name="post_kr" value="{{old('post_kr',$academy->post_kr)}}" class="form-control">
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
                            <label class="form-label">Rasmi:</label>
                            <input type="file" name="photo" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Elektron pochtasi:</label>
                        <input type="text" name="email" value="{{old('email',$academy->email)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Tel_raqami:</label>
                        <input type="text" name="phone" value="{{old('phone',$academy->phone)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Ish vaqti:</label>
                        <input type="text" name="worktime" value="{{old('worktime',$academy->worktime)}}" class="form-control">
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
