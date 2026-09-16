<!--! ================================================================ !-->
@foreach($videos as $video)
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit{{ $video->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Video</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('videos.update', $video->id) }}" method="POST">
                @csrf
                @method('PUT')

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

                    @if($video->thumbnail_url)
                        <div class="col-md-12 mb-3">
                            <img src="{{ $video->thumbnail_url }}" alt="" class="img-fluid" width="220">
                        </div>
                    @endif

                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label class="form-label">YouTube video havolasi:</label>
                            <input type="text" name="youtube_url" value="{{ old('youtube_url', $video->youtube_url) }}" class="form-control @error('youtube_url') is-invalid @enderror">
                            @error('youtube_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(uz):</label>
                            <input type="text" name="name_uz" value="{{old('name_uz',$video->name_uz)}}" class="form-control @error('name_uz') is-invalid @enderror">
                            @error('name_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(ru):</label>
                            <input type="text" name="name_ru" value="{{old('name_ru',$video->name_ru)}}" class="form-control @error('name_ru') is-invalid @enderror">
                            @error('name_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(en):</label>
                            <input type="text" name="name_en" value="{{old('name_en',$video->name_en)}}" class="form-control @error('name_en') is-invalid @enderror">
                            @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(kr):</label>
                            <input type="text" name="name_kr" value="{{old('name_kr',$video->name_kr)}}" class="form-control @error('name_kr') is-invalid @enderror">
                            @error('name_kr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary d-inline-block mt-4">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
