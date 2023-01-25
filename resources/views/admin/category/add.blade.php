

<x-admin-layout>
    @section('page_title', 'Add Category')
    @section('select_category', 'active')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Add Category</h4>
            <div> <a href="{{ url('admin/category') }}"> <button class="btn btn-light"> <i class="fa fa-arrow-left"></i>
                        Back</button></a></div>
        </div>
        <div class="card-body">

            <form action="{{ route('category.insert') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="category_name" class="control-label mb-1">Name</label>
                            <input id="category_name" name="category_name" type="text" class="form-control"
                                placeholder="Enter Category Name">
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
                                    <option value="{{ $list->id }}">
                                        {{ $list->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">Slug</label>
                            <input id="category_slug" name="category_slug" type="text" class="form-control cc-name valid"
                                placeholder="Please enter slug">
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
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="image" class="control-label mb-1"> Show in Home Page</label>
                            <input id="is_home" name="is_home" type="checkbox">
                        </div>
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




