<!--! ================================================================ !-->
@foreach($issues as $issue )
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
            <form action="{{ route('issues.update', $issue->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label" for="journal_id">Jurnal:</label>
                            <select name="journal_id" class="form-select form-control @error('journal_id') is-invalid @enderror">
                                <option value="">Jurnalni tanlang</option>
                                @foreach($journals as $journal)
                                    <option value="{{ $journal->id }}" {{ old('journal_id', $issue->journal_id) == $journal->id ? 'selected' : '' }}>
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
                                   value="{{ old('title_uz', $issue->title_uz) }}" placeholder="Masala: 2026-yil 1-son">
                            @error('title_uz')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Title (ru):</label>
                            <input type="text" name="title_ru" class="form-control @error('title_ru') is-invalid @enderror"
                                   value="{{ old('title_ru', $issue->title_ru) }}">
                            @error('title_ru')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Title (en):</label>
                            <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror"
                                   value="{{ old('title_en', $issue->title_en) }}">
                            @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Title (kr):</label>
                            <input type="text" name="title_kr" class="form-control @error('title_kr') is-invalid @enderror"
                                   value="{{ old('title_kr', $issue->title_kr) }}">
                            @error('title_kr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Yili:</label>
                            <input type="number" name="year" class="form-control @error('year') is-invalid @enderror"
                                   value="{{ old('year', $issue->year) }}" min="2000" max="{{ date('Y') }}">
                            @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Jurnal soni:</label>
                            <input type="number" name="number" class="form-control @error('number') is-invalid @enderror"
                                   value="{{ old('number', $issue->number) }}" min="1">
                            @error('number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Nashr qilingan sana:</label>
                            <input type="date" name="published_at" class="form-control @error('published_at') is-invalid @enderror"
                                   value="{{ old('published_at', $issue->published_at ? date('Y-m-d', strtotime($issue->published_at)) : '') }}">
                            @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Joriy faylni ko'rsatish -->
                        @if($issue->file_path)
                            <div class="form-group mb-4">
                                <label class="form-label">Joriy fayl:</label>
                                <div class="mb-2">
                                    @php
                                        $extension = pathinfo($issue->file_path, PATHINFO_EXTENSION);
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <div>
                                            <img src="{{ Storage::url($issue->file_path) }}" alt="Current image" style="max-width: 200px; max-height: 200px;" class="img-thumbnail">
                                        </div>
                                    @else
                                        <a href="{{ Storage::url($issue->file_path) }}" target="_blank" class="btn btn-sm btn-info">
                                            📄 Hozirgi faylni ko'rish
                                        </a>
                                    @endif

                                    <div class="form-check mt-2">
                                        <input type="checkbox" name="remove_file" id="remove_file" class="form-check-input" value="1">
                                        <label for="remove_file" class="form-check-label text-danger">
                                            🗑️ Faylni o'chirish
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="form-group mb-4">
                            <label class="form-label">
                                @if($issue->file_path)
                                    Yangi fayl yuklash (PDF yoki rasm):
                                @else
                                    Fayl (rasm yoki PDF):
                                @endif
                            </label>
                            <input type="file" name="file_path" class="form-control @error('file_path') is-invalid @enderror"
                                   accept="image/*,.pdf">
                            <small class="text-muted">Rasm yoki PDF formatida (max 2MB)</small>
                            @error('file_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Yangilash</button>
                            <a href="{{ route('issues.index') }}" class="btn btn-secondary">Bekor qilish</a>
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
