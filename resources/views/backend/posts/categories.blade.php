@extends('backend.dashboard.layouts.admin')

@section('content')

			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Categories</div>
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

					<hr />

					<div class="card">
						<div class="card-body">
							
							<div class="row">
                                <div class="col-md-5">
                                    <div class="postbody">
                                        <h5>Add New Category</h5>
                                        <div class="mb-3">
                                            <label for="exampleFormControlText" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="exampleFormControlText" placeholder="">
                                            The name is how it appears on your site.
                                        </div>
                        
                                        <div class="mb-3">
                                            <label for="exampleFormControlText" class="form-label">Slug</label>
                                            <input type="text" class="form-control" id="exampleFormControlText" placeholder="">
                                            <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                                        </div>
                        
                                        <label for="exampleFormControlText" class="form-label">Parent Category</label><br>
                                        <select name="cat" id="cat" class="btn btn-sm btn-outline-secondary">
                                            <option value="0">None</option>
                                            <option class="level-0" value="16">Business</option>
                                            <option class="level-0" value="17">Entertaiment</option>
                                            <option class="level-0" value="18">Fashion</option>
                                            <option class="level-0" value="19">Life Style</option>
                                            <option class="level-0" value="20">Others</option>
                                            <option class="level-0" value="21">Technology</option>
                                            <option class="level-0" value="1">Uncategorized</option>
                                        </select>
                                        <br> <p> You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</p>
                        
                        
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            <p>The description is not prominent by default; however, some themes may show it.</p>
                                        </div>
                                        <div class="fileinput fileinput-new mb-3" data-provides="fileinput">
                                            
                                            <div>
                                                
                                                <span class="btn btn-default btn-file">
                                                    <input type="file" name="file" accept="image/*" />
                                                </span>
                                                <!-- <span class="fileinput-new">Choose image</span> -->
                                                <a type="button" class="fileinput-exists" data-dismiss="fileinput">
                                                    Remove category image
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/admin/posts/add-new.php" class="btn btn-sm btn-outline-secondary mb-5">Add New Category</a>
                                </div>
                                <div class="col-md-7">
                                    <div class="filter-button mt-2">
        								<select name="m" id="filter-by-date" class="btn btn-sm btn-outline-secondary">
        									<option selected="selected" value="0">Bulk actions</option>
        									<option value="delete">Delete</option>
        								</select>
        								<button type="button" class="btn btn-sm btn-outline-secondary">Apply</button>
        							</div>
                                    <div class="table-responsive-sm" style="padding-top: 20px;">
                                        <table id="example" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" onclick="toggle(this)"></th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Slug</th>
                                                    <th scope="col">Categorie Type</th>
                                                    <th scope="col">Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="checkbox" name="foo" value=""></td>
                                                    <td>
                                                        <a href="">Uncategorized</a>
                                                        <div class="group-link">
                                                            <a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                            <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
                                                            <a class="#" href="#"> View</a>
                                                        </div>
                                                    </td>
                                                    <td>uncategorized </td>
                                                    <td>Main </td>
                                                    <td><a href="">3</a></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="foo" value=""></td>
                                                    <td>
                                                        <a href="">মৎস্য ও প্রাণিসম্পদ</a>
                                                        <div class="group-link">
                                                            <a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                            <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
                                                            <a class="#" href="#"> View</a>
                                                        </div>
                                                    </td>
                                                    <td>fisheries-and-livestock </td>
                                                    <td>Main</td>
                                                    <td><a href="">3</a></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="foo" value=""></td>
                                                    <td>
                                                        <a href=""><span>— </span>মৎস্য</a>
                                                        <div class="group-link">
                                                            <a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                            <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
                                                            <a class="#" href="#"> View</a>
                                                        </div>
                                                    </td>
                                                    <td>fisheries </td>
                                                    <td>sub </td>
                                                    <td><a href="">2</a></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" name="foo" value=""></td>
                                                    <td>
                                                        <a href=""><span>— </span><span>— </span>মৎস্য সাব</a>
                                                        <div class="group-link">
                                                            <a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                            <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
                                                            <a class="#" href="#"> View</a>
                                                        </div>
                                                    </td>
                                                    <td>fisheries </td>
                                                    <td>sub - sub </td>
                                                    <td><a href="">2</a></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th><input type="checkbox" onclick="toggle(this)"></th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Slug</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Count</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the default category Uncategorized. The default category cannot be deleted.
                                    </div>
                                </div>
                            </div>

						</div>
					</div>
					<!--end card-->
				</div>
				<!-- end page content-->
			</div>
			<!--end page content wrapper-->


@endsection