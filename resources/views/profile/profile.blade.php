@extends('layouts.master')
@section('title', 'Mənim profilim')
@section('content')

    <!-- /page header -->


    <!-- Cover area -->
    <div class="profile-cover">
        <div class="profile-cover-img"
            style="background-image: url('https://www.cxtoday.com/wp-content/uploads/2022/05/crm-reasons.jpg');"></div>
        <div
            class="d-flex align-items-center text-center text-lg-start flex-column flex-lg-row position-absolute start-0 end-0 bottom-0 mx-3 mb-3">
            <div class="me-lg-3 mb-2 mb-lg-0">
                <a href="#">
                    <img src="{{ asset($user->image) }}" class="img-thumbnail rounded-circle shadow" width="100"
                        height="100">
                </a>
            </div>

            <div class="profile-cover-text text-white">
                <h1 class="mb-0">{{ ucfirst($user->name) }}</h1>
                <span class="d-block">{{ ucfirst($user->qualification ?? '---') }}</span>
            </div>
        </div>
    </div>
    <!-- /cover area -->


    <!-- Profile navigation -->
    <div class="navbar navbar-expand-lg border-bottom py-2">
        <div class="container-fluid">
            <ul class="nav navbar-nav flex-row flex-fill">
                <li class="nav-item me-1">
                    <a href="#settings" class="navbar-nav-link navbar-nav-link-icon active rounded" data-bs-toggle="tab">
                        <div class="d-flex align-items-center mx-lg-1">
                            <i class="ph-gear"></i>
                            <span class="d-none d-lg-inline-block ms-2">İstifadəçi Məlumatları</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item me-1">
                    <a href="#activity" class="navbar-nav-link navbar-nav-link-icon  rounded" data-bs-toggle="tab">
                        <div class="d-flex align-items-center mx-lg-1">
                            <i class="ph-activity"></i>
                            <span class="d-none d-lg-inline-block ms-2">Hesab Məlumatları</span>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!-- /profile navigation -->


    <!-- Content area -->
    <div class="content">

        <!-- Inner container -->
        <div class="d-flex align-items-stretch align-items-lg-start flex-column flex-lg-row">

            <!-- Left content -->
            <div class="tab-content flex-fill order-2 order-lg-1">

                <div class="tab-pane fade active show" id="settings">

                    <!-- Profile info -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">İstifadəçi Məlumatları</h5>
                        </div>
                        @include('widgets.message')
                        <div class="card-body">
                            <form action="{{ route('profil_information_post') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="fullname" class="form-label">Ad Soyad</label>
                                            <input type="text" value="{{ $user->name }}" required="required"
                                                name="fullname" id="fullname" placeholder="Ad Soyad" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Əlaqə Nömrəsi</label>
                                            <input type="tel" value="{{ $user->phone }}" required="required"
                                                id="phone" name="phone" placeholder="Əlaqə Nömrəsi"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Ünvan</label>
                                            <input type="text" value="{{ $user->address }}" required="required"
                                                id="address" name="address" placeholder="Ünvan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="birthday" class="form-label">Doğum Tarixi</label>
                                            <input type="date" value="{{ $user->birthday }}" required="required"
                                                id="birthday" name="birthday" placeholder="Doğum Tarixi"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="qualification" class="form-label">İxtisas</label>
                                            <input type="text" value="{{ $user->qualification }}" required="required"
                                                id="qualification" name="qualification" placeholder="İxtisasınız"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <input value="{{ $user->image }}" name="old_image" type="hidden"
                                                class="form-control">
                                            <label id="image" class="form-label">Profil Şəkli</label>
                                            <input id="image" name="image" type="file" class="form-control">
                                            <div class="form-text text-muted">Şəkil Formatı: jpeg, png, jpg.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button class="btn btn-primary">Yadda Saxla</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /profile info -->




                </div>
                <div class="tab-pane fade " id="activity">

                    <!-- Account settings -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Həsab Məlumatları</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('profil_password_post') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="current_password" class="form-label">Cari Şifrə</label>
                                            <input type="password" name="current_password" id="current_password"
                                                placeholder="Cari Şifrə" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="new_password" class="form-label">Yeni Şifrə</label>
                                            <input type="password" name="new_password" id="new_password"
                                                placeholder="Yeni Şifrə" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="repeat_new_password" class="form-label">Yeni Şifrənin
                                                tekrarı</label>
                                            <input type="password" id="repeat_new_password" name="repeat_new_password"
                                                placeholder="Yeni Şifrənin tekrarı" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary">Yadda Saxla</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /account settings -->

                </div>


            </div>
            <!-- /left content -->


            <!-- Right sidebar component -->
            <div
                class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none order-1 order-lg-2 ms-lg-3 mb-3">

                <!-- Sidebar content -->
                <div class="sidebar-content">

                    <!-- Navigation -->
                    <div class="card">
                        <div class="sidebar-section-header border-bottom">
                            <span class="fw-semibold">Naviqasiya</span>
                        </div>

                        <ul class="nav nav-sidebar">
                            <li class="nav-item">
                                <a href="{{ route('profil_page_view') }}" class="nav-link">
                                    <i class="ph-user me-2"></i>
                                    Mənim Profilim
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link">
                                    <i class="ph-sign-out me-2"></i>
                                    Çıxış
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /navigation -->
                </div>
                <!-- /sidebar content -->

            </div>
            <!-- /right sidebar component -->

        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area -->

@endsection
@section('js')
    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/vendor/visualization/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/ui/fullcalendar/main.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/demo/pages/user_pages_profile.js') }}"></script>
    <script src="{{ asset('assets/demo/charts/echarts/bars/tornado_negative_stack.js') }}"></script>
    <script src="{{ asset('assets/demo/charts/pages/profile/balance_stats.js') }}"></script>
    <script src="{{ asset('assets/demo/charts/pages/profile/available_hours.js') }}"></script>
@endsection
