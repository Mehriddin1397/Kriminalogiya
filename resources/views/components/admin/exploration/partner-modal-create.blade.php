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
        {{-- ===================== CREATE FORM ===================== --}}

        <form action="{{ route('explorations.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- NAME --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi (UZ):</label>
                        <input type="text" name="name_uz" class="form-control" value="{{ old('name_uz') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi (RU):</label>
                        <input type="text" name="name_ru" class="form-control" value="{{ old('name_ru') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi (EN):</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Nomi (KR):</label>
                        <input type="text" name="name_kr" class="form-control" value="{{ old('name_kr') }}">
                    </div>
                </div>

                {{-- PURPOSE --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Maqsadi (UZ):</label>
                        <textarea name="purpose_uz" class="form-control" rows="4">{{ old('purpose_uz') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Maqsadi (RU):</label>
                        <textarea name="purpose_ru" class="form-control" rows="4">{{ old('purpose_ru') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Maqsadi (EN):</label>
                        <textarea name="purpose_en" class="form-control" rows="4">{{ old('purpose_en') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Maqsadi (KR):</label>
                        <textarea name="purpose_kr" class="form-control" rows="4">{{ old('purpose_kr') }}</textarea>
                    </div>
                </div>

                {{-- TASKS --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Vazifalari (UZ):</label>
                        <textarea name="tasks_uz" class="form-control" rows="4">{{ old('tasks_uz') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Vazifalari (RU):</label>
                        <textarea name="tasks_ru" class="form-control" rows="4">{{ old('tasks_ru') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Vazifalari (EN):</label>
                        <textarea name="tasks_en" class="form-control" rows="4">{{ old('tasks_en') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Vazifalari (KR):</label>
                        <textarea name="tasks_kr" class="form-control" rows="4">{{ old('tasks_kr') }}</textarea>
                    </div>
                </div>

                {{-- EXPECTED RESULTS --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Kutilayotgan natijalar (UZ):</label>
                        <textarea name="expected_results_uz" class="form-control" rows="4">{{ old('expected_results_uz') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Kutilayotgan natijalar (RU):</label>
                        <textarea name="expected_results_ru" class="form-control" rows="4">{{ old('expected_results_ru') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Kutilayotgan natijalar (EN):</label>
                        <textarea name="expected_results_en" class="form-control" rows="4">{{ old('expected_results_en') }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Kutilayotgan natijalar (KR):</label>
                        <textarea name="expected_results_kr" class="form-control" rows="4">{{ old('expected_results_kr') }}</textarea>
                    </div>
                </div>

                {{-- LEADER --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Loyiha rahbari (UZ):</label>
                        <input type="text" name="leader_uz" class="form-control" value="{{ old('leader_uz') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Loyiha rahbari (RU):</label>
                        <input type="text" name="leader_ru" class="form-control" value="{{ old('leader_ru') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Loyiha rahbari (EN):</label>
                        <input type="text" name="leader_en" class="form-control" value="{{ old('leader_en') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Loyiha rahbari (KR):</label>
                        <input type="text" name="leader_kr" class="form-control" value="{{ old('leader_kr') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label" for="categories">Kategoriyalari:</label>
                        <select name="categories[]" class="form-select form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_uz }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- BUTTON --}}
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        Saqlash
                    </button>
                </div>

            </div>
        </form>

    </div>

</div>
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
