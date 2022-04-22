@extends('backend.dashboard.layouts.admin')

@section('content')

			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Posts</div> <a href="/rd/posts/add-new.php" class="btn btn-sm btn-outline-secondary">Add New</a>
					</div>
					<!--end breadcrumb-->

					<hr />

					<div class="card">
						<div class="card-body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All <span>(3)</span></button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="published-tab" data-bs-toggle="tab" data-bs-target="#published " type="button" role="tab" aria-controls="published " aria-selected="false">Published <span>(1)</span></button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="draft-tab" data-bs-toggle="tab" data-bs-target="#draft" type="button" role="tab" aria-controls="draft" aria-selected="false">Draft <span>(1)</span></button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Pending <span>(1)</span></button>
								</li>
							</ul>

							<div class="filter-button mt-2">
								<select name="m" id="filter-by-date" class="btn btn-sm btn-outline-secondary">
									<option selected="selected" value="0">All dates</option>
									<option value="202203">March 2022</option>
									<option value="202104">April 2021</option>
									<option value="201712">December 2017</option>
									<option value="201711">November 2017</option>
									<option value="201710">October 2017</option>
								</select>
								<select name="cat" id="cat" class="btn btn-sm btn-outline-secondary">
									<option value="0">All Categories</option>
									<option class="level-0" value="16">Business</option>
									<option class="level-0" value="17">Entertaiment</option>
									<option class="level-0" value="18">Fashion</option>
									<option class="level-0" value="19">Life Style</option>
									<option class="level-0" value="20">Others</option>
									<option class="level-0" value="21">Technology</option>
									<option class="level-0" value="1">Uncategorized</option>
								</select>
								<button type="button" class="btn btn-sm btn-outline-secondary">Filter</button>
							</div>

							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
									<div class="table-responsive" style=" padding-top: 10px;">
										<table id="post-all" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th>
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Main categories</th>
													<th scope="col">Sub categories</th>
													<th scope="col">Status Date</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input type="checkbox" name="foo" value="" /></td>
													<td>
														<a href="">মৎস্য ও প্রাণিসম্পদ তথ্য দপ্তরের সাথে আরডিনেটওয়ার্কবিডি এর চুক্তি স্বাক্ষরিত</a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a> <span class="separetor"> | </span> <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td><a href="">Md. Samsul Alam</a></td>
													<td><a href="">মৎস্য ও প্রানি</a></td>
													<td><a href="">মৎস্য</a></td>
													<td class="date column-date" data-colname="Date">
														Published<br />
														2022/03/17 at 3:15 pm
													</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="foo" value="" /></td>
													<td>
														<a href="">মৎস্য চাষী টুটুল মিয়ার সাফল্যের গল্প।</a> <span class="post-state"> — Draft</span></a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a> <span class="separetor"> | </span> <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td><a href="">Khaleque Hasan</a></td>
													<td><a href="">মৎস্য ও প্রানি</a></td>
													<td><a href="">সফলদের সাফল্য গাঁথা</a></td>
													<td class="date column-date" data-colname="Date">
														Draft<br />
														2022/03/17 at 3:15 pm
													</td>
												</tr>
												<tr>
													<td><input type="checkbox" name="foo" value="" /></td>
													<td>
														<a href=""> বিচারহীনতার সংস্কৃতি দূর করেছেন প্রধানমন্ত্রী শেখ হাসিনা - শ ম রেজাউল করিম </a> <span class="post-state"> — Pending</span>
														<div class="group-link">
															<a class="#" href="#"> Edit</a> <span class="separetor"> | </span> <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td><a href="">Khaleque Hasan</a></td>
													<td><a href="">মৎস্য ও প্রানি</a></td>
													<td><a href="">সফলদের সাফল্য গাঁথা</a></td>
													<td class="date column-date" data-colname="Date">
														Pending<br />
														2022/03/17 at 3:15 pm
													</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th>
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Main categories</th>
													<th scope="col">Sub categories</th>
													<th scope="col">Status Date</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>

								<div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
									<div class="table-responsive" style=" padding-top: 10px;">
										<table id="post-published" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th>
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Main categories</th>
													<th scope="col">Sub categories</th>
													<th scope="col">Status Date</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input type="checkbox" name="foo" value="" /></td>
													<td>
														<a href="">মৎস্য ও প্রাণিসম্পদ তথ্য দপ্তরের সাথে আরডিনেটওয়ার্কবিডি এর চুক্তি স্বাক্ষরিত</a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a> <span class="separetor"> | </span> <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td><a href="">Md. Samsul Alam</a></td>
													<td><a href="">মৎস্য ও প্রানি</a></td>
													<td><a href="">মৎস্য</a></td>
													<td class="date column-date" data-colname="Date">
														Published<br />
														2022/03/17 at 3:15 pm
													</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th>
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Main categories</th>
													<th scope="col">Sub categories</th>
													<th scope="col">Status Date</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>

								<div class="tab-pane fade" id="draft" role="tabpanel" aria-labelledby="draft-tab">
									<div class="table-responsive" style=" padding-top: 10px;">
										<table id="post-draft" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th>
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Main categories</th>
													<th scope="col">Sub categories</th>
													<th scope="col">Status Date</th>
												</tr>
											</thead>
											<tbody>
											<tr>
												<td><input type="checkbox" name="foo" value="" /></td>
													<td>
														<a href="">মৎস্য চাষী টুটুল মিয়ার সাফল্যের গল্প।</a> <span class="post-state"> — Draft</span></a>
														<div class="group-link">
															<a class="#" href="#"> Edit</a> <span class="separetor"> | </span> <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td><a href="">Khaleque Hasan</a></td>
													<td><a href="">মৎস্য ও প্রানি</a></td>
													<td><a href="">সফলদের সাফল্য গাঁথা</a></td>
													<td class="date column-date" data-colname="Date">
														Draft<br />
														2022/03/17 at 3:15 pm
													</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th>
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Main categories</th>
													<th scope="col">Sub categories</th>
													<th scope="col">Status Date</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>

								<div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
									<div class="table-responsive" style=" padding-top: 10px;">
										<table id="post-pending" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th>
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Main categories</th>
													<th scope="col">Sub categories</th>
													<th scope="col">Status Date</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input type="checkbox" name="foo" value="" /></td>
													<td>
														<a href=""> বিচারহীনতার সংস্কৃতি দূর করেছেন প্রধানমন্ত্রী শেখ হাসিনা - শ ম রেজাউল করিম </a> <span class="post-state"> — Pending</span>
														<div class="group-link">
															<a class="#" href="#"> Edit</a> <span class="separetor"> | </span> <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td><a href="">Khaleque Hasan</a></td>
													<td><a href="">মৎস্য ও প্রানি</a></td>
													<td><a href="">সফলদের সাফল্য গাঁথা</a></td>
													<td class="date column-date" data-colname="Date">
														Pending<br />
														2022/03/17 at 3:15 pm
													</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th>
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Main categories</th>
													<th scope="col">Sub categories</th>
													<th scope="col">Status Date</th>
												</tr>
											</tfoot>
										</table>
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