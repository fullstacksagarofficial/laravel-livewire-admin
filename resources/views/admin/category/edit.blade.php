<x-admin-layout>
    @section('page_title', 'Edit Category')
    @section('select_category', 'active')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Edit Category</h4>
            <div> <a href="{{ url('admin/category') }}"> <button class="btn btn-light"> <i class="fa fa-arrow-left"></i>
                        Back</button></a></div>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="category_name" class="control-label mb-1">Name</label>
                            <input id="category_name" name="category_name" value="{{ $category_name }}" type="text"
                                class="form-control" placeholder="Enter Category Name">
                            <span class="showerror"> @error('category_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="category_name" class="control-label mb-1">Parent Category</label>
                            <select id="parent_category_id" name="parent_category_id" class="form-control" required>
                                <option value="0">Select Categories</option>
                                @foreach ($category as $list)
                                    @if ($parent_category_id == $list->id)
                                        <option selected value="{{ $list->id }}">
                                        @else
                                        <option value="{{ $list->id }}">
                                    @endif
                                    {{ $list->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">Slug</label>
                            <input id="category_slug" name="category_slug" value="{{ $category_slug }}" type="text"
                                class="form-control cc-name valid" placeholder="Please enter slug">
                            <span class="showerror"> @error('category_slug')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="image" class="control-label mb-1"> Image</label>
                            <input id="category_image" name="category_image" type="file" class="form-control"
                                aria-required="true" aria-invalid="false">
                            @error('category_image')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror

                            @if ($category_image != '')
                                <a href="{{ asset('storage/media/category/' . $category_image) }}" class="mt-2"
                                    target="_blank"><img width="100px"
                                        src="{{ asset('storage/media/category/' . $category_image) }}" /></a>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image" class="control-label mb-1"> Show in Home Page</label>
                            <input id="is_home" name="is_home" type="checkbox" {{ $is_home_selected }}>
                        </div>
                        <input type="hidden" name="id" value="{{ $id }}" />
                    </div>
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-md btn-success ">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
