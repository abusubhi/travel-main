<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use App\Models\Post;
use App\Models\Traveler;
use App\Models\Type;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Home extends Component
{

    public $models;

    public function mount(){
        $this->models =  [
            'المستخدمين' => User::count(),
            'الأخبار' => Post::count(),
            'المسافرين' => Traveler::count(),

        ];
    }

    public function render()
    {
        return view('livewire.admin.home')->layout('layouts.admins.app');
    }
}
