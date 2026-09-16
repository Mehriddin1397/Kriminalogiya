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
        <form action="{{ route('rahbariyat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @if($errors->any() && !old('_edit_id'))
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
                        <input type="text" name="name_uz" value="{{ old('name_uz') }}" class="form-control @error('name_uz') is-invalid @enderror">
                        @error('name_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">F.I.SH(ru):</label>
                        <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control @error('name_ru') is-invalid @enderror">
                        @error('name_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">F.I.SH(en):</label>
                        <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control @error('name_en') is-invalid @enderror">
                        @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">F.I.SH(kr):</label>
                        <input type="text" name="name_kr" value="{{ old('name_kr') }}" class="form-control @error('name_kr') is-invalid @enderror">
                        @error('name_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Lavozimi(uz):</label>
                    <input type="text" name="post_uz" value="{{ old('post_uz') }}" class="form-control @error('post_uz') is-invalid @enderror">
                    @error('post_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Lavozimi(ru):</label>
                    <input type="text" name="post_ru" value="{{ old('post_ru') }}" class="form-control @error('post_ru') is-invalid @enderror">
                    @error('post_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Lavozimi(en):</label>
                    <input type="text" name="post_en" value="{{ old('post_en') }}" class="form-control @error('post_en') is-invalid @enderror">
                    @error('post_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Lavozimi(kr):</label>
                    <input type="text" name="post_kr" value="{{ old('post_kr') }}" class="form-control @error('post_kr') is-invalid @enderror">
                    @error('post_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Rasmi:</label>
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" required>
                        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Elektron pochtasi:</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Tel_raqami:</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Ish vaqti:</label>
                    <input type="text" name="worktime" value="{{ old('worktime') }}" class="form-control @error('worktime') is-invalid @enderror">
                    @error('worktime')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary d-inline-block mt-4">Qo'shish</button>

            </div>
        </form>
    </div>

</div>
@if($errors->any() && !old('_edit_id'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var el = document.getElementById('tasksDetailsOffcanvas');
            if (el && window.bootstrap && window.bootstrap.Offcanvas) {
                window.bootstrap.Offcanvas.getOrCreateInstance(el).show();
            }
        });
    </script>
@endif
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
