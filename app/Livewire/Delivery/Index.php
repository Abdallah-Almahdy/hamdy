<?php

namespace App\Livewire\Delivery;

use App\Models\delivery;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Index extends Component
{
    public $name;
    public $delivery_price;
    public $edit_id;
    public $search = '';
    public $deliveries = [];
public $is_free;
    protected $rules = [
        'name' => 'required|string|max:255',
        'delivery_price' => 'required|numeric|min:1',
    ];

  public function handleFree()
    {
         if ($this->is_free == 1) {
            delivery::where('id', '>=', 1)->update(['is_free' => 1]);
            session()->flash('message', 'تم  تفعيل الدليفري المجاني');
        } elseif ($this->is_free == 2) {
            delivery::where('id', '>=', 1)->update(['is_free' => 0]);
            session()->flash('message', 'تم  تعطيل الدليفري المجاني');
        }
    }
  
    public function addDelivery()
    {
        $this->validate();

        Delivery::create([
            'name' => $this->name,
            'delivery_price' => $this->delivery_price,
            'active' => 1,
        ]);

        session()->flash('message', 'تم الإضافة بنجاح');

        $this->reset(['name', 'delivery_price']);
    }

    public function editDelivery($id)
    {
        $delivery = Delivery::findOrFail($id);
        $this->edit_id = $delivery->id;
        $this->name = $delivery->name;
        $this->delivery_price = $delivery->delivery_price;
    }

    public function updateDelivery()
    {
        $this->validate();

        $delivery = Delivery::findOrFail($this->edit_id);
        $delivery->update([
            'name' => $this->name,
            'delivery_price' => $this->delivery_price,
        ]);

        session()->flash('message', 'تم التعديل بنجاح');

        $this->reset(['name', 'delivery_price', 'edit_id']);
    }

    public function cancelEdit()
    {
        $this->reset(['name', 'delivery_price', 'edit_id']);
    }
    public function deleteDelivery($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();

        session()->flash('message', 'تم الحذف بنجاح');
    }
    public function makeSearch()
    {
        $this->deliveries = Delivery::where('name', 'like', '%' . $this->search . '%')
            ->get();
    }
    #[Layout('admin.livewireLayout')]

    public function render()
    {
        count($this->deliveries) == 0 && $this->search == '' ? $this->deliveries = Delivery::all() : $this->deliveries;

        return view('livewire.delivery.index', [
            'deliveries' => $this->deliveries,
        ]);
    }
}
