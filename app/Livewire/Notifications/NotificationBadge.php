<?php

namespace App\Livewire\Notifications;

use App\Models\order;
use Livewire\Component;

class NotificationBadge extends Component
{
    protected $listeners = ['orderCountUpdated'];
    public $oldOrderCount;
    public $orderCount;

    public function mount()
    {
        $this->oldOrderCount = order::where('status', 0)->count(); // Initialize with the current count
        $this->updateOrderCount();
    }

    public function updateOrderCount($count = null)
    {
        $this->orderCount = $count ?? order::where('status', 0)->count();

        // Check if the order count has changed
        if ($this->orderCount !== $this->oldOrderCount) {
            // $this->dispatch('play-sound');
            $this->oldOrderCount = $this->orderCount; // Update the old count after emitting
        }
    }


    public function render()
    {
        return view('livewire.notifications.notification-badge');
    }
}
