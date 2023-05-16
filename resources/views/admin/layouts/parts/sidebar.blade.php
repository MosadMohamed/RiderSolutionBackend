<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="{{route('welcome')}}">
            <img alt="Logo" src="{{asset('dashboard/media/logos/logo.png')}}" class="h-60px w-200px app-sidebar-logo-default" />
            <img alt="Logo" src="{{asset('dashboard/media/logos/icon.png')}}" class="h-40px w-40px app-sidebar-logo-minimize" />
        </a>
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>

    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div class="menu-item">
                    <a class="menu-link {{ request()->segment(2) == 'home' ? 'active' : '' }}" href="{{ route('admin.home') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <!-- Rider -->
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Rider</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'rider' && request()->segment(3) == 'list') ? 'active' : '' }}" href="{{ route('admin.rider.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Riders</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'rider' && request()->segment(3) == 'new') ? 'active' : '' }}" href="{{ route('admin.rider.new') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">New Riders</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->segment(2) == 'client' ? 'active' : '' }}" href="">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-tie"></i>
                        </span>
                        <span class="menu-title"><del>Requests</del></span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->segment(2) == 'sales' ? 'active' : '' }}" href="">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-pen"></i>
                        </span>
                        <span class="menu-title"><del>Hirings</del></span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->segment(2) == 'sales' ? 'active' : '' }}" href="">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-pen"></i>
                        </span>
                        <span class="menu-title"><del>Tasks</del></span>
                    </a>
                </div>
                <!--  -->

                <!-- Company -->
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Company</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->segment(2) == 'NoData' ? 'active' : '' }}" href="">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title"><del>Companies</del></span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->segment(2) == 'NoData' ? 'active' : '' }}" href="">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title"><del>Hirings</del></span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->segment(2) == 'NoData' ? 'active' : '' }}" href="">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title"><del>Tasks</del></span>
                    </a>
                </div>
                <!--  -->

                <!-- Office -->
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Office</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->segment(2) == 'office' ? 'active' : '' }}" href="{{ route('admin.office.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title">Offices</span>
                    </a>
                </div>
                <!--  -->

                <!-- Support -->
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Support</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'complaint' && request()->segment(3) == 'rider') ? 'active' : '' }}" href="{{ route('admin.complaint.rider.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title">Rider Complaints</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'complaint' && request()->segment(3) == 'office') ? 'active' : '' }}" href="{{ route('admin.complaint.office.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title">Office Complaints</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'complaint' && request()->segment(3) == 'company') ? 'active' : '' }}" href="{{ route('admin.complaint.company.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title">Company Complaints</span>
                    </a>
                </div>
                <!--  -->

                <!-- Config -->
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Configuration</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->segment(2) == 'country' ? 'active' : '' }}" href="{{ route('admin.country.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title">Countries</span>
                    </a>
                </div>
                <!--  -->

                <!-- Reports -->
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Reports</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'report' && request()->segment(3) == 'shift') ? 'active' : '' }}" href="{{ route('admin.report.shift.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Shifts</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'report' && request()->segment(3) == 'order') ? 'active' : '' }}" href="{{ route('admin.report.order.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Orders</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'report' && request()->segment(3) == 'accident') ? 'active' : '' }}" href="{{ route('admin.report.accident.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Accidents</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'report' && request()->segment(3) == 'annual') ? 'active' : '' }}" href="{{ route('admin.report.annual.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Annuals</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'report' && request()->segment(3) == 'accept') ? 'active' : '' }}" href="{{ route('admin.report.accept.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Accepts</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'report' && request()->segment(3) == 'absence') ? 'active' : '' }}" href="{{ route('admin.report.absence.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Absences</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'report' && request()->segment(3) == 'late') ? 'active' : '' }}" href="{{ route('admin.report.late.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Lates</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'report' && request()->segment(3) == 'bonus') ? 'active' : '' }}" href="{{ route('admin.report.bonus.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Bonuss</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'report' && request()->segment(3) == 'break') ? 'active' : '' }}" href="{{ route('admin.report.break.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Breaks</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'report' && request()->segment(3) == 'feedback') ? 'active' : '' }}" href="{{ route('admin.report.feedback.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                        <span class="menu-title">Feedbacks</span>
                    </a>
                </div>
                <!--  -->

                <!-- Action Logs -->
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Action Logs</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'log' && request()->segment(3) == 'rider') ? 'active' : '' }}" href="{{ route('admin.log.rider.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title">Rider Log</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'log' && request()->segment(3) == 'office') ? 'active' : '' }}" href="{{ route('admin.log.office.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title">Office Log</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'log' && request()->segment(3) == 'company') ? 'active' : '' }}" href="{{ route('admin.log.company.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title">Company Log</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ (request()->segment(2) == 'log' && request()->segment(3) == 'integration') ? 'active' : '' }}" href="{{ route('admin.log.integration.list') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-title">Integration Log</span>
                    </a>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
</div>