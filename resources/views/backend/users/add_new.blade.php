@extends('backend.dashboard.layouts.admin')

@section('content')
            <!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
				    
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Add New User</div>
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
					<p>Create a brand new user and add them to this site.</p> 
					<!--end breadcrumb-->

					<hr>

					<div class="card">
						<div class="card-body">

							<div class="table-responsive-sm" style="padding-top: 20px;">
								<table class="form-table" role="presentation" style="width: 100%;">
									<tbody>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for="user_login">Username <span class="description">(required)</span></label>
											</th>
											<td><input name="user_login" type="text" id="user_login" class="form-control" value="" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
										</tr>
										<tr class="form-field form-required">
											<th scope="row">
												<label for="email">Email <span class="description">(required)</span></label>
											</th>
											<td><input name="email" type="email" id="email" class="form-control" value="" /></td>
										</tr>
										<tr class="form-field">
											<th scope="row"><label for="first_name">First Name </label></th>
											<td><input name="first_name" type="text" id="first_name" class="form-control" value="" /></td>
										</tr>
										<tr class="form-field">
											<th scope="row"><label for="last_name">Last Name </label></th>
											<td><input name="last_name" type="text" id="last_name" class="form-control" value="" /></td>
										</tr>
										<tr class="form-field">
											<th scope="row"><label for="mobile">Mobile</label></th>
											<td><input name="mobile" type="phone" id="phone" class="form-control" value="" /></td>
										</tr>
										<tr class="form-field">
											<th scope="row"><label for="password">Password (required)</label></th>
											<td><input name="password" type="password" id="password" class="form-control" value="" /></td>
										</tr>
										<tr class="form-field">
											<th scope="row"><label for="password">Re-type Password (required)</label></th>
											<td><input name="password" type="password" id="password" class="form-control" value="" /></td>
										</tr>
										<tr class="form-field form-required user-pass2-wrap hide-if-js" style="display: none;">
											<th scope="row">
												<label for="pass2">Repeat Password <span class="description">(required)</span></label>
											</th>
											<td>
												<input name="pass2" type="password" id="pass2" autocomplete="off" aria-describedby="pass2-desc" />
												<p class="description" id="pass2-desc">Type the password again.</p>
											</td>
										</tr>
										<tr class="pw-weak" style="display: none;">
											<th>Confirm Password</th>
											<td>
												<label>
													<input type="checkbox" name="pw_weak" class="pw-checkbox" />
													Confirm use of weak password
												</label>
											</td>
										</tr>
										<tr>
											<th scope="row">Send User Notification</th>
											<td>
												<input type="checkbox" name="send_user_notification" id="send_user_notification" value="1" checked="checked" />
												<label for="send_user_notification">Send the new user an email about their account.</label>
											</td>
										</tr>
										<tr class="form-field">
											<th scope="row"><label for="role">Role</label></th>
											<td>
												<select name="role" id="role" class="btn btn-sm btn-outline-secondary">
													<option value="contributor">Contributor</option>
													<option selected="selected" value="author">Author</option>
													<option value="editor">Editor</option>
													<option value="administrator">Administrator</option>
												</select>
											</td>
										</tr>
										<tr>
											<th>
												<div class="fileinput fileinput-new" data-provides="fileinput" style=" width: 200px;">
													<img id="blah"  />
													<input type='file' onchange="readURL(this);" style="margin-top: 10px;" />
												</div>
												<p>Maximum upload file size: 500 MB.</p>
											</th>
										</tr>
									</tbody>

								</table>
							</div>
						</div>
					</div>
					<!--end Card-->
					
					
				</div>
			    <!-- end page content-->
    		</div>
    		<!--end page content wrapper-->


@endsection