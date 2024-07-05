@extends('layouts.master')
@section('title',"Mühasibatlıq - Bütün ödənişlər")
@section("content")
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Page header -->
            <div class="page-header page-header-light shadow">
                <div class="page-header-content d-lg-flex">
                    <div class="d-flex">
                        <h4 class="page-title mb-0">
                            Mühasibatlıq - <span class="fw-normal">Bütün ödənişlər</span>
                        </h4>
                    </div>
                </div>
            </div>
            <!-- /page header -->
        @include("widgets.message")
            <!-- Content area -->
            <div class="content">
                <!-- Open in new window -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Ödənişlərin siyahısı</h5>
                    </div>
                    <table class="table datatable-pdf-open">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Başlıq</th>
                            <th>Tipi</th>
                            <th>Məbləq</th>
                            <th>Tarix</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $pay)
                            <tr>
                                <td>{{ $pay->id }}</td>
                                <td>{{ $pay->title }}</td>
                                <td>{!!   \App\Http\Controllers\helperController::paymentType($pay->type) !!}</td>
                                <td>{{ $pay->amount }} AZN</td>
                                <td>{{ $pay->payment_date }}</td>
                                <td>
                                    <a href="{{ route('accountingViewPayment',$pay->id) }}"><button class="btn btn-info btn-sm">Ətraflı</button></a>
                                    <a href="{{ route('accountingViewPayment',[$pay->id,"edit"]) }}"><button class="btn btn-warning btn-sm">Redaktə Et</button></a>
                                    <button onclick="deletePayment('{{ $pay->id }}')" class="btn btn-danger btn-sm">Sil</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /open in new window -->
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
@endsection