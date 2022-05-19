@extends('backend.dashboard.layouts.admin')

@section('content')

			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Pages</div> <a href="{{route('admin.page.create')}}" class="btn btn-sm btn-outline-secondary">Add New</a>
						
						<div class="ms-auto">
							{{-- <div class="btn-group">
								<button type="button" class="btn btn-outline-dark">Settings</button>
								<button type="button" class="btn btn-outline-dark split-bg-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span></button>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
									<a class="dropdown-item" href="javascript:;">Action</a>
									<a class="dropdown-item" href="javascript:;">Another action</a>
									<a class="dropdown-item" href="javascript:;">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="javascript:;">Separated link</a>
								</div>
							</div> --}}
						</div>
					</div>
					<!--end breadcrumb-->

					<hr />

					<div class="card">
						<div class="card-body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$ptyUrl == NULL ? 'active' : ''}}" href="{{route('admin.page.index','')}}">
										All <span>({{$pageCountables->count()}})</span>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$ptyUrl == 'published' ? 'active' : ''}}" href="{{route('admin.page.index','published')}}">
										Published
										<span>({{$pageCountables->where('status',1)->count()}})</span>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$ptyUrl == 'draft' ? 'active' : ''}}" href="{{route('admin.page.index','draft')}}">
										Draft  
										<span>({{$pageCountables->where('status',2)->count()}})</span>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$ptyUrl == 'pending' ? 'active' : ''}}" href="{{route('admin.page.index','pending')}}">
										Pending  
										<span>({{$pageCountables->where('status',0)->count()}})</span>
									</a>
								</li>
							</ul>

							{{-- <div class="filter-button mt-2">
								<select name="m" id="filter-by-date" class="btn btn-sm btn-outline-secondary">
									<option selected="selected" value="0">All dates</option>
									<option value="202203">March 2022</option>
									<option value="202104">April 2021</option>
									<option value="201712">December 2017</option>
									<option value="201711">November 2017</option>
									<option value="201710">October 2017</option>
								</select>
								<button type="button" class="btn btn-sm btn-outline-secondary">Filter</button>
							</div> --}}

							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
									<div class="table-responsive" style=" padding-top: 10px;">
										<table id="post-all" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													{{-- <th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th> --}}
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Status Date</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($pages as $item)
												<tr>
													{{-- <td>
														<input type="checkbox" name="foo" value="" />
													</td> --}}
													<td>
														@php
															$title = $item->title;
															if(strlen($item->title) > 60)
															{
																$len = substr($item->title,0,60);
																if(str_word_count($len) > 1)
																{
																	$title = implode(" ",(explode(' ',$len,-1)));
																}else{
																	$title = $len;
																}
																$title = $title ."...";
															}
														@endphp
														<a href="">{{$title}}</a>
														- @if ($item->status == 1)
															Publish
															@elseif ($item->status == 2)
															Draft
															@elseif ($item->status == 0)
															Pending
															@endif
														<div class="group-link">
															<a class="#" href="{{route('admin.page.edit',$item->id)}}"> Edit</a> <span class="separetor"> | </span> 
															<a class="deleteClass" data-href="{{route('admin.page.delete',$item->id)}}" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td><a href="">{{$item->createdBY ? $item->createdBY->name : NULL }}</a></td>
													<td class="date column-date" data-colname="Date">
														@if ($item->status == 1)
															Publish
															@elseif ($item->status == 2)
															Draft
															@elseif ($item->status == 0)
															Pending
														@endif
														<br />
														{{ \Carbon\Carbon::parse($item->from_date)->format('Y/m/d h:i:s A')}}
													</td>
												</tr>
												@endforeach
											</tbody>
											<tfoot>
												<tr>
													{{-- <th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th> --}}
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Status Date</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>

								{{-- <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
									<div class="table-responsive" style=" padding-top: 10px;">
										<table id="post-published" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th style="width: 1%;"><input type="checkbox" onclick="toggle(this)" /></th>
													<th scope="col">Title</th>
													<th scope="col">Author</th>
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
													<th scope="col">Status Date</th>
												</tr>
											</thead>
											<tbody>
												<td><input type="checkbox" name="foo" value="" /></td>
													<td>
														<a href=""> বিচারহীনতার সংস্কৃতি দূর করেছেন প্রধানমন্ত্রী শেখ হাসিনা - শ ম রেজাউল করিম </a> <span class="post-state"> — Pending</span>
														<div class="group-link">
															<a class="#" href="#"> Edit</a> <span class="separetor"> | </span> <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td><a href="">Khaleque Hasan</a></td>
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
													<th scope="col">Status Date</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div> --}}
							</div>
						</div>
					</div>
					<!--end card-->
				</div>
				<!-- end page content-->
			</div>
			<!--end page content wrapper-->


			<div class="modal modalDeleteShow" id="modalDeleteShow"> </div>
