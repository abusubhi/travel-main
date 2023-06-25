<?php

namespace App\Http\Livewire\Site;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $posts ;

    public function mount(){

        $posts = Post::limit(4)->get();
        $this->posts = $posts->toArray();

    }


    public function render()
    {
        return view('livewire.site.posts');
    }
}
