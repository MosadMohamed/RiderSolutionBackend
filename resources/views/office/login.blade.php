<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <title>{{Config('app.name')}}</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{asset('dashboard/media/logos/icon.png')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{asset('dashboard/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
</head>

<body data-kt-name="metronic" id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
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

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('<?php echo asset('dashboard/media/auth/bg10.jpeg') ?>');
            }

            [data-theme="dark"] body {
                background-image: url('<?php echo asset('dashboard/media/auth/bg10-dark.jpeg') ?>');
            }
        </style>

        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('dashboard/media/auth/agency.png')}}" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{asset('dashboard/media/auth/agency-dark.png')}}" alt="" />
                </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                    <div class="w-md-400px">

                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{route('office.login.submit')}}">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-dark fw-bolder mb-3">Office Login</h1>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Email" name="OfficeEmail" autocomplete="off" class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Password" name="OfficePassword" autocomplete="off" class="form-control bg-transparent" />
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>

                        @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-dismissible bg-danger w-100 p-2 mb-5">
                            <div class="text-center text-light">
                                <span class="text-light fw-bold" style="font-size: 17px;">{{$error}}</span>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        @if(session()->has('message'))
                        <div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row w-100 p-5 mb-10">
                            <div class="d-flex flex-column justify-content-center text-light pe-0 pe-sm-10">
                                <h4 class="mb-2 text-light">{{session()->get('message')}}</h4>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('dashboard/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('dashboard/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('dashboard/js/custom/authentication/sign-in/general.js')}}"></script>

</body>

</html>