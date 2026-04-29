<!--! ================================================================ !-->
@foreach($papers as $paper )
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit{{ $academy->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Hamkorlar</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('papers.update', $paper->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                                    <option value="{{ $issue->id }}" {{ old('issue_id', $paper->issue_id) == $issue->id ? 'selected' : '' }}>
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
                                   value="{{ old('title_uz', $paper->title_uz) }}" placeholder="Maqola nomi (o'zbek tilida)">
                            @error('title_uz')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Title (ru):</label>
                            <input type="text" name="title_ru" class="form-control @error('title_ru') is-invalid @enderror"
                                   value="{{ old('title_ru', $paper->title_ru) }}" placeholder="Название статьи (на русском)">
                            @error('title_ru')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Title (en):</label>
                            <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror"
                                   value="{{ old('title_en', $paper->title_en) }}" placeholder="Article title (in English)">
                            @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Title (kr):</label>
                            <input type="text" name="title_kr" class="form-control @error('title_kr') is-invalid @enderror"
                                   value="{{ old('title_kr', $paper->title_kr) }}" placeholder="Корей тилидаги мақола номи">
                            @error('title_kr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Muallif(lar):</label>
                            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror"
                                   value="{{ old('author', $paper->author) }}" placeholder="Masalan: Anvar Karimov, Nilufar Ahmedova">
                            @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Joriy PDF faylni ko'rsatish -->
                        @if($paper->pdf_file)
                            <div class="form-group mb-4">
                                <label class="form-label">Joriy PDF fayl:</label>
                                <div class="mb-2">
                                    @if($paper->pdf_file)
                                        <a href="{{ asset('storage/' . $paper->pdf_file) }}" target="_blank" class="btn btn-sm btn-info">
                                            📄 Hozirgi PDF faylni ko'rish
                                        </a>
                                    @endif

                                    <div class="form-check mt-2">
                                        <input type="checkbox" name="remove_pdf" id="remove_pdf" class="form-check-input" value="1">
                                        <label for="remove_pdf" class="form-check-label text-danger">
                                            🗑️ PDF faylni o'chirish
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="form-group mb-4">
                            <label class="form-label">
                                @if($paper->pdf_file)
                                    Yangi PDF fayl yuklash (ixtiyoriy):
                                @else
                                    PDF fayl:
                                @endif
                            </label>
                            <input type="file" name="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror"
                                   accept=".pdf" @if(!$paper->pdf_file) required @endif>
                            <small class="text-muted">Faqat PDF formatida</small>
                            @error('pdf_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Yangilash</button>
                            <a href="{{ route('papers.index') }}" class="btn btn-secondary">Bekor qilish</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
