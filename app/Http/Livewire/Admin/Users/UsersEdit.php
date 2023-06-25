<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Gym;
use App\Models\Location;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UsersEdit extends Component
{
    public  $user;

    function mount($id)
    {
        $user = User::findOrFail($id);
        $this->user = $user->toArray();
    }

    public function update()
    {

        $this->validate([

            'user.first_name' => 'required|string',
            'user.middle_name' => 'required|string',
            'user.end_name' => 'required|string',
            'user.phone' => 'required',
            'user.postal_number' => 'required',
            'user.email' => 'email|unique:users,email,' . $this->user['id'],
            'user.gender' => 'required',
            'user.birth_date' => 'required',

        ]);

        $this->user['user_id'] =  auth()->user()->id;


        $user = User::findOrFail($this->user['id']);


        if (!empty($this->user['password'])) {
            $this->validate([
                'user.password' => 'required|min:6',
            ]);

            $this->user['password'] = bcrypt($this->user['password']);
            $user->save();
            unset($user['password']);
        }


        $user->update($this->user);

        session()->flash('success', 'User successfully Updated.');

        return redirect()->route('admin.users');
    }


    public function render()
    {
        return view('livewire.admin.users.users-edit')->layout('layouts.admins.app');
    }
}
