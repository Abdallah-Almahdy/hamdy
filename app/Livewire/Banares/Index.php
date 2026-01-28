<?php

namespace App\Livewire\Banares;

use App\Models\banares;
use Livewire\Component;

class Index extends Component
{
     public function delete($id)
    {
        banares::find($id)->delete();
    }
    public function render()
    {

    
        $data = banares::all();
        return view('livewire.banares.index', ['data' => $data]);
    }
}
