<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostsEdit extends Component
{
    use WithFileUploads;

    public $post ,$image ,$imageTemp ;

    function mount($id){

        $post = Post::findOrFail($id);
        $this->post = $post->toArray();

    }

    public function update()
    {
        $this->validate([
            'post.title' => 'required|string',
            'post.description' => '',
            'post.image' => '',

        ]);

        if($this->post['image']){
            $this->validate([
//                'image' => 'file|image',
                'image' => ''
            ]);

        }

        if ($this->imageTemp) {
            $this->post['image'] = $this->imageTemp->store('Posts/'.$this->id);
        }else{
            unset($this->post['image']);
        }

        $post = Post::findOrFail($this->post['id']);

        $post->update($this->post);


        session()->flash('success', 'Post successfully Added.');

        return redirect()->route('admin.posts');
    }


    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');

        return view('livewire.admin.posts.posts-edit')->layout('layouts.admins.app');
    }

}
