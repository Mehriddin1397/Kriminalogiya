<!--! ================================================================ !-->
@foreach($explorations as $exploration )
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
            <form action="{{ route('explorations.update', $exploration->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- NAME --}}
                <div class="mb-3">
                    <label>Name UZ</label>
                    <input type="text" name="name_uz" class="form-control"
                           value="{{ old('name_uz', $exploration->name_uz) }}">
                </div>

                <div class="mb-3">
                    <label>Name RU</label>
                    <input type="text" name="name_ru" class="form-control"
                           value="{{ old('name_ru', $exploration->name_ru) }}">
                </div>

                <div class="mb-3">
                    <label>Name EN</label>
                    <input type="text" name="name_en" class="form-control"
                           value="{{ old('name_en', $exploration->name_en) }}">
                </div>

                <div class="mb-3">
                    <label>Name KR</label>
                    <input type="text" name="name_kr" class="form-control"
                           value="{{ old('name_kr', $exploration->name_kr) }}">
                </div>

                {{-- PURPOSE --}}
                <div class="mb-3">
                    <label>Maqsadi UZ</label>
                    <textarea name="purpose_uz" class="form-control" rows="4">{{ old('purpose_uz', $exploration->purpose_uz) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Maqsadi RU</label>
                    <textarea name="purpose_ru" class="form-control" rows="4">{{ old('purpose_ru', $exploration->purpose_ru) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Maqsadi EN</label>
                    <textarea name="purpose_en" class="form-control" rows="4">{{ old('purpose_en', $exploration->purpose_en) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Maqsadi KR</label>
                    <textarea name="purpose_kr" class="form-control" rows="4">{{ old('purpose_kr', $exploration->purpose_kr) }}</textarea>
                </div>

                {{-- TASKS --}}
                <div class="mb-3">
                    <label>Vazifalari UZ</label>
                    <textarea name="tasks_uz" class="form-control" rows="4">{{ old('tasks_uz', $exploration->tasks_uz) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Vazifalari RU</label>
                    <textarea name="tasks_ru" class="form-control" rows="4">{{ old('tasks_ru', $exploration->tasks_ru) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Vazifalari EN</label>
                    <textarea name="tasks_en" class="form-control" rows="4">{{ old('tasks_en', $exploration->tasks_en) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Vazifalari KR</label>
                    <textarea name="tasks_kr" class="form-control" rows="4">{{ old('tasks_kr', $exploration->tasks_kr) }}</textarea>
                </div>

                {{-- EXPECTED RESULTS --}}
                <div class="mb-3">
                    <label>Kutilayotgan natijalar UZ</label>
                    <textarea name="expected_results_uz" class="form-control" rows="4">{{ old('expected_results_uz', $exploration->expected_results_uz) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Kutilayotgan natijalar RU</label>
                    <textarea name="expected_results_ru" class="form-control" rows="4">{{ old('expected_results_ru', $exploration->expected_results_ru) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Kutilayotgan natijalar EN</label>
                    <textarea name="expected_results_en" class="form-control" rows="4">{{ old('expected_results_en', $exploration->expected_results_en) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Kutilayotgan natijalar KR</label>
                    <textarea name="expected_results_kr" class="form-control" rows="4">{{ old('expected_results_kr', $exploration->expected_results_kr) }}</textarea>
                </div>

                {{-- LEADER --}}
                <div class="mb-3">
                    <label>Loyiha rahbari UZ</label>
                    <input type="text" name="leader_uz" class="form-control"
                           value="{{ old('leader_uz', $exploration->leader_uz) }}">
                </div>

                <div class="mb-3">
                    <label>Loyiha rahbari RU</label>
                    <input type="text" name="leader_ru" class="form-control"
                           value="{{ old('leader_ru', $exploration->leader_ru) }}">
                </div>

                <div class="mb-3">
                    <label>Loyiha rahbari EN</label>
                    <input type="text" name="leader_en" class="form-control"
                           value="{{ old('leader_en', $exploration->leader_en) }}">
                </div>

                <div class="mb-3">
                    <label>Loyiha rahbari KR</label>
                    <input type="text" name="leader_kr" class="form-control"
                           value="{{ old('leader_kr', $exploration->leader_kr) }}">
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label" for="categories">Kategoriyalari:</label>
                        <select name="categories[]" class="form-select form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if($academy->categories->contains($category->id)) selected @endif>{{ $category->name_uz }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Yangilash
                </button>
            </form>
        </div>
    </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
