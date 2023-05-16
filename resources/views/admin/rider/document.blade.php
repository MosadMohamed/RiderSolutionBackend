@extends('admin.layouts.master')

@section('main')

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Rider Documents</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.home') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Riders</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">List</li>
                </ul>
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
                            <table class="table table-row-dashed border table-row-gray-300 align-middle gs-0 gy-4">
                                <tr style="white-space: nowrap;" class="fw-bold">
                                    <th>ID</th>
                                    <td class="border">{{ $Rider->RiderNationalID }}</td>
                                    <th>Name</th>
                                    <td class="border">{{ $Rider->RiderName }}</td>
                                </tr>
                                <tr style="white-space: nowrap;" class="fw-bold">
                                    <th>Phone</th>
                                    <td class="border">{{ $Rider->RiderPhone }}</td>
                                    <th>Office</th>
                                    <td class="border">{{ $Rider->Office->OfficeName }}</td>
                                </tr>
                                <tr style="white-space: nowrap;" class="fw-bold">
                                    <th>Email</th>
                                    <td class="border">{{ $Rider->RiderEmail }}</td>
                                    <th>BirthDate</th>
                                    <td class="border">{{ $Rider->RiderBirthDate }}</td>
                                </tr>
                                <tr style="white-space: nowrap;" class="fw-bold">
                                    <th>Gender</th>
                                    <td class="border">{{ $Rider->RiderGender }}</td>
                                    <th>BirthDate</th>
                                    <td class="border">{{ $Rider->RiderBirthDate }}</td>
                                </tr>
                                <tr style="white-space: nowrap;" class="fw-bold">
                                    <th>IsRider</th>
                                    <td class="border">{{ $Rider->IsRider }}</td>
                                    <!-- <td>IsRider</td> -->
                                    <th>VehlcleType</th>
                                    <td class="border">{{ ($Rider->VehlcleType) ? $Rider->VehlcleType : '-' }}</td>
                                </tr>
                                <tr style="white-space: nowrap;" class="fw-bold">
                                    <th>IsPicker</th>
                                    <td class="border">{{ $Rider->IsPicker }}</td>
                                    <th></th>
                                    <td class="border"></td>
                                </tr>
                            </table>
                        </div>

                        <div class="row g-5">
                            @foreach($Documents as $Document)
                            <div class="mb-5 col-12 col-md-4 p-1">
                                <div class="card bg-light card-bordered shadow-sm">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $Document->DocumentType }}</h3>
                                        <div class="card-toolbar">
                                            <!--  -->
                                        </div>
                                    </div>
                                    <div class="card-body card-scroll h-200px">
                                        <img src="{{ asset('images/documents/' . $Document->DocumentImage) }}" class="w-100 h-100">
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-sm btn-primary">
                                            Show
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="row g-5 d-flex">
                            <div class="col-12 col-md-6">
                                <form action="{{ route('admin.rider.upload', $Rider) }}" method="post">
                                    @csrf
                                    @if($Rider->IsUploaded)
                                    <button type="submit" class="btn btn-bg-light btn-active-color-danger btn-sm">
                                        <!-- <i class="fa fa-solid fa-close text-danger"></i> -->
                                        New Upload
                                    </button>
                                    @endif
                                </form>
                            </div>

                            <div class="col-12 col-md-6">
                                <form action="{{ route('admin.rider.active', $Rider) }}" method="post">
                                    @csrf
                                    @if($Rider->RiderActive)
                                    <button type="submit" class="btn btn-danger btn-active-color-danger btn-sm">
                                        <!-- <i class="fa fa-solid fa-trash text-danger"></i> -->
                                        InActive
                                    </button>
                                    @else
                                    <button type="submit" class="btn btn-success btn-active-color-success btn-sm">
                                        <!-- <i class="fa fa-solid fa-check text-success"></i> -->
                                        Active
                                    </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>

@endsection