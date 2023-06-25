<?php

namespace App\Http\Livewire\Admin;

use App\Models\Traveler;
use Livewire\Component;

class Travelers extends Component
{


    public $email ,$storage, $weight ,$form , $to , $deleteId ,$search ;

    public function search()
    {

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }


    public function delete()
    {

        $travelers = Traveler::findOrFail($this->deleteId);

        if (!auth()->user()->can('Manger travelers')) {
            session()->flash('danger', 'Traveler does not have the right permissions.');
            return redirect()->route('admin.travelers');
        }

        $travelers->delete();
        session()->flash('success', 'Traveler successfully Deleted.');
        return redirect()->route('admin.travelers');

    }

    public function render()
    {
        $travelers = Traveler::query();

        if ($this->storage) {
            $travelers = $travelers->where('storage', 'LIKE', '%' . $this->storage . '%');
        }

        if ($this->weight) {
            $travelers = $travelers->where('weight', 'LIKE', '%' . $this->weight . '%');
        }

        if ($this->form) {
            $travelers = $travelers->where('form', 'LIKE', '%' . $this->form . '%');
        }

        if ($this->to) {
            $travelers = $travelers->where('to', 'LIKE', '%' . $this->to . '%');
        }

        $travelers = $travelers->orderBy('created_at', "DESC")->paginate(20);

        return view('livewire.admin.travelers',compact('travelers'))->layout('layouts.admins.app');
    }

}
