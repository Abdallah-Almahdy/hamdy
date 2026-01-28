<?php

namespace App\Livewire\Sections;

use App\Models\section;
use App\Models\subSection;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $photo;
    public $description;
    public $sectionType;
    public $mainSection;

    public function create()
    {

        $this->validate([
            'name' => 'required',
            'description' => 'sometimes',
            'photo' => 'image|mimes:jpeg,jpg,png',
        ]);

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'photo' => $this->photo->storeAs('sections', rand() . '.jpg', 'my_public'),
        ];

        if ($this->sectionType == 'sub') {
            $this->validate(['mainSection' => 'required']);
            $data['main_section_id'] = $this->mainSection;
            $data['photo'] = $this->photo->storeAs('sub_sections', rand() . '.jpg', 'my_public');
            subSection::create($data);
        } else {
            section::create($data);
        }

        session()->flash('done', 'تم إتشاء قسم جديد بنجاح');
        $this->reset();
    }

    public function render()
    {
        $sections = section::all();
        return view('livewire.sections.create', [
            'sections' => $sections
        ]);
    }
}
