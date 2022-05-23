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
							
						</div>
					</div>
					<!--end breadcrumb-->

					<hr />
                    @include('backend.dashboard.includes.message')
                    <div class="successMessage" style="display: none;">
                        <div class="alert alert-success alert-success-custom" role="alert">
                            <i class="fa fa-check"></i>
                            <span class="message"></span>
                        </div>  
                    </div>


					<div class="card">
						<div class="card-body">
                            <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
							@csrf
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="postbody">
                                            <h5>Add New Category</h5>
                                            <div class="mb-3">
                                                <label for="exampleFormControlText" class="form-label">Name</label>
                                                <input type="text" name="name"  value="{{old('name')}}"  id="name" class="form-control" placeholder="">
                                                The name is how it appears on your site.
                                            </div>
                            
                                            <div class="mb-3">
                                                <label for="exampleFormControlText" class="form-label">Slug</label>
                                                <input type="text"  id="slug"  value="{{old('slug')}}" name="slug" class="form-control" placeholder="">
                                                <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                                            </div>
                            
                                            <label for="" class="form-label">Parent Category</label><br>
                                            <select name="parent_id"  class="btn btn-sm btn-outline-secondary">
                                                <option value="0">None</option>
                                                @foreach ($categories as $item)
                                                <option class="level-0" value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            <br> <p> You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</p>
                            
                            
                                            <div class="mb-3">
                                                <label for="" class="form-label">Description</label>
                                                <textarea name="description"  class="form-control"  rows="3">{{old('description')}}</textarea>
                                                <p>The description is not prominent by default; however, some themes may show it.</p>
                                            </div>
                                            <div class="fileinput fileinput-new mb-3" data-provides="fileinput">
                                                
                                                <div>
                                                    
                                                    <span class="btn btn-default btn-file">
                                                        <input type="file" name="photo" accept="image/*" />
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-sm btn-outline-secondary mb-5" value="Add New Category">
                                    </div>


                                    <div class="col-md-7">
                                        <div class="filter-button mt-2">
                                            <select name="bulk_action" id="filter-by-date" class="bulkActionButton btn btn-sm btn-outline-secondary">
                                                <option selected="selected" value="0">Bulk actions</option>
                                                <option value="1">Delete</option>
                                            </select>
                                            <button type="button" class="deletedAllButton btn btn-sm btn-outline-secondary">Apply</button>
                                        </div>
                                        <div class="table-responsive-sm" style="padding-top: 20px;">
                                            <table id="example" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input class="check_all_class " type="checkbox" value="all" name="check_all" style="">    
                                                        </th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Slug</th>
                                                        <th scope="col">Categorie Type</th>
                                                        <th scope="col">Count</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $item)
                                                        <tr>
                                                            <td>
                                                                <input class="check_single_class" type="checkbox"  name="checked_id[]" value="{{ $item->id }}" class="check_single_class" id="{{$item->id}}" style="box-shadow:none;">
                                                            </td>
                                                            <td>
                                                                <a href="">{{$item->name}}</a>
                                                                <div class="group-link">
                                                                    <a class="editClass" data-href="{{route('admin.category.edit',$item->id)}}" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                                    <a class="deleteClass" data-href="{{route('admin.category.delete',$item->id)}}" href="#"> Trash</a> <span class="separetor"> | </span>
                                                                    <a class="#" href="{{$item->side_url}}" target="_blank"> View</a>
                                                                </div>
                                                            </td>
                                                            <td>{{$item->slug}}</td>
                                                            <td>Main </td>
                                                            <td><a href="">3</a></td>
                                                        </tr>
                                                    @endforeach


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
                                                        <th>
                                                            <input class="check_all_class " type="checkbox" value="all" name="check_all" style="">
                                                        </th>
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
                            </form>
						</div>
					</div>
					<!--end card-->
				</div>
				<!-- end page content-->
			</div>
			<!--end page content wrapper-->



            <div class="modal modalEditShow" id="modalEditShow"> </div>
            <div class="modal modalDeleteShow" id="modalDeleteShow"> </div>
            <div class="modal modalStatusShow" id="modalStatusShow"> </div>
@endsection



@push('js')
    <script>
        /* $('#name').change(function(e) {
            $.get('{{ route('admin.category.make.slug') }}', 
                { 'name': $(this).val() }, 
                function( data ) {
                $('#slug').val(data.slug);
                }
            );
        }); */
        $(document).on('change','#name',function(e) {
            $.get('{{ route('admin.category.make.slug') }}', 
                { 'name': $(this).val() }, 
                function( data ) {
                $('#slug').val(data.slug);
                }
            );
        });  
        $(document).on('change','#nameEdit',function(e) {
            $.get('{{ route('admin.category.make.slug') }}', 
                { 'name': $(this).val() }, 
                function( data ) {
                $('#slugEdit').val(data.slug);
                }
            );
        });
    </script>
    

    

    <script>

        
        $(document).on('click','.editClass',function(e){
            e.preventDefault();
            url = $(this).data('href');
            $.ajax({
                url:url,
                success:function(response){
                    if(response.status == true)
                    {
                        $('.modalEditShow').html(response.html).modal('show');
                    }
                },
            });
        });



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
                var url =  "{{ route('admin.category.bulk.deleting') }}";

                if(ids.length <= 0) return ;
                let decirectUrl = "{{route('admin.category.index')}}";
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