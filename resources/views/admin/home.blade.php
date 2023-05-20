@extends('admin.layouts.master')

@section('main')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--  -->
            <!--  -->
            <div class="row gy-5 g-xl-10">
                <div class="col-sm-6 col-xl-2 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor" />
                                        <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2" title="{{ $Riders->count() }}">
                                    {{ App\Helper\OfficeHelper::NumberSystem( $Riders->count() ) }}
                                </span>
                                <div class="m-0">
                                    <!-- <span class="fw-semibold fs-6 text-gray-400">Riders</span> -->
                                </div>
                            </div>
                            <span class="badge badge-light-success fs-base">
                                Riders
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-2 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z" fill="currentColor" />
                                        <path d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2" title="{{ $Shifts->count() }}">
                                    {{ App\Helper\OfficeHelper::NumberSystem( $Shifts->count() ) }}
                                </span>
                                <div class="m-0">
                                    <!-- <span class="fw-semibold fs-6 text-gray-400">Shifts</span> -->
                                </div>
                            </div>
                            <span class="badge badge-light-success fs-base">
                                Shifts
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-2 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="currentColor" />
                                        <path d="M8.70001 6C8.10001 5.7 7.39999 5.40001 6.79999 5.10001C7.79999 4.00001 8.90001 3 10.1 2.2C10.7 2.1 11.4 2 12 2C12.7 2 13.3 2.1 13.9 2.2C12 3.2 10.2 4.5 8.70001 6ZM12 8.39999C13.9 6.59999 16.2 5.30001 18.7 4.60001C18.1 4.00001 17.4 3.6 16.7 3.2C14.4 4.1 12.2 5.40001 10.5 7.10001C11 7.50001 11.5 7.89999 12 8.39999ZM7 20C7 20.2 7 20.4 7 20.6C6.2 20.1 5.49999 19.6 4.89999 19C4.59999 18 4.00001 17.2 3.20001 16.6C2.80001 15.8 2.49999 15 2.29999 14.1C4.99999 14.7 7 17.1 7 20ZM10.6 9.89999C8.70001 8.09999 6.39999 6.9 3.79999 6.3C3.39999 6.9 2.99999 7.5 2.79999 8.2C5.39999 8.6 7.7 9.80001 9.5 11.6C9.8 10.9 10.2 10.4 10.6 9.89999ZM2.20001 10.1C2.10001 10.7 2 11.4 2 12C2 12 2 12 2 12.1C4.3 12.4 6.40001 13.7 7.60001 15.6C7.80001 14.8 8.09999 14.1 8.39999 13.4C6.89999 11.6 4.70001 10.4 2.20001 10.1ZM11 20C11 14 15.4 9.00001 21.2 8.10001C20.9 7.40001 20.6 6.8 20.2 6.2C13.8 7.5 9 13.1 9 19.9C9 20.4 9.00001 21 9.10001 21.5C9.80001 21.7 10.5 21.8 11.2 21.9C11.1 21.3 11 20.7 11 20ZM19.1 19C19.4 18 20 17.2 20.8 16.6C21.2 15.8 21.5 15 21.7 14.1C19 14.7 16.9 17.1 16.9 20C16.9 20.2 16.9 20.4 16.9 20.6C17.8 20.2 18.5 19.6 19.1 19ZM15 20C15 15.9 18.1 12.6 22 12.1C22 12.1 22 12.1 22 12C22 11.3 21.9 10.7 21.8 10.1C16.8 10.7 13 14.9 13 20C13 20.7 13.1 21.3 13.2 21.9C13.9 21.8 14.5 21.7 15.2 21.5C15.1 21 15 20.5 15 20Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2" title="{{ $Orders->count() }}">
                                    {{ App\Helper\OfficeHelper::NumberSystem( $Orders->count() ) }}
                                </span>
                                <div class="m-0">
                                    <!-- <span class="fw-semibold fs-6 text-gray-400">Orders</span> -->
                                </div>
                            </div>
                            <span class="badge badge-light-success fs-base">
                                Orders
                            </span>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-xl-2 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.7 4.19995L4 6.30005V18.8999L8.7 16.8V19L3.1 21.5C2.6 21.7 2 21.4 2 20.8V6C2 5.4 2.3 4.89995 2.9 4.69995L8.7 2.09998V4.19995Z" fill="currentColor" />
                                        <path d="M15.3 19.8L20 17.6999V5.09992L15.3 7.19989V4.99994L20.9 2.49994C21.4 2.29994 22 2.59989 22 3.19989V17.9999C22 18.5999 21.7 19.1 21.1 19.3L15.3 21.8998V19.8Z" fill="currentColor" />
                                        <path opacity="0.3" d="M15.3 7.19995L20 5.09998V17.7L15.3 19.8V7.19995Z" fill="currentColor" />
                                        <path opacity="0.3" d="M8.70001 4.19995V2L15.4 5V7.19995L8.70001 4.19995ZM8.70001 16.8V19L15.4 22V19.8L8.70001 16.8Z" fill="currentColor" />
                                        <path opacity="0.3" d="M8.7 16.8L4 18.8999V6.30005L8.7 4.19995V16.8Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2" title="{{ $Orders->sum('OrderValue') }}">
                                    {{ App\Helper\OfficeHelper::NumberSystem( $Orders->sum('OrderValue') ) }}
                                </span>
                                <div class="m-0">
                                    <!-- <span class="fw-semibold fs-6 text-gray-400">C APEX</span> -->
                                </div>
                            </div>
                            <span class="badge badge-light-success fs-base">
                                Orders Value
                            </span>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M2.10001 10C3.00001 5.6 6.69998 2.3 11.2 2L8.79999 4.39999L11.1 7C9.60001 7.3 8.30001 8.19999 7.60001 9.59999L4.5 12.4L2.10001 10ZM19.3 11.5L16.4 14C15.7 15.5 14.4 16.6 12.7 16.9L15 19.5L12.6 21.9C17.1 21.6 20.8 18.2 21.7 13.9L19.3 11.5Z" fill="currentColor" />
                                        <path d="M13.8 2.09998C18.2 2.99998 21.5 6.69998 21.8 11.2L19.4 8.79997L16.8 11C16.5 9.39998 15.5 8.09998 14 7.39998L11.4 4.39998L13.8 2.09998ZM12.3 19.4L9.69998 16.4C8.29998 15.7 7.3 14.4 7 12.8L4.39999 15.1L2 12.7C2.3 17.2 5.7 20.9 10 21.8L12.3 19.4Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2" title="{{ $Bonus->count() }}">
                                    {{ App\Helper\OfficeHelper::NumberSystem( $Bonus->count() ) }}
                                </span>
                                <div class="m-0">
                                    <!-- <span class="fw-semibold fs-6 text-gray-400">OPEX</span> -->
                                </div>
                            </div>
                            <span class="badge badge-light-success fs-base">
                                Bonus
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <span class="svg-icon svg-icon-2hx svg-icon-gray-600">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M2.10001 10C3.00001 5.6 6.69998 2.3 11.2 2L8.79999 4.39999L11.1 7C9.60001 7.3 8.30001 8.19999 7.60001 9.59999L4.5 12.4L2.10001 10ZM19.3 11.5L16.4 14C15.7 15.5 14.4 16.6 12.7 16.9L15 19.5L12.6 21.9C17.1 21.6 20.8 18.2 21.7 13.9L19.3 11.5Z" fill="currentColor" />
                                        <path d="M13.8 2.09998C18.2 2.99998 21.5 6.69998 21.8 11.2L19.4 8.79997L16.8 11C16.5 9.39998 15.5 8.09998 14 7.39998L11.4 4.39998L13.8 2.09998ZM12.3 19.4L9.69998 16.4C8.29998 15.7 7.3 14.4 7 12.8L4.39999 15.1L2 12.7C2.3 17.2 5.7 20.9 10 21.8L12.3 19.4Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2" title="{{ $Bonus->sum('BonusValue') }}">
                                    {{ App\Helper\OfficeHelper::NumberSystem( $Bonus->sum('BonusValue') ) }}

                                </span>
                                <div class="m-0">
                                    <!-- <span class="fw-semibold fs-6 text-gray-400">OPEX</span> -->
                                </div>
                            </div>
                            <span class="badge badge-light-success fs-base">
                                Bonus Value
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->
            <!--  -->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                <div class="col-xl-3">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #F1416C;background-image:url('assets/media/svg/shapes/wave-bg-red.svg')">
                        <div class="card-header pt-5 mb-3">
                            <div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C">
                                <i class="fonticon-incoming-call text-white fs-2qx lh-0"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-end mb-3">
                            <div class="d-flex align-items-center">
                                <span class="fs-4hx text-white fw-bold me-6">1.2k</span>
                                <div class="fw-bold fs-6 text-white">
                                    <span class="d-block">Inbound</span>
                                    <span class="">Calls</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <div class="fw-bold text-white py-2">
                                <span class="fs-1 d-block">935</span>
                                <span class="opacity-50">Problems Solved</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #7239EA;background-image:url('assets/media/svg/shapes/wave-bg-purple.svg')">
                        <div class="card-header pt-5 mb-3">
                            <div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #7239EA">
                                <i class="fonticon-outgoing-call text-white fs-2qx lh-0"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-end mb-3">
                            <div class="d-flex align-items-center">
                                <span class="fs-4hx text-white fw-bold me-6">427</span>
                                <div class="fw-bold fs-6 text-white">
                                    <span class="d-block">Outbound</span>
                                    <span class="">Calls</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <div class="fw-bold text-white py-2">
                                <span class="fs-1 d-block">386</span>
                                <span class="opacity-50">Generated Leads</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-flush overflow-hidden h-lg-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Performance</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">1,046 Inbound Calls today</span>
                            </h3>
                        </div>
                        <div class="card-body d-flex align-items-end p-0">
                            <div id="kt_apexcharts_3" class="min-h-auto w-100 ps-4 pe-6" style="height: 300px"></div>
                        </div>
                    </div>
                </div>

            </div>

            <!--  -->
            <!--  -->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-xl-6">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Performance</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">1,046 Inbound Calls today</span>
                            </h3>
                            <div class="card-toolbar">
                                <span class="badge badge-light-danger fs-base mt-n3">
                                    <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                                            <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    7.4%
                                </span>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-end pt-6">
                            <div class="row align-items-center mx-0 w-100">
                                <div class="col-7 px-0">
                                    <div class="d-flex flex-column content-justify-center">
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet bg-success me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                                            <div class="fs-5 fw-bold text-gray-600 me-5">CRM Team Performance:</div>
                                            <div class="ms-auto fw-bolder text-gray-700 text-end">72.56%</div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center my-4">
                                            <div class="bullet bg-primary me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                                            <div class="fs-5 fw-bold text-gray-600 me-5">Recurring Calls:</div>
                                            <div class="ms-auto fw-bolder text-gray-700 text-end">29.34%</div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet me-3" style="border-radius: 3px;background-color: #E4E6EF;width: 12px;height: 12px"></div>
                                            <div class="fs-5 fw-bold text-gray-600 me-5">Tickets Raised:</div>
                                            <div class="ms-auto fw-bolder text-gray-700 text-end">17.83%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5 d-flex justify-content-end px-0">
                                    <div id="kt_card_widget_19_chart" class="min-h-auto h-150px w-150px" data-kt-size="150" data-kt-line="25"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Performance</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">1,046 Inbound Calls today</span>
                            </h3>
                            <div class="card-toolbar">
                                <span class="badge badge-light-danger fs-base mt-n3">
                                    <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                                            <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    7.4%
                                </span>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-end pt-6">
                            <div class="row align-items-center mx-0 w-100">
                                <div class="col-7 px-0">
                                    <div class="d-flex flex-column content-justify-center">
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet bg-success me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                                            <div class="fs-5 fw-bold text-gray-600 me-5">CRM Team Performance:</div>
                                            <div class="ms-auto fw-bolder text-gray-700 text-end">72.56%</div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center my-4">
                                            <div class="bullet bg-primary me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                                            <div class="fs-5 fw-bold text-gray-600 me-5">Recurring Calls:</div>
                                            <div class="ms-auto fw-bolder text-gray-700 text-end">29.34%</div>
                                        </div>
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet me-3" style="border-radius: 3px;background-color: #E4E6EF;width: 12px;height: 12px"></div>
                                            <div class="fs-5 fw-bold text-gray-600 me-5">Tickets Raised:</div>
                                            <div class="ms-auto fw-bolder text-gray-700 text-end">17.83%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5 d-flex justify-content-end px-0">
                                    <div id="kt_charts_widget_30_chart" class="min-h-auto h-150px w-150px" data-kt-size="150" data-kt-line="25"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->
            <!--  -->
            <div class="row gx-5 gx-xl-10">

                <div class="col-xl-6 mb-5 mb-xl-10">
                    <!--begin::Chart widget 15-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Author Sales</span>
                                <span class="text-gray-400 pt-2 fw-semibold fs-6">Statistics by Countries</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">PDF Report</a>
                                </div>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-100px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Remove</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Mute</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                                <!--end::Menu-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Chart container-->
                            <div id="kt_charts_widget_15_chart" class="min-h-auto ps-4 pe-6 mb-3 h-300px"></div>
                            <!--end::Chart container-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Chart widget 15-->
                </div>


                <div class="col-xl-6 mb-5 mb-xl-10">
                    <!--begin::Tables widget 11-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Top Queries by Clicks</span>
                                <span class="text-gray-400 pt-2 fw-semibold fs-6">Counted in Millions</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-light">PDF Report</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between flex-column py-3">
                            <!--begin::Block-->
                            <div class="m-0"></div>
                            <!--end::Block-->
                            <!--begin::Table container-->
                            <div class="table-responsive mb-n2">
                                <!--begin::Table-->
                                <table class="table table-row-dashed gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold border-0 text-gray-400">
                                            <th class="min-w-300px">KEYWORD</th>
                                            <th class="min-w-100px">CLICKS</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Buy phone online</a>
                                            </td>
                                            <td class="d-flex align-items-center border-0">
                                                <span class="fw-bold text-gray-800 fs-6 me-3">263</span>
                                                <div class="progress rounded-start-0">
                                                    <div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: 166px" aria-valuenow="166" aria-valuemin="0" aria-valuemax="166px"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Top 10 Earbuds</a>
                                            </td>
                                            <td class="d-flex align-items-center border-0">
                                                <span class="fw-bold text-gray-800 fs-6 me-3">238</span>
                                                <div class="progress rounded-start-0">
                                                    <div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: 158px" aria-valuenow="158" aria-valuemin="0" aria-valuemax="158px"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Cyber Monday</a>
                                            </td>
                                            <td class="d-flex align-items-center border-0">
                                                <span class="fw-bold text-gray-800 fs-6 me-3">189</span>
                                                <div class="progress rounded-start-0">
                                                    <div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: 129px" aria-valuenow="129" aria-valuemin="0" aria-valuemax="129px"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">OLED TV in Amsterdam</a>
                                            </td>
                                            <td class="d-flex align-items-center border-0">
                                                <span class="fw-bold text-gray-800 fs-6 me-3">263</span>
                                                <div class="progress rounded-start-0">
                                                    <div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: 112px" aria-valuenow="112" aria-valuemin="0" aria-valuemax="112px"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Macbook M1</a>
                                            </td>
                                            <td class="d-flex align-items-center border-0">
                                                <span class="fw-bold text-gray-800 fs-6 me-3">263</span>
                                                <div class="progress rounded-start-0">
                                                    <div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: 107px" aria-valuenow="107" aria-valuemin="0" aria-valuemax="107px"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">Best noise cancelation headsets</a>
                                            </td>
                                            <td class="d-flex align-items-center border-0">
                                                <span class="fw-bold text-gray-800 fs-6 me-3">263</span>
                                                <div class="progress rounded-start-0">
                                                    <div class="progress-bar bg-success m-0" role="progressbar" style="height: 12px;width: 74px" aria-valuenow="74" aria-valuemin="0" aria-valuemax="74px"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tables Widget 11-->
                </div>

            </div>

        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    var element = document.getElementById('kt_apexcharts_3');

    var options = {
        series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: 'Product Trends by Month',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
    };

    var chart = new ApexCharts(element, options);
    chart.render();
</script>
@endsection