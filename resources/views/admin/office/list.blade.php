@extends('admin.layouts.master')

@section('main')

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Offices</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.home') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Offices</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">List</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('admin.office.add') }}" class="btn btn-sm fw-bold btn-primary">Add</a>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body">

                    @include('admin.message')

                    <div class="card-px text-center pt-15 pb-15">

                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                    <tr style="white-space: nowrap;" class="fw-bold text-muted">
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Offices as $Office)
                                    <tr style="white-space: nowrap;">
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('images/offices/' . $Office->OfficeImage) }}" width="100"></td>
                                        <td>{{ $Office->OfficeName }}</td>
                                        <td>{{ $Office->OfficeEmail }}</td>
                                        <td>{{ $Office->OfficePhone }}</td>
                                        <td>{{ $Office->OfficeAddress }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="{{ route('admin.office.edit', $Office) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                    <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                </a>
                                                @if($Office->OfficeActive)
                                                <form action="{{ route('admin.office.active', $Office) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                                                        <i class="fa fa-solid fa-trash text-danger"></i>
                                                    </button>
                                                </form>
                                                @else
                                                <form action="{{ route('admin.office.active', $Office) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                                                        <i class="fa fa-solid fa-check text-success"></i>
                                                    </button>
                                                </form>
                                                @endif
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

@endsection