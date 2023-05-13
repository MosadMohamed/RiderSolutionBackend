@extends('admin.layouts.master')

@section('main')

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Info</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.home') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Info</li>
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
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                    <tr style="white-space: nowrap;" class="fw-bold text-muted">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Arabic Name</th>
                                        <th>Operation</th>
                                        <th>UTC</th>
                                        <th>Edit</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Countries as $Country)
                                    <tr style="white-space: nowrap;">
                                        <td>{{ $loop->iteration }}</td>
                                        <form action="{{ route('admin.country.update', $Country) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <td>
                                                <input type="text" class="form-control" placeholder="Name" name="CountryNameEn" value="{{ old('CountryNameEn', $Country->CountryNameEn) }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Arabic Name" name="CountryNameAr" value="{{ old('CountryNameAr', $Country->CountryNameAr) }}">
                                            </td>
                                            <td>
                                                <select name="CountryOperation" class="form-control">
                                                    @if($Country->CountryOperation == '+')
                                                    <option value="+" selected>+</option>
                                                    <option value="-">-</option>
                                                    @else
                                                    <option value="+">+</option>
                                                    <option value="-" selected>-</option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td>
                                                <input type="time" class="form-control" placeholder="UTC" name="CountryUTC" value="{{ old('CountryUTC', Carbon\Carbon::create($Country->CountryUTC)->format('H:i')) }}">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-success btn-sm">
                                                    <i class="fa fa-solid fa-pen-to-square text-primary"></i>
                                                </button>
                                            </td>
                                        </form>
                                        <td>
                                            <form action="{{ route('admin.country.active', $Country) }}" method="post">
                                                @csrf
                                                @if($Country->CountryActive)
                                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                                                    <i class="fa fa-solid fa-trash text-danger"></i>
                                                </button>
                                                @else
                                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-success btn-sm">
                                                    <i class="fa fa-solid fa-check text-success"></i>
                                                </button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <form action="{{ route('admin.country.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <tr class="bg-secondary">
                                            <td>+</td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Name" name="CountryNameEn">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Arabic Name" name="CountryNameAr">
                                            </td>
                                            <td>
                                                <select name="CountryOperation" class="form-control">
                                                    <option value="+">+</option>
                                                    <option value="-">-</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="time" class="form-control" placeholder="UTC" name="CountryUTC">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-success btn-sm">
                                                    <i class="fa fa-solid fa-plus text-success"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </form>
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