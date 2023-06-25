<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    protected $listeners = ['refreshModal'];


    public $search, $title, $description, $deleteId, $post_id ,$image ,$imageTemp;

    public function search()
    {

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditModal($id)
    {
        $this->post_id = $id;
    }

    public function refreshModal()
    {
        $this->post_id = "";
    }


    public function delete()
    {

        $posts = Post::findOrFail($this->deleteId);

        if (!auth()->user()->can('Manger posts')) {
            session()->flash('danger', 'Post does not have the right permissions.');
            return redirect()->route('admin.posts');
        }

        $posts->delete();
        session()->flash('success', 'Post successfully Deleted.');
        return redirect()->route('admin.posts');

    }

    public function render()
    {
        $posts = Post::query();


        if ($this->title) {
            $posts = $posts->where('title', 'LIKE', '%' . $this->title . '%');
        }
        if ($this->description) {
            $posts = $posts->where('description', 'LIKE', '%' . $this->description . '%');
        }



        $posts = $posts->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.posts.posts', compact('posts'))->layout('layouts.admins.app');
    }
}
