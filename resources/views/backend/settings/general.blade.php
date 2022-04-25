@extends('backend.dashboard.layouts.admin')

@section('content')

            <!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
				    
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">General Settings</div>
					</div>
					<!--end breadcrumb-->


					<div class="col-md-12">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Launch demo modal
						</button>

						<!-- Modal -->
						<div class="modal fade modal-dialog modal-dialog-centered modal-dialog-scrollable" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
								This is some placeholder content to show a vertically centered modal. We've added some extra copy here to show how vertically centering the modal works when combined with scrollable modals. We also use some repeated line breaks to quickly extend the height of the content, thereby triggering the scrolling. When content becomes longer than the predefined max-height of modal, content will be cropped and scrollable within the modal.
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
								</div>
							</div>
						</div>
					</div>
					

					<hr>
					
					<div class="card">
						<div class="card-body"> 

							<div class="table-responsive-sm" style="padding-top: 20px;">
								<table class="form-table" role="presentation" style="width: 100%;">
									<tbody>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for="user_login"> Site Title </label>
											</th>
											<td><input name="user_login" type="text" id="user_login" class="form-control" value="" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
										</tr>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for="user_login"> Tagline </label>
											</th>
											<td><input name="user_login" type="text" id="user_login" class="form-control" value="" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
										</tr>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for="user_login"> Site Icon </label>
											</th>
											<td>
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<img id="blah"  />
													<input type='file' onchange="readURL(this);" style="margin-top: 10px;" />
													<p>Maximum upload file size: 500 MB.</p>
												</div>
											</td>
										</tr>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for="user_login"> Admin logo </label>
											</th>
											<td>
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<img id="blah"  />
													<input type='file' onchange="readURL(this);" style="margin-top: 10px;" />
													<p>Maximum upload file size: 500 MB.</p>
												</div>
											</td>
										</tr>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for="user_login"> Apps logo </label>
											</th>
											<td>
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<img id="blah"  />
													<input type='file' onchange="readURL(this);" style="margin-top: 10px;" />
													<p>Maximum upload file size: 500 MB.</p>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<a href="#" class="btn btn-sm btn-outline-secondary">Save</a>
						

						</div>
					</div>
					<!--end Card-->



					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">News Ticker Settings</div>
					</div>
					<!--end breadcrumb-->

					<hr>
					<div class="card">
						<div class="card-body"> 

							<div class="table-responsive-sm" style="padding-top: 20px;">
								<table class="form-table" role="presentation" style="width: 100%;">
									<tbody>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for=""> Scrolling Speed </label>
											</th>
											<td><input name="user_login" type="text" id="user_login" class="form-control" value="" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
										</tr>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for=""> Scrolling Color </label>
											</th>
											<td><input name="user_login" type="text" id="user_login" class="form-control" value="" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
										</tr>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for=""> Scrolling Font Size </label>
											</th>
											<td><input name="user_login" type="text" id="user_login" class="form-control" value="" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
										</tr>
										
									</tbody>

								</table>
							</div>
							<a href="#" class="btn btn-sm btn-outline-secondary">Save</a>

						</div>
					</div>
					<!--end Card-->

					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">General Settings</div>
					</div>
					<!--end breadcrumb-->

					<hr>

					<div class="card">
						<div class="card-body"> 

							<div class="table-responsive-sm" style="padding-top: 20px;">
								<table class="form-table" role="presentation" style="width: 100%;">
									<tbody>
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
									</tbody>

								</table>
							</div>
							<a href="#" class="btn btn-sm btn-outline-secondary">Save</a>
						

						</div>
					</div>
					<!--end Card-->
					
					
				</div>
			    <!-- end page content-->
    		</div>
    		<!--end page content wrapper-->


@endsection