<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ListUsers extends AdminComponent
{

    public $state = [];
    public $user;
    public $userIDBeingRemoved = null;

    public $showEditModal = false;

    public function render()
    {
        $users = User::latest()->paginate(10);
        return view('livewire.admin.users.list-users', [
            'users' => $users
        ]);
    }

    public function addNew()
    {
        $this->state = []; //clear previous form input values
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser()
    {
        // dd($this->state);

        $validatedData =  Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        // session()->flash('message', 'User Created Successfully');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User Created Successfully']);
    }
    public function edit(User $user)
    {
        $this->showEditModal = true;
        $this->user = $user;
        // dd($user->toArray());
        $this->state = $user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }


    public function updateUser()
    {
        // dd($this->state);

        $validatedData =  Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|confirmed'
        ])->validate();

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        $this->user->update($validatedData);


        $this->dispatchBrowserEvent('hide-form', ['message' => 'User Updated Successfully']);
    }

    public function confirmUserRemoval($userID)
    {

        $this->userIDBeingRemoved = $userID;

        $this->dispatchBrowserEvent('show-delete-modal');
    }



    public function deleteUser()
    {
        $user = User::findOrFail($this->userIDBeingRemoved);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User Deleted Successfully']);
    }
}
