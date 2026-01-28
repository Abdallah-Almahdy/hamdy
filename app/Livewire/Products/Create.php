<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\company;
use App\Models\product;
use App\Models\section;
use Livewire\WithFileUploads;
use App\Models\subSection;

class create  extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $photo;
    public $section;
    public $stock;
    public $stockQnt;
    public $bar_code;
    public $description;
    public $active;
    public $comeFirst;
    public $bestSaller;
    public $is_avaliable;

    public $showStockField = true;


    public function create()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'section' => 'required',
            'photo' => 'image',
        ]);
        $configs = \App\Models\Config::first();
        if($configs->withQnt == 'no')
            {
            $this->stockQnt = 100;
            }else{
                if($this->stockQnt == 0){
                    if($configs->qntStatus == 'unavailable'){
                        $this->is_avaliable = false;

                    }elseif($configs->qntStatus == 'inacitive'){
                        $this->active = false;
                        $this->is_avaliable = false;
                    }else{
                    $this->active = false;
                    $this->is_avaliable = false;
                }
            }
            }
        $data = [
            'name' => $this->name,
            'price' => $this->price,
            'photo' => $this->photo->storeAs('products', rand() . '.jpg', 'my_public'),
            'section_id' => $this->section,
            'qnt' => $this->stockQnt ?? 0,
            'bar_code' => $this->bar_code,
            'description' => $this->description,
            'come_first' => $this->comeFirst ?? false,
            'best_saller' => $this->bestSaller ?? false,
            'active' => $this->active ?? true,
            'is_avaliable' => $this->is_avaliable ?? true,
        ];


        $product = product::create($data);

        session()->flash('done', 'تم إضافة منتج جديد بنجاح');
        $this->reset();
    }

// StockComponent.php أو أي مكون لديك


    public function render()
    {
        $sections = subSection::all();
        $companies = company::all();
        return view('livewire.products.create', [
            'sections' => $sections,
            'companies' => $companies,
        ]);
    }
}
