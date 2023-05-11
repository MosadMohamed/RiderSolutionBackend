@extends('office.layouts.master')

@section('main')

<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Info</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('office.home') }}" class="text-muted text-hover-primary">Home</a>
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

                    @include('office.message')

                    <div class="card-px text-center pt-15 pb-15">

                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                    <tr style="white-space: nowrap;" class="fw-bold text-muted">
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($OfficeMembers as $OfficeMember)
                                    <tr style="white-space: nowrap;">
                                        <td>{{ $loop->iteration }}</td>
                                        <form action="{{ route('office.info.edit', $OfficeMember) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <td>
                                                <select name="OfficeMemberType" class="form-control">
                                                    @if($OfficeMember->OfficeMemberType == 'OWNER')
                                                    <option value="OWNER" selected>Owner</option>
                                                    <option value="ACCOUNTING">Accounting</option>
                                                    <option value="OPERATION">Operation</option>

                                                    @elseif($OfficeMember->OfficeMemberType == 'ACCOUNTING')
                                                    <option value="OWNER">Owner</option>
                                                    <option value="ACCOUNTING" selected>Accounting</option>
                                                    <option value="OPERATION">Operation</option>

                                                    @else
                                                    <option value="OWNER">Owner</option>
                                                    <option value="ACCOUNTING">Accounting</option>
                                                    <option value="OPERATION" selected>Operation</option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Name" name="OfficeMemberName" value="{{ $OfficeMember->OfficeMemberName }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Phone" name="OfficeMemberPhone" value="{{ $OfficeMember->OfficeMemberPhone }}">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                            </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                    <form action="{{ route('office.info.add') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <tr class="bg-secondary">
                                            <td>+</td>
                                            <td>
                                                <select name="OfficeMemberType" class="form-control">
                                                    <option value="OWNER">Owner</option>
                                                    <option value="ACCOUNTING">Accounting</option>
                                                    <option value="OPERATION">Operation</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Name" name="OfficeMemberName">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Phone" name="OfficeMemberPhone">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-success btn-sm">Add</button>
                                            </td>
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