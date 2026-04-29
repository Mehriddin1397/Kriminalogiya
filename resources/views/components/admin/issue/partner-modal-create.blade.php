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
        <form action="{{ route('issues.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <!-- Validation xatolarni ko'rsatish -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group mb-4">
                        <label class="form-label" for="journal_id">Jurnal:</label>
                        <select name="journal_id" class="form-select form-control @error('journal_id') is-invalid @enderror">
                            <option value="">Jurnalni tanlang</option>
                            @foreach($journals as $journal)
                                <option value="{{ $journal->id }}" {{ old('journal_id') == $journal->id ? 'selected' : '' }}>
                                    {{ $journal->name_uz }}
                                </option>
                            @endforeach
                        </select>
                        @error('journal_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Title (uz):</label>
                        <input type="text" name="title_uz" class="form-control @error('title_uz') is-invalid @enderror"
                               value="{{ old('title_uz') }}" placeholder="Masala: 2026-yil 1-son">
                        @error('title_uz')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Title (ru):</label>
                        <input type="text" name="title_ru" class="form-control @error('title_ru') is-invalid @enderror"
                               value="{{ old('title_ru') }}">
                        @error('title_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Title (en):</label>
                        <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror"
                               value="{{ old('title_en') }}">
                        @error('title_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Title (kr):</label>
                        <input type="text" name="title_kr" class="form-control @error('title_kr') is-invalid @enderror"
                               value="{{ old('title_kr') }}">
                        @error('title_kr')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Yili:</label>
                        <input type="number" name="year" class="form-control @error('year') is-invalid @enderror"
                               value="{{ old('year', date('Y')) }}" min="2000" max="{{ date('Y') }}">
                        @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Jurnal soni:</label>
                        <input type="number" name="number" class="form-control @error('number') is-invalid @enderror"
                               value="{{ old('number') }}" min="1">
                        @error('number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Nashr qilingan sana:</label>
                        <input type="date" name="published_at" class="form-control @error('published_at') is-invalid @enderror"
                               value="{{ old('published_at') }}">
                        @error('published_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Fayl (rasm yoki PDF)ixtiyoriy:</label>
                        <input type="file" name="file_path" class="form-control @error('file_path') is-invalid @enderror"
                               accept="image/*,.pdf">
                        @error('file_path')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary d-inline-block mt-4">Qo'shish</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
