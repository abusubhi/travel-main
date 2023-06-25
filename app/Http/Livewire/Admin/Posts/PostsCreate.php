<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostsCreate extends Component
{
    use WithFileUploads;

    public $post , $image ,$imageTemp;


    public function store()
    {
        $this->validate([
            'post.title' => 'required|string',
            'post.description' => '',
            'post.image' => '',

        ]);


        if ($this->imageTemp) {
            $this->post['image'] = $this->imageTemp->store('Posts/'.$this->id);
        }
        else{
            unset($this->post['image']);
        }

        $post = Post::create($this->post);

        session()->flash('success', 'Post  successfully Added.');

        return redirect()->route('admin.posts');
    }


    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');

        return view('livewire.admin.posts.posts-create')->layout('layouts.admins.app');
    }

}
