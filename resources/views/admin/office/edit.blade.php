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
                    <li class="breadcrumb-item text-muted">Edit</li>
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

                        <form class="form row" action="{{ route('admin.office.update', $Office) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Name</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="Name" name="OfficeName" value="{{ old('OfficeName', $Office->OfficeName) }}" />
                            </div>

                            <!-- Email -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Email</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="Phone" name="OfficeEmail" value="{{ old('OfficeEmail', $Office->OfficeEmail) }}" />
                            </div>

                            <!-- Phone -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Phone</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="Phone" name="OfficePhone" value="{{ old('OfficePhone', $Office->OfficePhone) }}" />
                            </div>

                            <!-- Address -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Address</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="Phone" name="OfficeAddress" value="{{ old('OfficeAddress', $Office->OfficeAddress) }}" />
                            </div>

                            <!-- Password -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Password</span>
                                </label>
                                <input type="password" class="form-control form-control-solid" placeholder="Phone" name="OfficePassword" value="{{ old('OfficePassword') }}" />
                            </div>

                            <!-- Submit -->
                            <div class="text-center pt-15">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('admin.office.list') }}" class="btn btn-danger me-3">Cancel</a>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection