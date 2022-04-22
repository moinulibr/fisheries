@extends('backend.dashboard.layouts.admin')

@section('content')

            <!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
				    
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Posts</div> <a href="/rd/posts/add-new.php" class="btn btn-sm btn-outline-secondary">Add New</a>
						<!--div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0 align-items-center">
									<li class="breadcrumb-item">
										<a href="javascript:;">
											<ion-icon name="home-outline"></ion-icon>
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">eCommerce</li>
								</ol>
							</nav>
						</div-->
						<div class="ms-auto">
							<div class="btn-group">
								<button type="button" class="btn btn-outline-dark">Settings</button>
								<button type="button" class="btn btn-outline-dark split-bg-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span></button>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
									<a class="dropdown-item" href="javascript:;">Action</a>
									<a class="dropdown-item" href="javascript:;">Another action</a>
									<a class="dropdown-item" href="javascript:;">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="javascript:;">Separated link</a>
								</div>
							</div>
						</div>
					</div>
					<!--end breadcrumb-->
					
					
				</div>
			    <!-- end page content-->
    		</div>
    		<!--end page content wrapper-->

@endsection