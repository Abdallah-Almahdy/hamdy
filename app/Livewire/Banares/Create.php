<?php

namespace App\Livewire\Banares;

use App\Models\banares;
use App\Models\product;
use App\Models\section;
use App\Models\subSection;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $photo;
    public $click;
    public $adLink;
    public $main_sec_id;
    public $sub_sec_id;
    public $product_id;


    public function create()
    {
        $data = [];
        $this->validate([
            'photo' => 'image',
            'click' => 'required',
        ]);

        // dd($this->adLink);
        if ($this->click == 1) {
            $this->validate(['adLink' => 'required']);
            // 1 main
            // 2 sub
            // 3 product
            // 3 offers

            switch ($this->adLink + 0) {

                case 1:
                    // dd($this->adLink);
                    $this->validate(['main_sec_id' => 'required']);
                    $data = [
                        'main_sec_id' => $this->main_sec_id,
                        'click' => $this->click,
                    ];
                    break;
                case 2:
                    $this->validate(['sub_sec_id' => 'required']);

                    $data = [
                        'sub_sec_id' => $this->sub_sec_id,
                        'click' => $this->click,
                    ];
                    break;
                case 3:
                    $this->validate(['product_id' => 'required']);
                    $data = [
                        'product_id' => $this->product_id,
                        'click' => $this->click,
                    ];
                    break;
                case 4:
                    $data = [
                        'offers' => 1,
                        'click' => $this->click,
                    ];
                    break;
                default:
                    $data = [
                        'click' => $this->click,
                    ];
                    break;
            }
        }

        $data['path'] =  $this->photo->storeAs('banares', rand() . '.jpg', 'my_public');


        banares::create($data);



        session()->flash('done', 'تم إضافة إعلان جديد بنجاح');
        $this->reset();
    }
    public function render()
    {

        $main_secitons = section::all();
        $sub_secitons = subSection::all();
        $products = product::all();
        return view('livewire.banares.create', [
            'main_secitons' => $main_secitons,
            'sub_secitons' => $sub_secitons,
            'products' => $products
        ]);
    }
}
