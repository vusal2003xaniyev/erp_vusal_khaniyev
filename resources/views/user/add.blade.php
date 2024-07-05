@extends('layouts.master')
@section('title', 'Əlavə etmə')
@section('content')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    İstifadəçilər - <span class="fw-normal">Əlavə etmə</span>
                </h4>
            </div>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="mb-0">İstifadəçi məlumatlarını aşağıdan redaktə edə bilərsiniz</h5>
                    </div>
                    @include('widgets.message')
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-6 m-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('user_add_post') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Ad Soyad <span
                                                        style="color: red;">*</span></label>
                                                <input type="tel" id="fullname" name="fullname" class="form-control"
                                                    placeholder="Ad Soyad daxil edin">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">E-Poçt <span
                                                        style="color: red;">*</span></label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="E-Poçt daxil edin">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">İcazələr <span
                                                        style="color: red;">*</span></label>

                                                <div class="row">
                                                    <table>
                                                        <thead>
                                                            <th></th>
                                                            <th>Əlavə</th>
                                                            <th>Redakte</th>
                                                            <th>Baxmaq</th>
                                                            <th>Silmək</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>İsdifadəçilər</td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[a]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[b]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[c]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[d]">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Nizamlamalar</td>

                                                                <td>
                                                                    <input type="checkbox" name="permission[a]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[b]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[c]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[d]">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Hesabat</td>

                                                                <td>
                                                                    <input type="checkbox" name="permission[a]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[b]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[c]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[d]">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mehsul</td>

                                                                <td>
                                                                    <input type="checkbox" name="permission[a]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[b]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[c]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="permission[d]">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary ms-3 float-end">Yadda saxla</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /traffic sources -->

            </div>
        </div>












    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/app.js') }}"></script>
@endsection
