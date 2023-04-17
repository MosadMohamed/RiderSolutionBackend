<!DOCTYPE html>

<html lang="en" dir="ltr" style="direction: ltr">

<head>
    <title>{{Config('app.name')}} - Admin</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{asset('dashboard/media/logos/icon.png')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <style>
        body {
            font-weight: bold !important;
            /* font-family: Verdana !important; */
            /* font-family: cursive !important; */
        }
    </style>
    @yield('css')
</head>

<body data-kt-name="metronic" id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <script>
        if (document.documentElement) {
            const defaultThemeMode = "system";
            const name = document.body.getAttribute("data-kt-name");
            let themeMode = localStorage.getItem("kt_" + (name !== null ? name + "_" : "") + "theme_mode_value");
            if (themeMode === null) {
                if (defaultThemeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @include('admin.layouts.parts.header')
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('admin.layouts.parts.sidebar')
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    @yield('main')
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('dashboard/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('dashboard/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{asset('dashboard/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('dashboard/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('dashboard/js/custom/widgets.js')}}"></script>
    <script src="{{asset('dashboard/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('dashboard/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('dashboard/js/custom/utilities/modals/create-app.js')}}"></script>
    <script src="{{asset('dashboard/js/custom/utilities/modals/new-target.js')}}"></script>
    <script src="{{asset('dashboard/js/custom/utilities/modals/new-card.js')}}"></script>
    <script src="{{asset('dashboard/js/custom/utilities/modals/users-search.js')}}"></script>

    @yield('js')
</body>

</html>