<?php

namespace App\Livewire\Products;

use App\Models\product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $data;
    public $sections;
    public $name;
    public $price;
    public $photo;
    public $description;
    public $section;
    public $qnt;
    public $offer_rate;
    public $bestSaller;
    public $comeFirst;
    public $active;
    public $is_avaliable;

    public function mount($data)
    {

        $this->bestSaller = (bool)$data->best_saller;
        $this->comeFirst = (bool) $data->come_first;
        $this->qnt = (bool)$data->qnt;
        $this->active = (bool)$data->active;
        $this->is_avaliable = (bool) $data->is_avaliable;
    }


    public function update()
    {
        $product = product::find($this->data->id);

        if ($this->name) {
            $this->validate(['name' => 'string',]);
            $product->name = $this->name;
        }


        if ($this->price) {
            $this->validate(['price' => 'required|numeric']);
            $product->price = $this->price;
        }

        if ($this->section) {
            $this->validate(['section' => 'integer',]);
            $product->section_id = $this->section;
        }
        if ($this->description) {
            $this->validate(['description' => 'string',]);
            $product->description = $this->description;
        }


        if ($this->photo) {
            $this->validate(['photo' => 'image|mimes:jpeg,jpg,png',]);
            $product->photo = $this->photo->storeAs('products', rand() . '.jpg', 'my_public');
        }

        if ($this->offer_rate + 0 === 0) {

            $product->offer_rate = 0;
        }
        if ($this->offer_rate) {
            if ($this->offer_rate + 0 > 0) {
                $this->validate(['offer_rate' => 'integer',]);
                $product->offer_rate = $this->offer_rate;
            }
        }

        $product->qnt = $this->qnt;
        $product->best_saller = $this->bestSaller;
        $product->come_first = $this->comeFirst;
        $product->is_avaliable = $this->is_avaliable;
        $product->active = $this->active;


        $config = \App\Models\Config::first();

        if ($config->withQnt == 'yes') {

            if ($config->qntStatus == 'unavailable') {
                if ($this->qnt == 0) {
                    $product->is_avaliable = 0;
                    $product->active = 1;
                } else {
                    $product->is_avaliable = $this->is_avaliable;

                }
            } elseif ($config->qntStatus == 'inactive') {
                if ($this->qnt + 0 > 0) {
                    $product->active = 1;
                    $product->is_avaliable = 1;
                } else {
                    $product->active = 0;
                }
            } elseif ($config->qntStatus == 'both') {
                $product->is_avaliable = 0;
                $product->active = 0;
            }
        }





        $product->save();

        $this->redirectRoute('products.index');
    }

    public function render()
    {

        return view('livewire.products.edit');
    }
}
