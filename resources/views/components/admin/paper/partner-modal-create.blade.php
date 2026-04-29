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
        <form action="{{ route('papers.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label class="form-label" for="issue_id">Jurnal soni:</label>
                        <select name="issue_id" class="form-select form-control @error('issue_id') is-invalid @enderror">
                            <option value="">Jurnal sonini tanlang</option>
                            @foreach($issues as $issue)
                                <option value="{{ $issue->id }}" {{ old('issue_id') == $issue->id ? 'selected' : '' }}>
                                    {{ $issue->title_uz }} ({{ $issue->number }}-son, {{ $issue->year }})
                                </option>
                            @endforeach
                        </select>
                        @error('issue_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Title (uz):</label>
                        <input type="text" name="title_uz" class="form-control @error('title_uz') is-invalid @enderror"
                               value="{{ old('title_uz') }}" placeholder="Maqola nomi (o'zbek tilida)">
                        @error('title_uz')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Title (ru):</label>
                        <input type="text" name="title_ru" class="form-control @error('title_ru') is-invalid @enderror"
                               value="{{ old('title_ru') }}" placeholder="Название статьи (на русском)">
                        @error('title_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Title (en):</label>
                        <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror"
                               value="{{ old('title_en') }}" placeholder="Article title (in English)">
                        @error('title_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Title (kr):</label>
                        <input type="text" name="title_kr" class="form-control @error('title_kr') is-invalid @enderror"
                               value="{{ old('title_kr') }}" placeholder="Корей тилидаги мақола номи">
                        @error('title_kr')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">Muallif(lar):</label>
                        <input type="text" name="author" class="form-control @error('author') is-invalid @enderror"
                               value="{{ old('author') }}" placeholder="Masalan: Anvar Karimov, Nilufar Ahmedova">
                        @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label">PDF fayl:</label>
                        <input type="file" name="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror"
                               accept=".pdf" required>
                        <small class="text-muted">Faqat PDF formatida </small>
                        @error('pdf_file')
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