@endsection



@push('js')
    <script>
         $(document).on('click','.deleteClass',function(e){
            e.preventDefault();
            url = $(this).data('href');
            $.ajax({
                url:url,
                success:function(response){
                    if(response.status == true)
                    {
                        $('.modalDeleteShow').html(response.html).modal('show');
                    }
                },
            });
        });

         

          // checked all order list 
          $(document).on('click','.check_all_class',function()
            { 
                displayNone();
                if (this.checked == false)
                {   
                    $('.check_single_class').prop('checked', false).change();
                    $(".check_single_class").each(function ()
                    {
                        var id = $(this).attr('id');
                        $(this).val('').change();
                    });
                }
                else
                {
                    $('.check_single_class').prop("checked", true).change();
                    $(".check_single_class").each(function ()
                    {
                        var id = $(this).attr('id');
                        $(this).val(id).change();
                    });
                }
            });
        // checked all order list 

        
        //check single order list
            $(document).on('click','.check_single_class',function()
            {
                displayNone();
                var $b = $('input[type=checkbox]');
                if($b.filter(':checked').length <= 0)
                {
                    $('.check_all_class').prop('checked', false).change();
                }

                var id = $(this).attr('id');
                if (this.checked == false)
                {
                    $(this).prop('checked', false).change();
                    $(this).val('').change();
                }else{
                    $(this).prop("checked", true).change();
                    $(this).val(id).change();
                }
                
                var ids = [];
                $('input.check_single_class[type=checkbox]').each(function () {
                    if(this.checked){
                        var v = $(this).val();
                        ids.push(v);
                    }
                });
                if(ids.length <= 0)
                {
                    $('.check_all_class').prop('checked', false).change();
                }
            });
        //check single order list
            
        //bulk deleting (route for all checked product deleting)
       /*  $(document).on('click', '.deletedAll', function (){
            $('.alert-success').hide();
            $('#delete_modal').modal('show');
        }); */
        

            $(document).on('click', '.deletedAllButton', function (){
                displayNone();
               var option =  $('.bulkActionButton option:selected').val();
               if(option == 0)
               {
                   alert('Select Bulk Action : delete');
                   return 0;
               }
                var ids = [];
                $('input.check_single_class[type=checkbox]').each(function () {
                    if(this.checked){
                        var v = $(this).val();
                        ids.push(v);
                    }
                });
                var url =  "{{ route('admin.user.bulk.deleting') }}";
				return ;
                if(ids.length <= 0) return ;
                let decirectUrl = "{{route('admin.user.index')}}";
                $.ajax({
                    url: url,
                    data: {ids: ids},
                    type: "POST",
                    beforeSend:function(){
                        //$('#delete_modal').modal('hide');
                        //$('.loading').fadeIn();
                        //$('.loadingText').show();
                    },
                    success: function(response){
                        if(response.status == true)
                        {
                            $('.successMessage').show();
                            $('.alert-success-custom').show();
                            $('.message').text(response.mess);
                            setTimeout(function () {
                                $(location).attr('href', decirectUrl);
                            }, 2000);
                        }
                    },
                    complete:function(){
                        //$('.loading').fadeOut(); 
                        //$('.loadingText').hide();
                    },
                });
            });
        //bulk product deleting end
            function displayNone()
            {
                $('.alert-success').css({
                    "display" : 'none'
                });
                $('.alert-success-custom').css({
                    "display" : 'none'
                });
                $('.successMessage').hide();
                $('.message').text('');
            }
    </script>
@endpush