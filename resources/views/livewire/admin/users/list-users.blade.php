<div>
    @section('page_title', 'Users')
    @section('select_user', 'active')
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
        <h3>Users</h3>


        <button wire:click.prevent="addNew" class="btn btn-primary">Add User</button>

    </div>
    {{-- <div class="d-flex justify-content-end mt-3 mb-2">
        <input type="text" wire:model="searchTerm" class="form-control w-25 shadow-none" id="" placeholder="Search...">
    </div> --}}
    <div class="table-responsive m-b-40 ">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="" wire:click.prevent="edit({{ $user }})"> <i
                                    class="fa fa-edit mx-2 text-warning"></i> </a>
                            <a href="" wire:click.prevent="confirmUserRemoval({{ $user->id }})"> <i
                                    class="fa fa-trash mx-2 text-danger"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
       <div class="d-flex justify-content-end my-2">
        {{ $users->links() }}
       </div>
    </div>
{{-- delette modal  --}}

<div class="modal fade deleteModal" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel"
aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="smallmodalLabel">Confirmation !</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>
               Are You Sure Want to delete this User !
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" wire:click.prevent="deleteUser" class="btn btn-danger">Confirm</button>
        </div>
    </div>
</div>
</div>



    {{-- //modal  --}}
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-md" role="document">
            <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser' }}">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">
                            @if ($showEditModal)
                                <span>
                                    Edit User
                                </span>
                            @else
                                <span>
                                    Add User
                                </span>
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input wire:model.defer="state.name" type="text"
                                class="form-control shadow-none @error('name') is-invalid @enderror" id="name"
                                placeholder="Enter Name" name="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" wire:model.defer="state.email"
                                class="@error('email') is-invalid @enderror form-control shadow-none"
                                placeholder="Enter email" name="email">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" wire:model.defer="state.password"
                                class="@error('password') is-invalid @enderror form-control shadow-none"
                                id="exampleInputPassword1" placeholder="Password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" wire:model.defer="state.password_confirmation"
                                class="@error('password') is-invalid @enderror form-control shadow-none"
                                name="password_confirmation" placeholder="Confirm Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            @if ($showEditModal)
                                <span>Save Changes</span>
                            @else
                                <span>Save</span>
                            @endif
                        </button>
                    </div>
            </form>
        </div>
    </div>

    



</div>
