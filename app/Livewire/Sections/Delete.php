<?php

namespace App\Livewire\Sections;

use Illuminate\Support\Facades\Storage;
use App\Models\section;
use Livewire\Component;

class DeleteSection extends Component
{
    public $id;

    public function delete($id, $photo)
    {

        section::destroy($id);

        Storage::disk('public')->delete('uploads/' . $photo);
    }

    public function render()
    {

        return view('livewire.sections.delete');
    }
}
