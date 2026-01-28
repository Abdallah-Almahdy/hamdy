<?php

namespace App\Livewire\Sections;

use App\Models\section;
use Livewire\Component;
use App\Models\subSection;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $name;
    public $photo;

    public $data;


    public function update()
    {


        $ismain = section::find($this->data->id);

        if ($ismain) {
            $section = section::find($this->data->id);
            if ($this->name) {
                $this->validate(['name' => 'string',]);
                $section->name = $this->name;
            }

            if ($this->photo) {
                $this->validate(['photo' => 'image|mimes:jpeg,jpg,png',]);
                $section->photo = $this->photo->storeAs('sections', rand() . '.jpg', 'my_public');
            }


            $section->save();
        } else {
            $subSection = subSection::find($this->data->id);
            if ($this->name) {
                $this->validate(['name' => 'string',]);
                $subSection->name = $this->name;
            }

            if ($this->photo) {
                $this->validate(['photo' => 'image|mimes:jpeg,jpg,png',]);
                $subSection->photo = $this->photo->storeAs('sections', rand() . '.jpg', 'my_public');
            }
            $subSection->save();
        }



        $this->redirectRoute('sections.index');
    }


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
            'photo' => $this->photo->storeAs('uploads', $this->name . '.jpg', 'public'),
        ];
        section::create($data);

        session()->flash('done', 'تم إتشاء قسم جديد بنجاح');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.sections.edit');
    }
}
