@extends('backend.dashboard.layouts.admin')

@section('content')

            <!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
				    
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Users</div> <a href="/rd/users/add-new.php" class="btn btn-sm btn-outline-secondary">Add New</a>
						
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

					<hr>

					<div class="card">
						<div class="card-body">

							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All <span>(3)</span></button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="administrator-tab" data-bs-toggle="tab" data-bs-target="#administrator  " type="button" role="tab" aria-controls="administrator  " aria-selected="false">Administrator  <span>(1)</span></button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="editor-tab" data-bs-toggle="tab" data-bs-target="#editor" type="button" role="tab" aria-controls="editor" aria-selected="false">Editor  <span>(1)</span></button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="author-tab" data-bs-toggle="tab" data-bs-target="#author" type="button" role="tab" aria-controls="author" aria-selected="false">Author  <span>(1)</span></button>
								</li>
							</ul>
							<div class="filter-button mt-2">
								<select name="m" id="filter-by-date" class="btn btn-sm btn-outline-secondary">
									<option selected="selected" value="0">Bulk actions</option>
									<option value="delete">Delete</option>
								</select>
								<button type="button" class="btn btn-sm btn-outline-secondary">Apply</button>
							</div>

							<div class="tab-content" id="myTabContent">

								<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
									<div class="table-responsive-sm" style="padding-top: 20px;">
										<table id="post-all" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
													<th scope="col">Image</th>
													<th scope="col">Username</th>
													<th scope="col">Name</th>
													<th scope="col">Email</th>
													<th scope="col">Role</th>
													<th scope="col">Posts</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input type="checkbox" name="foo" value=""></td>
													<td>
														<span class="media-image">
															<img width="60" height="50" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy">
														</span> 
													</td>
													<td>
														<a href="#"> <span class="username"> admin </span> </a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
															<a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td>
														<a href="https://motshoprani.org/">  Md. Samsul Alam  </a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
															<a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td> <a href="alam4162@gmail.com">  alam4162@gmail.com </a> </td>
													<td>Administrator </td>
													<td>
														<a href="">5</a>
													</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
													<th scope="col">Image</th>
													<th scope="col">Username</th>
													<th scope="col">Name</th>
													<th scope="col">Email</th>
													<th scope="col">Role</th>
													<th scope="col">Posts</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							
								<div class="tab-pane fade" id="administrator" role="tabpanel" aria-labelledby="administrator-tab">
									<div class="table-responsive-sm" style="padding-top: 20px;">
										<table id="post-published" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
													<th scope="col">Image</th>
													<th scope="col">Username</th>
													<th scope="col">Name</th>
													<th scope="col">Email</th>
													<th scope="col">Role</th>
													<th scope="col">Posts</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input type="checkbox" name="foo" value=""></td>
													<td>
														<span class="media-image">
															<img width="60" height="50" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy">
														</span> 
													</td>
													<td>
														<a href="#"> <span class="username"> admin </span> </a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
															<a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td>
														<a href="https://motshoprani.org/">  Md. Samsul Alam  </a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
															<a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td> <a href="alam4162@gmail.com">  alam4162@gmail.com </a> </td>
													<td>Administrator </td>
													<td>
														<a href="">5</a>
													</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
													<th scope="col">Image</th>
													<th scope="col">Username</th>
													<th scope="col">Name</th>
													<th scope="col">Email</th>
													<th scope="col">Role</th>
													<th scope="col">Posts</th>
												</tr>
											</tfoot>
										</table>
									</div>

								</div>
								<div class="tab-pane fade" id="editor" role="tabpanel" aria-labelledby="editor-tab">
									<div class="table-responsive-sm" style="padding-top: 20px;">
										<table id="post-draft" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
													<th scope="col">Image</th>
													<th scope="col">Username</th>
													<th scope="col">Name</th>
													<th scope="col">Email</th>
													<th scope="col">Role</th>
													<th scope="col">Posts</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input type="checkbox" name="foo" value=""></td>
													<td>
														<span class="media-image">
															<img width="60" height="50" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy">
														</span> 
													</td>
													<td>
														<a href="#"> <span class="username"> admin </span> </a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
															<a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td>
														<a href="https://motshoprani.org/">  Md. Samsul Alam  </a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
															<a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td> <a href="alam4162@gmail.com">  alam4162@gmail.com </a> </td>
													<td>Administrator </td>
													<td>
														<a href="">5</a>
													</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
													<th scope="col">Image</th>
													<th scope="col">Username</th>
													<th scope="col">Name</th>
													<th scope="col">Email</th>
													<th scope="col">Role</th>
													<th scope="col">Posts</th>
												</tr>
											</tfoot>
										</table>
									</div>

								</div>
								<div class="tab-pane fade" id="author" role="tabpanel" aria-labelledby="author-tab">
									<div class="table-responsive-sm" style="padding-top: 20px;">
										<table id="post-pending" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
													<th scope="col">Image</th>
													<th scope="col">Username</th>
													<th scope="col">Name</th>
													<th scope="col">Email</th>
													<th scope="col">Role</th>
													<th scope="col">Posts</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input type="checkbox" name="foo" value=""></td>
													<td>
														<span class="media-image">
															<img width="60" height="50" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy">
														</span> 
													</td>
													<td>
														<a href="#"> <span class="username"> admin </span> </a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
															<a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td>
														<a href="https://motshoprani.org/">  Md. Samsul Alam  </a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
															<a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td> <a href="alam4162@gmail.com">  alam4162@gmail.com </a> </td>
													<td>Administrator </td>
													<td>
														<a href="">5</a>
													</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
													<th scope="col">Image</th>
													<th scope="col">Username</th>
													<th scope="col">Name</th>
													<th scope="col">Email</th>
													<th scope="col">Role</th>
													<th scope="col">Posts</th>
												</tr>
											</tfoot>
										</table>
									</div>

								</div>
							</div>

						</div>
					</div>
					<!--end Card-->

					
					
				</div>
			    <!-- end page content-->
    		</div>
    		<!--end page content wrapper-->


@endsection