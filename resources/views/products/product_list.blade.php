@extends('layouts.master')
@section('title', 'Məhsullar Siyahısı')
@section('content')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Məhsullar - <span class="fw-normal">Məhsullar Siyahısı</span>
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
                        <h5 class="mb-0">Məhsulların Siyahısı</h5>
                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                            data-bs-target="#addProduct">Əlavə Et</button>
                    </div>

                    <table class="table datatable-pdf-open">
                        <thead>
                            <tr>
                                <th>Məhsul Adı</th>
                                <th>Tədarükçü</th>
                                <th>Kateqoriya</th>
                                <th>Qiymət</th>
                                <th>Status</th>
                                <th>Əməliyyatlar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{!! App\Http\Controllers\products\productsController::getUserCheck($product->user_id,'name') !!}</td>
                                    <td>{!! App\Http\Controllers\products\productsController::getCategoryCheck($product->category_id,'title') !!}</td>
                                    <td>{{ $product->price }} AZN</td>
                                    <td>{!! App\Http\Controllers\products\productsController::getStatusCheck($product->status) !!}</td>
                                    <td>
                                        <button onclick="editProduct({{$product->id}})" class="btn btn-sm btn-outline-success">Redaktə et</button>
                                        <button onclick="deleteProduct({{$product->id}})" class="btn btn-sm btn-outline-danger">Sil</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Product add -->
    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Məhsul</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product_add_post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="col-form-label">Məhsul adı:</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="image" class="col-form-label">Məhsul şəkili:</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="user" class="col-form-label">Tədarükçü:</label>
                                    <select name="user" id="user" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ ucfirst($user->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="category" class="col-form-label">Kateqoriya:</label>
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ ucfirst($category->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="price" class="col-form-label">Məhsul qiyməti:</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="stock" class="col-form-label">Məhsul sayı:</label>
                                    <input type="number" class="form-control" id="stock" name="stock">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description" class="col-form-label">Məhsul haqqında:</label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>
                            </div>
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
    <!-- Product add -->
     <!-- Product edit -->
     <div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Məhsul</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('productsEditPost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="col-form-label">Məhsul adı:</label>
                                    <input type="text" class="form-control" id="edit_title" name="title">
                                    <input type="hidden" class="form-control" id="edit_id" name="id">

                                </div>
                            </div>
                            <div class="col-6" style="display:flex ;justify-content:space-between;">
                                <div class="col-3">
                                    <img  id="view_image" style="width:100%;"   />
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="image" class="col-form-label">Məhsul şəkili:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        <input type="hidden" class="form-control" id="edit_image" name="old_image">
    
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="user" class="col-form-label">Tədarükçü:</label>
                                    <select name="user" id="user" class="form-control">
                                        @foreach ($users as $user)
                                            <option id="user{{$user->id}}" value="{{ $user->id }}">{{ ucfirst($user->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="category" class="col-form-label">Kateqoriya:</label>
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($categories as $category)
                                            <option id="category{{$category->id}}" value="{{ $category->id }}">{{ ucfirst($category->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="status" class="col-form-label">Status:</label>
                                <select name="status" id="edit_status" class="form-control" ></select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="price" class="col-form-label">Məhsul qiyməti:</label>
                                    <input type="text" class="form-control" id="edit_price" name="price">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="stock" class="col-form-label">Məhsul sayı:</label>
                                    <input type="number" class="form-control" id="edit_stock" name="stock">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description" class="col-form-label">Məhsul haqqında:</label>
                                    <textarea name="description" id="edit_description" class="form-control"></textarea>
                                </div>
                            </div>
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
    <!-- Product edit -->
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

        function editProduct(id) {
            const myModal = new bootstrap.Modal(document.getElementById("editProduct"), {});
            $.ajax({
                type: "POST",
                url: "/products/product-edit/view",
                data: {
                    _token,
                    id,
                },
                success: async function(res) {
                    if (res.status) {
                        document.getElementById("edit_title").value =
                            res.data.title;
                            document.getElementById("view_image").src =`http://127.0.0.1:8000/${res.data.image}`;
                            document.getElementById("edit_price").value =
                            res.data.price;
                            document.getElementById("edit_image").value =
                            res.data.image;
                            document.getElementById("edit_stock").value =
                            res.data.stock;
                            document.getElementById("edit_description").innerHTML =
                            res.data.description;
                            document.getElementById("edit_id").value =
                            res.data.id;
                            document.getElementById(`user${res.data.user_id}`).selected =true;
                            document.getElementById(`category${res.data.category_id}`).selected =true;
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

        function deleteProduct(id) {
            Swal.fire({
                title: "Məhsulu silməyə əminsinizmi?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Sil",
                denyButtonText: `İmtina et`,
                confirmButtonColor: "#B00D03",
                denyButtonColor: "#2914BD",
                cancelButtonText: "Ləğv et",
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `/products/product-delete/${id}`;
                } else if (result.isDenied) {
                    Swal.fire("İmtina edildi", "", "info");
                }
            });
        }
    </script>


@endsection
