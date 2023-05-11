@extends('office.layouts.master')

@section('main')

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Breaks Details Report</h1>
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
                    <li class="breadcrumb-item text-muted">Company</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Breaks</li>
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
                    <div class="card-px text-center row">
                        <form class="form row" action="{{ route('office.report.break.details') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="IDCompany" value="{{ $IDCompany }}">
                            <input type="hidden" name="IDRider" value="{{ $IDRider }}">
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-5">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>From</span>
                                </label>
                                <input type="date" class="form-control form-control-solid" name="DateFrom" value="{{ $DateFrom }}" />
                            </div>
                            <div class="d-flex flex-column mb-7 fv-row col-12 col-md-5">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>To</span>
                                </label>
                                <input type="date" class="form-control form-control-solid" name="DateTo" value="{{ $DateTo }}" />
                            </div>
                            <div class="d-flex flex-column justify-content-end mb-7 fv-row col-12 col-md-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    @include('office.message')

                    <div class="card-px text-center pb-15">

                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                    <tr style="white-space: nowrap;" class="fw-bold text-muted">
                                        <th>#</th>
                                        <th>Rider</th>
                                        <th>Company</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>AVG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Breaks as $Break)
                                    <tr style="white-space: nowrap;">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $Break->Rider->RiderName }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('images/companies/' . $Break->Company->CompanyImage) }}" width="50">
                                            {{ $Break->Company->CompanyNameEn }}
                                        </td>
                                        <td>{{ $Break->BreakDate }} {{ $Break->BreakTimeStart }}</td>
                                        <td>{{ $Break->BreakDate }} {{ $Break->BreakTimeEnd }}</td>
                                        <td>{{ App\Helper\OfficeHelper::GetHoursBySeconds($Break->BreakTotalSeconds) }}</td>
                                    </tr>
                                    @endforeach
                                    <tr style="white-space: nowrap;">
                                        <td>#</td>
                                        <td>Total</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>{{ $Breaks->count() }}</td>
                                        <td>{{ App\Helper\OfficeHelper::GetHoursBySeconds($Breaks->sum('BreakTotalSeconds')) }}</td>
                                    </tr>
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