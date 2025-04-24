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

                <div class="form-group mb-4">
                    <label class="form-label">Address_uz:</label>
                    <input type="text" name="address_uz" class="form-control">
                </div>


                <div class="form-group mb-4">
                    <label class="form-label">Address_ru:</label>
                    <input type="text" name="address_ru" class="form-control">
                </div>


                <div class="form-group mb-4">
                    <label class="form-label">Address_en:</label>
                    <input type="text" name="address_en" class="form-control">
                </div>


                <div class="form-group mb-4">
                    <label class="form-label">Address_kr:</label>
                    <input type="text" name="address_kr" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Phone:</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Email:</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">Ish vaqti:</label>
                    <input type="text" name="worktime" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">youtube_link:</label>
                    <input type="text" name="youtube_link" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">telegram_link:</label>
                    <input type="text" name="telegram_link" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">facebook_link:</label>
                    <input type="text" name="facebook_link" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label class="form-label">whatsapp_link:</label>
                    <input type="text" name="whatsapp_link" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary d-inline-block mt-4">Qo'shish</button>

            </div>
        </form>
    </div>

</div>
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
