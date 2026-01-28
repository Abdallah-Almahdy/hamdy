<?php

namespace App\Livewire\Notifications;

use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class Notifications extends Component
{


    public $token;
    public $message;

    public function send()
    {


        // Define the notification payload
        $payload = [
            'message' => [
                'topic' => 'testtopic',
                'notification' => [
                    'title' => 'كل يوم',
                    'body' => $this->message
                ]
            ]
        ];
        if ($this->token) {
            // Send the notification via HTTP POST request
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' .  $this->token,
                'Content-Type' => 'application/json',
            ])->post('https://fcm.googleapis.com/v1/projects/smapp-8349a/messages:send', $payload);
        }

        session()->flash('done', 'تم إرسال الرسالة بنجاح');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.notifications.notifications');
    }
}
