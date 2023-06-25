<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class Contacts extends Component
{



    public $email ,$name, $surname ,$message , $deleteId ,$search ;

    public function search()
    {

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }


    public function delete()
    {

        $contacts = Contact::findOrFail($this->deleteId);

        if (!auth()->user()->can('Manger contacts')) {
            session()->flash('danger', 'contact does not have the right permissions.');
            return redirect()->route('admin.contacts');
        }

        $contacts->delete();
        session()->flash('success', 'contact successfully Deleted.');
        return redirect()->route('admin.contacts');

    }

    public function render()
    {
        $contacts = Contact::query();

        if ($this->name) {
            $contacts = $contacts->where('name', 'LIKE', '%' . $this->name . '%');
        }

        if ($this->email) {
            $contacts = $contacts->where('email', 'LIKE', '%' . $this->email . '%');
        }

        if ($this->surname) {
            $contacts = $contacts->where('surname', 'LIKE', '%' . $this->surname . '%');
        }

        if ($this->message) {
            $contacts = $contacts->where('message', 'LIKE', '%' . $this->message . '%');
        }

        $contacts = $contacts->orderBy('created_at', "DESC")->paginate(20);

        return view('livewire.admin.contacts',compact('contacts'))->layout('layouts.admins.app');
    }


}
