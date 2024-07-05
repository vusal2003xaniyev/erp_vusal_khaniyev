<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
	<div class="container-fluid">
		<div class="d-flex d-lg-none me-2">
			<button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
				<i class="ph-list"></i>
			</button>
		</div>
		<div class="navbar-brand flex-1 flex-lg-0">
			<a href="index.html" class="d-inline-flex align-items-center">
				<img src="https://166tech.az/uploads/settings/58013935.webp" alt="logo">
			</a>
		</div>
		<ul class="nav flex-row justify-content-end order-1 order-lg-2">
			<li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
				<a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
					<div class="status-indicator-container">
						<img src="{{asset(Auth::user()->image)}}" class="w-32px h-32px rounded-pill" alt="">
						<span class="status-indicator bg-success"></span>
					</div>
					<span class="d-none d-lg-inline-block mx-lg-2">{{ucfirst(Auth::user()->name)}}</span>
				</a>

				<div class="dropdown-menu dropdown-menu-end">
					<a href="{{route('profil_page_view')}}" class="dropdown-item">
						<i class="ph-user-circle me-2"></i>
						Profilim
					</a>
					<a href="{{route('logout')}}" class="dropdown-item">
						<i class="ph-sign-out me-2"></i>
						Çıxış
					</a>
				</div>
			</li>
		</ul>
	</div>
</div>