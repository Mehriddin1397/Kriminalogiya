@extends('layouts.admin')

@section('title', 'Contact')

@section('content')

    <div class="nxl-content d-flex flex-column h-100">
        <!-- [ page-header ] start -->
        <div class="page-header position-fixed">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Contact</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item">Contact</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <a href="javascript:void(0);" class="btn btn-primary " data-bs-toggle="offcanvas"
                           data-bs-target="#tasksDetailsOffcanvas">
                            <i class="feather-plus me-2"></i>
                            <span>Yaratish</span>
                        </a>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover" id="proposalList">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Ish vaqti</th>
                                        <th class="text-end">Tahrirlash</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($academia as $index => $academy)
                                        <tr class="single-item">
                                            <th>{{$index +1 }}</th>
                                            <td>
                                                {{$academy->address_uz}}
                                            </td>
                                            <td>
                                                {{ $academy->phone }}
                                            </td>
                                            <td>
                                                {{ $academy->worktime }}
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="javascript:void(0)" data-bs-toggle="offcanvas"
                                                       data-bs-target="#tasksDetailsOffcanvasEdit{{ $academy->id }}"
                                                       class="avatar-text avatar-md">
                                                        <i class="feather feather-edit-3"></i>
                                                    </a>
                                                    <form action="{{ route('contact.destroy', $academy->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="avatar-text avatar-md"
                                                                onclick="return confirm('Rostan uchirasizmi?')">
                                                            <i class="feather feather-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('components.admin.contact.contact-modal-create')
    @include('components.admin.contact.contact-modal-edit', ['academia' => $academia])

@endsection
