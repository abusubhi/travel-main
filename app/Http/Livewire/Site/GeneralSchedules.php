<?php

namespace App\Http\Livewire\Site;

use App\Models\Traveler;
use Livewire\Component;

class GeneralSchedules extends Component
{

    public $travelers;

    function mount(){

        $this->travelers = Traveler::get();

   }

    public function render()
    {
        return view('livewire.site.general-schedules')->layout('layouts.site.app');
    }
}
