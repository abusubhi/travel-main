<?php

namespace App\Http\Livewire\Site;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email,$password,$remember;


    public function mount(){
        if(request()->route()->getName() == "logout"){
            auth()->logout();
            redirect()->route('home');
        }

        if(auth()->check()){
            redirect()->route('home');
        }

    }


    public function login()
    {

        $validate = $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);


        $user = User::where('email',$this->email)->first();

        if (Hash::check($this->password, $user->password)) {

            auth()->login($user);
            if ($user->hasRole('user')) {
                return redirect()->route('home');
            }
            return redirect()->route('home');

        }else{
            $this->addError('email', 'Invalid Login');
        }

    }


    public function render()
    {
        return view('livewire.site.login')->layout('layouts.site.app');
    }
}
