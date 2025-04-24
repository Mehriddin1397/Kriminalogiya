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
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Contact</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('contact.update', $academy->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group mb-4">
                        <label class="form-label">Address_uz:</label>
                        <input type="text" name="address_uz" value="{{old('address_uz',$academy->address_uz)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Address_ru:</label>
                        <input type="text" name="address_ru" value="{{old('address_ru',$academy->address_ru)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Address_en:</label>
                        <input type="text" name="address_en" value="{{old('address_en',$academy->address_en)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Address_kr:</label>
                        <input type="text" name="address_kr" value="{{old('address_kr',$academy->address_kr)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Phone:</label>
                        <input type="text" name="phone"  value="{{old('phone',$academy->phone)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Email:</label>
                        <input type="text" name="email"  value="{{old('email',$academy->email)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Ish vaqti:</label>
                        <input type="text" name="worktime" value="{{old('worktime',$academy->worktime)}}"  class="form-control">
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">youtube_link:</label>
                        <input type="text" name="youtube_link" value="{{old('youtube_link',$academy->youtube_link)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">telegram_link:</label>
                        <input type="text" name="telegram_link" value="{{old('telegram_link',$academy->telegram_link)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">facebook_link:</label>
                        <input type="text" name="facebook_link" value="{{old('facebook_link',$academy->facebook_link)}}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">whatsapp_link:</label>
                        <input type="text" name="whatsapp_link" value="{{old('whatsapp_link',$academy->whatsapp_link)}}" class="form-control">
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
