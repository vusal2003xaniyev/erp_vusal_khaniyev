<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- Mirrored from demo.interface.club/limitless/demo/template/html/layout_1/full/login_advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Dec 2022 15:45:12 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daxil olma - Khaniyev Vusal</title>



    <!-- Global stylesheets -->
    <link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="180x180" href="https://166tech.az/apple-touch-icon.png">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body>


    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Content area -->
                <div class="content d-flex justify-content-center align-items-center">
                    <!-- Login form -->
                    <form class="login-form" action="{{ route('login_page_post') }}" method="POST">

                        @csrf
                        <div class="card mb-0">

                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                        <img src="https://166tech.az/uploads/settings/58013935.webp" alt="logo" width="200px">
                                    </div>
                                    <h5 class="mb-0">Daxil olma</h5>
                                    <span class="d-block text-muted">Məlumatlarınızı daxil edin</span>
                                </div>
                                @include('widgets.message')

                                <div class="mb-3">
                                    <label for="email" class="form-label">E-Poçt</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="john@doe.com">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Şifrə</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="•••••••••••">
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary w-100">Daxil ol</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /login form -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

<!-- Mirrored from demo.interface.club/limitless/demo/template/html/layout_1/full/login_advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Dec 2022 15:45:12 GMT -->

</html>
