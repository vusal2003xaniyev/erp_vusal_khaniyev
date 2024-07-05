@extends('layouts.master')
@section('title', 'Kateqoriyalar Siyahısı')
@section('content')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Məhsullar - <span class="fw-normal">Kateqoriyalar Siyahısı</span>
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
                    <div class="card-header" style="display:flex;justify-content:space-between;">
                        <h5 class="mb-0">Kateqoriyaların Siyahısı</h5>
                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                            data-bs-target="#addCategory">Əlavə Et</button>
                    </div>

                    <table class="table datatable-pdf-open">
                        <thead>
                            <tr>
                                <th>Kateqoriya Adı</th>
                                <th>Status</th>
                                <th>Əməliyyatlar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td>{!! App\Http\Controllers\products\productsController::getStatusCheck($category->status) !!}
                                    </td>
                                    <td>
                                        <button onclick="editCategory({{$category->id}})" class="btn btn-sm btn-outline-success">Redaktə et</button>
                                        <button onclick="deleteCategory({{$category->id}})" class="btn btn-sm btn-outline-danger">Sil</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>












    </div>

    <!-- Category add -->
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Kateqoriya</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('categories_add')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Başlıq:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                            <button class="btn btn-primary">Əlavə Et</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Category add -->
    <!-- Category edit -->
    <div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Kateqoriya</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('categoriesEditPost')}}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" id="edit_id" name="id">

                        <div class="mb-3">
                            
                            <label for="edit_title" class="col-form-label">Başlıq:</label>
                            <input type="text" class="form-control" id="edit_title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="edit_status" class="col-form-label">Status:</label>
                            <select name="status" id="edit_status" class="form-control"></select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                            <button class="btn btn-primary">Redaktə Et</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Category edit -->
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/tables/datatables/extensions/buttons.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/demo/pages/datatables_extension_buttons_pdf.js') }}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let _token = $('meta[name="csrf-token"]').attr("content");
        function editCategory(id) {
            const myModal = new bootstrap.Modal(document.getElementById("editCategory"), {});
            $.ajax({
                type: "POST",
                url: "/products/category-edit/view",
                data: {
                    _token,
                    id,
                },
                success: async function(res) {
                    if (res.status) {
                        document.getElementById("edit_title").value =
                            res.data.title;
                            document.getElementById("edit_id").value =
                            res.data.id;
                            document.getElementById("edit_status").innerHTML =`
                            <option value="1" ${res.data.status=='1'  ? 'selected="selected"' : ''}>Aktiv</option>
                            <option value="0" ${res.data.status=='0'  ? 'selected="selected"' : ''}>Passiv</option>


                            `
                    }
                    myModal.show();
                },
                error: function() {
                    alert("Error... 5011");
                },
                beforeSend: function() {
                    $("#loader").removeClass("display-none");
                },
                complete: function() {
                    $("#loader").addClass("display-none");
                },
            });
        }

        function deleteCategory(id) {
            Swal.fire({
                title: "Kateqoriyanı silməyə əminsinizmi?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Sil",
                denyButtonText: `İmtina et`,
                confirmButtonColor: "#B00D03",
                denyButtonColor: "#2914BD",
                cancelButtonText: "Ləğv et",
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `/products/category-delete/${id}`;
                } else if (result.isDenied) {
                    Swal.fire("İmtina edildi", "", "info");
                }
            });
        }
    </script>
@endsection
