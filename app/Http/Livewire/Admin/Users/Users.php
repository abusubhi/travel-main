<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    protected $listeners = ['refreshModal'];

    public $search, $name, $email,$mobile, $deleteId, $user_id ,$role_id , $role ;


    public function search()
    {

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditModal($id)
    {
        $this->user_id = $id;
    }

    public function refreshModal()
    {
        $this->user_id = "";
    }


    public function delete()
    {

        $users = User::findOrFail($this->deleteId);

        if (!auth()->user()->can('Manger users')) {
            session()->flash('danger', 'users does not have the right permissions.');
            return redirect()->route('admin.users');
        }

        $users->delete();
        session()->flash('success', 'users successfully Deleted.');
        return redirect()->route('admin.users');

    }

    public function render()
    {
        $users = User::query();
        $roles = Role::get();

        if ($this->name) {
            $users = $users->where('name', 'LIKE', '%' . $this->name . '%');
        }
        if ($this->email) {
            $users = $users->where('email', 'LIKE', '%' . $this->email . '%');
        }
        if ($this->mobile) {
            $users = $users->where('mobile', 'LIKE', '%' . $this->mobile . '%');
        }
        if ($this->role_id) {
            $users = $users->whereHas("roles", function($q){ $q->where("id", $this->role_id); });
        }


        $users = $users->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.users.users', compact('users','roles'))->layout('layouts.admins.app');
    }
}
