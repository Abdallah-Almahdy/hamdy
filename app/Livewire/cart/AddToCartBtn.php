<?php

namespace App\Livewire\cart;

use App\Models\product;
use Livewire\Component;

class  AddToCartBtn extends Component
{
    public $productID;


    public function addToCart()
    {

        $product = product::find($this->productID);

        $cart = session()->get('cart', []);
        if (isset($cart[$this->productID])) {
            $cart[$this->productID] = [
                'id' => $this->productID,
                'name' => $product->name,
                'price' => $product->price,
                'photo' => $product->photo,
                'qnt' => $cart[$this->productID]['qnt'] + 1,
            ];
        } else {

            $cart[$this->productID] = [
                'id' => $this->productID,
                'name' => $product->name,
                'price' => $product->price,
                'photo' => $product->photo,
                'qnt' => 1,
            ];
        }


        session()->put('cart', $cart);
        session()->flash('done', 'تمت الإضافة بنجاح');
    }

    public function render()
    {
        return view('livewire.cart.add-to-cart-btn');
    }
}
