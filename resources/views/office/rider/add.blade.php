@extends('office.layouts.master')

@section('main')

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Add Rider</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('office.home') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Rider</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Add</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">

                <div class="card-body">

                    @include('office.message')

                    <div class="card-px text-center pt-15 pb-15">

                        <form class="form row" action="{{ route('office.rider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- ID -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">ID</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="ID" name="RiderNationalID" value="{{ old('RiderNationalID') }}" />
                            </div>

                            <!-- Name -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Name</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="Name" name="RiderName" value="{{ old('RiderName') }}" />
                            </div>

                            <!-- Phone -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Phone</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="Phone" name="RiderPhone" value="{{ old('RiderPhone') }}" />
                            </div>

                            <!-- Password -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Password</span>
                                </label>
                                <input type="password" class="form-control form-control-solid" placeholder="Password" name="RiderPassword" value="{{ old('RiderPassword') }}" />
                            </div>

                            <!-- BirthDate -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">BirthDate</span>
                                </label>
                                <input type="date" class="form-control form-control-solid" placeholder="BirthDate" name="RiderBirthDate" value="{{ old('RiderBirthDate') }}" />
                            </div>

                            <div class="clear-fix"></div>

                            <!-- IsPicker -->
                            <div class="d-flex flex-row mb-7 col-12">
                                <input type="checkbox" name="IsPicker" value="1" />
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    Is Picker
                                </label>
                            </div>

                            <!-- IsRider -->
                            <div class="d-flex flex-row mb-7 col-12">
                                <input type="checkbox" name="IsRider" value="1" />
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    Is Rider
                                </label>
                            </div>

                            <!-- VehlcleType -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Vehlcle Type</span>
                                </label>
                                <select name="VehlcleType" class="form-control">
                                    <option value="BICYCLE">BICYCLE</option>
                                    <option value="MOTOCYCLE">MOTOCYCLE</option>
                                    <option value="CAR">CAR</option>
                                    <option value="WALKER">WALKER</option>
                                </select>
                            </div>

                            <!--  -->
                            <!-- Password -->
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Password</span>
                                </label>
                                <input type="file" class="form-control form-control-solid" name="RiderPassword" />
                            </div>

                            <!--  -->

                            <!-- Submit -->
                            <div class="text-center pt-15">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<!--  -->
@endsection