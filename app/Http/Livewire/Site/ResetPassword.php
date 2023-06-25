<?php

namespace App\Http\Livewire\Site;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{
    public $email,$password,$remember;

    public function login()
    {

        $validate = $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);


        $user = User::where('email',$this->email)->first();

        if (Hash::check($this->password, $user->password)) {
            auth()->login($user);
            redirect()->route('home');
        }else{
            $this->addError('email', 'Invalid Login');
        }

    }


    public function render()
    {
        return view('livewire.site.reset-password')->layout('layouts.site.app');
    }
}
