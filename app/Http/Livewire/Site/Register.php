<?php

namespace App\Http\Livewire\Site;

use App\Models\Gym;
use App\Models\Location;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Register extends Component
{

    public $user ;



    public function register()
    {

        $this->validate([
            'user.first_name' => 'required',
            'user.middle_name' => 'required',
            'user.end_name' => 'required',
            'user.email' => 'required|email|unique:users,email',
            'user.phone' => 'required|unique:users,phone',
            'user.postal_number' => 'required|unique:users,postal_number',
            'user.gender' => 'required',
            'user.birth_date' => 'required',
            'user.password' => 'required|confirmed|min:6',
            'user.parameters' => 'required',
            'user.information' => 'required',
        ]);


        if ($this->user['password']) {
            $this->user['password'] = bcrypt($this->user['password']);
        }

        $user = User::create($this->user);


        session()->flash('message', 'User Registered.');

        auth()->login($user);

        return redirect()->route('home');
    }


    public function render()
    {
        return view('livewire.site.register')->layout('layouts.site.app');
    }
}
