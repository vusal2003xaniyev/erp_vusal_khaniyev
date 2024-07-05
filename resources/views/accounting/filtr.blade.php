@extends('layouts.master')
@section('title',"Mühasibatlıq - Filtr")
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
                            Mühasibatlıq - <span class="fw-normal">Filtr</span>
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
                        <h5 class="mb-0">Ödənişlərin filtri</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <label for="type" class="form-label">Ödəniş tipi</label>
                                <select class="form-control" id="type">
                                    <option value="0">Mədaxil/Məxaric</option>
                                    <option value="1">Mədaxil</option>
                                    <option value="2">Məxaric</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="startdate" class="form-label">Başlanğıc Tarixi</label>
                                <input type="date" class="form-control" id="startdate" />
                            </div>
                            <div class="col-md-3">
                                <label for="enddate" class="form-label">Bitiş Tarixi</label>
                                <input type="date" class="form-control" max="{{ date('Y-m-d') }}" id="enddate" />
                            </div>
                            <div class="col-md-3">
                                <button onclick="search()" class="btn btn-info mt-4">Axtarış Et</button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /open in new window -->

                <div class="card mt-3" id="view" style="display: none;">
                    <div class="card-header"><h5 class="mb-0">Axtarış Nəticəsi</h5></div>
                    <div class="card-body">
                        <div id="loading" class="d-flex justify-content-center">
                            <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <table  id="view-table" style="width: 100% !important;" class="table table-responsive">
                            <thead></thead>
                            <tbody></tbody>
                        </table>
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
@endsection