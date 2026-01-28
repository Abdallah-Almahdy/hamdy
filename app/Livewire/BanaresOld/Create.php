<?php

namespace App\Livewire\Banares;

use App\Models\banares;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $photo;


    public function create()
    {
        $this->validate([
            'photo' => 'image',
        ]);

        $data = [
            'path' => $this->photo->storeAs('banares', rand() . '.jpg', 'my_public'),
        ];

        banares::create($data);

        session()->flash('done', 'تم إضافة إعلان جديد بنجاح');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.banares.create');
    }
}
