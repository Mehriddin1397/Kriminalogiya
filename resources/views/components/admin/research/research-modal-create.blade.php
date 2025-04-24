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
        <form action="{{ route('research.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(uz):</label>
                        <input type="text" name="name_uz" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(ru):</label>
                        <input type="text" name="name_ru" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(en):</label>
                        <input type="text" name="name_en" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi(kr):</label>
                        <input type="text" name="name_kr" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Rasmi:</label>
                        <input type="file" name="photo" class="form-control" required>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Fayli (pdf):</label>
                        <input type="file" name="file_path" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="categories">Kategoriyalari:</label>
                        <select name="categories[]" class="form-select form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_uz }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-inline-block mt-4">Qo'shish</button>

            </div>
        </form>
    </div>

</div>
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
