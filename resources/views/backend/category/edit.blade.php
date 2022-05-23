   
    <form action="{{route('admin.category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="postbody">
                        <h5>Add New Category</h5>
                        <div class="mb-3">
                            <label for="exampleFormControlText" class="form-label">Name</label>
                            <input type="text" name="name"  value="{{old('name') ?? $category->name }}"  id="nameEdit" class="form-control" placeholder="">
                            The name is how it appears on your site.
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleFormControlText" class="form-label">Slug</label>
                            <input type="text"  id="slugEdit"  value="{{old('slug') ?? $category->slug }}" name="slug" class="form-control" placeholder="">
                            <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                        </div>
        
                        <label for="" class="form-label">Parent Category</label><br>
                        <select name="parent_id"  class="btn btn-sm btn-outline-secondary">
                            <option {{$category->parent_id == 0 ? 'selected':''}} value="0">None</option>
                            @foreach ($categories as $item)
                            <option {{$category->parent_id == $item->id ?'selected':''}} class="level-0" value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <br> <p> You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</p>
        
        
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description"  class="form-control"  rows="3">{{old('description') ?? $category->description}}</textarea>
                            <p>The description is not prominent by default; however, some themes may show it.</p>
                        </div>
                        <div class="fileinput fileinput-new mb-3" data-provides="fileinput">
                            
                            <div>
                                <div class="fileinput fileinput-new" data-provides="fileinput" style=" width: 200px;">
                                    <img src="{{ asset('storage/category/'.$category->photo) }}" alt="" style="height:120px;  margin-top: 10px;">
                                </div>
                                <span class="btn btn-default btn-file">
                                    <input type="file" name="cat_photo" accept="image/*" />
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Update"  class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>