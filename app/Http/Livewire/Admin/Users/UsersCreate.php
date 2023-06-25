<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Gym;
use App\Models\Location;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class UsersCreate extends Component
{


    public  $user;



    public function store()
    {
        $this->validate([

            'user.first_name' => 'required|string',
            'user.middle_name' => 'required|string',
            'user.end_name' => 'required|string',
            'user.phone' => 'required',
            'user.postal_number' => 'required',
            'user.email' => 'required|email|unique:users,email',
            'user.gender' => 'required',
            'user.birth_date' => 'required',
            'user.password' => 'required|min:6',

        ]);

        $this->user['user_id'] =  auth()->user()->id;

        if ($this->user['password']) {
            $this->user['password'] = bcrypt($this->user['password']);
        }

        $user = User::create($this->user);


        session()->flash('success', 'User successfully Updated.');

        return redirect()->route('admin.users');
    }


    public function render()
    {
        return view('livewire.admin.users.users-create')->layout('layouts.admins.app');
    }
}
