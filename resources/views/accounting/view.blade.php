@extends('layouts.master')
@section('title', 'Mühasibatlıq - Ödəniş ətraflı bölməsi')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Page header -->
            <div class="page-header page-header-light shadow">
                <div class="page-header-content d-lg-flex">
                    <div class="d-flex">
                        <h4 class="page-title mb-0">
                            Mühasibatlıq - <span class="fw-normal">Ödəniş ətraflı bölməsi</span>
                        </h4>

                        <a href="#page_header"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">
                @include('widgets.message')
                <div class="row">
                    <div class="col-xl-6" style="margin: auto">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <table class="table table-responsive">
                                            <tr>
                                                <th>Əməliyyat</th>
                                                <td>
                                                    <a href="{{ route('accountingViewPayment', [$data->id, 'edit']) }}"><button
                                                            class="btn btn-warning btn-sm">Redaktə Et</button></a>
                                                    <button onclick="deletePayment('{{ $data->id }}')"
                                                        class="btn btn-danger btn-sm">Sil</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Başlıq</th>
                                                <td>{{ $data->title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Məbləğ</th>
                                                <td>{{ $data->amount }} AZN</td>
                                            </tr>
                                            <tr>
                                                <th>Tip</th>
                                                <td>{!! \App\Http\Controllers\helperController::paymentType($data->type) !!}</td>
                                            </tr>
                                            <tr>
                                                <th>Ödəniş Tarixi</th>
                                                <td>{{ $data->payment_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>Ödəniş Əlavə Edilmə Tarixi</th>
                                                <td>{{ $data->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <th>Qeyd</th>
                                                <td>{{ $data->note }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /content area -->



        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/tables/datatables/extensions/buttons.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/demo/pages/datatables_extension_buttons_pdf.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/js/project/accounting.js') }}"></script>
    <script>
        function btnBlock() {
            document.getElementById("btn_submit").disabled = true;
        }
    </script>
@endsection
