@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endforeach
        </ul>
    </div>
@endif
@if (session('addSuccess'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
        <strong>Uğurlu!</strong> Əlavə edildi!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('editSuccess'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
        <strong>Uğurlu!</strong> Redaktə edildi!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('deleteSuccess'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
        <strong>Uğurlu!</strong> Silindi!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('errorPassword'))
    <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
        <strong>Xeta!</strong> Cari şifrə yanlışdır!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
        <strong>Xəta!</strong> Əməliyyat zamanı xəta baş verdi!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error_login'))
    <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
        <strong>Xəta!</strong> E-Poçt və ya Şifrə yanlışdır!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif