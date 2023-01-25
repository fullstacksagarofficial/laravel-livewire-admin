<x-admin-layout>
    @section('page_title', 'Categories')
    @section('select_category', 'active')
    @if (session()->has('message'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center">
        <h3>Category</h3>


        <a href="category/add"> <button class="btn btn-primary">Add Category</button></a>
    </div>
    <div class="table-responsive m-b-40 mt-5">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Parent Category</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category_name }}</td>
                        <td>{{ $item->category_slug }}</td>
                        <td>{{ $item->parent_category_id }}</td>
                        <td>
                            @if ($item->category_image != '')
                                <a href="{{ asset('storage/media/category/' . $item->category_image) }}"
                                    target="_blank"><img width="80px" class="img-cir"
                                        src="{{ asset('storage/media/category/' . $item->category_image) }}" /></a>
                            @endif
                        </td>
                        <td>


                            @if ($item->status == 1)
                                <a href="{{ url('admin/category/status/0') }}/{{ $item->id }}"><button
                                        type="button" class="badge badge-success">Active</button></a>
                            @elseif($item->status == 0)
                                <a href="{{ url('admin/category/status/1') }}/{{ $item->id }}"><button
                                        type="button" class="badge badge-warning">Deactive</button></a>
                            @endif

                            <a href="{{ url('admin/category/edit/') }}/{{ $item->id }}"> <i
                                    class="fa fa-edit mx-2 text-warning"></i> </a>
                            <a href="{{ url('admin/category/delete/') }}/{{ $item->id }}"> <i
                                    class="fa fa-trash mx-2 text-danger"></i> </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-admin-layout>
