<?php

namespace App\Http\Livewire\Site;

use App\Models\Traveler;
use Livewire\Component;

class Travelers extends Component
{
    public $traveler ;

    public function store()
    {
        $this->validate([

            'traveler.storage' => 'required',
            'traveler.weight' => 'required',
            'traveler.date_travel' => 'required',
            'traveler.form' => 'required',
            'traveler.to' => 'required',
            'traveler.price' => 'required|integer|min:50',
            'traveler.checkbox1' => 'required',
            'traveler.checkbox2' => 'required',
            'traveler.checkbox3' => 'required',

        ]);

        $this->traveler['user_id'] =  auth()->user()->id;

        $traveler = Traveler::create($this->traveler);

        session()->flash('success', 'تم الاضافة بنجاح  ');

        return redirect()->route('site.general-schedules');
    }

    public function render()
    {
        return view('livewire.site.travelers')->layout('layouts.site.app');
    }

}
