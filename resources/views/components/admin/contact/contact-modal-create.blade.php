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
        <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
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

                <div class="form-group mb-4">
                    <label class="form-label">Address_uz:</label>
                    <input type="text" name="address_uz" value="{{ old('address_uz') }}" class="form-control @error('address_uz') is-invalid @enderror">
                    @error('address_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>


                <div class="form-group mb-4">
                    <label class="form-label">Address_ru:</label>
                    <input type="text" name="address_ru" value="{{ old('address_ru') }}" class="form-control @error('address_ru') is-invalid @enderror">
                    @error('address_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>


                <div class="form-group mb-4">
                    <label class="form-label">Address_en:</label>
                    <input type="text" name="address_en" value="{{ old('address_en') }}" class="form-control @error('address_en') is-invalid @enderror">
                    @error('address_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>


                <div class="form-group mb-4">
                    <label class="form-label">Address_kr:</label>
                    <input type="text" name="address_kr" value="{{ old('address_kr') }}" class="form-control @error('address_kr') is-invalid @enderror">
                    @error('address_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Phone:</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Email:</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Ish vaqti:</label>
                    <input type="text" name="worktime" value="{{ old('worktime') }}" class="form-control @error('worktime') is-invalid @enderror">
                    @error('worktime')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
