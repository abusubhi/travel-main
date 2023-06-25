<?php

namespace App\Http\Livewire\Site;

use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{

    public $messageText;

    public function render()
    {
        $messages = Message::with('user')->latest()->take(10)->get()->sortBy('id');

        return view('livewire.site.chat', compact('messages'))->layout('layouts.site.app');
    }

    public function sendMessage()
    {

        Message::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }

}
