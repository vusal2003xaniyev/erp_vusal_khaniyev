@extends('layouts.master')
@section('title', 'Haqqında')
@section('content')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Nizamlamalar - <span class="fw-normal">Haqqında</span>
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
                        <h5 class="mb-0">Haqqında məlumatlarını aşağıdan redaktə edə bilərsiniz</h5>
                    </div>
                    @include('widgets.message')
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-6 m-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('about_edit_post')}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Başlıq <span style="color: red;">*</span></label>
                                                <input type="text" id="title" value="{{$about_data->about_title}}" name="title" class="form-control" placeholder="Başlıq daxil edin">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Açıqlama <span style="color: red;">*</span></label>
                                                <textarea rows="3" cols="3" class="form-control" name="description" placeholder="Açıqlama daxil edin">{{$about_data->about_description}}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <button  class="btn btn-primary ms-3 float-end">Yadda saxla</button>
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
<script src="{{asset('assets/js/app.js')}}"></script>
@endsection