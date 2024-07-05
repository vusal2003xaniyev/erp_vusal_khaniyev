@extends('layouts.master')
@section('title',"Mühasibatlıq - Ödəniş əlavə etmə bölməsi")
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
                            Mühasibatlıq - <span class="fw-normal">Ödəniş əlavə etmə bölməsi</span>
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
                @include("widgets.message")
                <div class="row">
                    <div class="col-xl-6" style="margin: auto">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h5 class="mb-0">Ödənişin məlumatlarını aşağıdan doldura bilərsiniz</h5>
                            </div>
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <form id="id" onsubmit="btnBlock()" action="{{ route('accountingAddPost') }}"
                                              method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="title" class="col-form-label">Başlıq(*):</label>
                                                <input type="text" required="required" class="form-control" name="title"
                                                       id="title">
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="amount" class="col-form-label">Ödəniş(*):</label>
                                                    <input type="number" step="0.01" required="required"
                                                           class="form-control" name="amount" id="amount">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="type" class="col-form-label">Tip:</label>
                                                    <select name="type" id="type" class="form-control">
                                                        <option value="income">Mədaxil</option>
                                                        <option value="expense">Məxaric</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="payment_date" class="col-form-label">Ödəniş Tarixi(*):</label>
                                                <input type="date" max="{{ date("Y-m-d") }}" required="required"
                                                       class="form-control" name="payment_date" id="payment_date">
                                            </div>
                                            <div class="mb-3">
                                                <label for="note" class="col-form-label">Qeyd:</label>
                                                <textarea class="form-control" name="note" id="note"
                                                          rows="10"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <button id="btn_submit" class="btn btn-info float-end">Əlavə et</button>
                                            </div>
                                            <div class="mb-3" style="clear: both">
                                            </div>
                                        </form>
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