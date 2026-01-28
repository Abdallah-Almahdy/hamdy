<?php

namespace App\Livewire\cart;

use Nafezly\Payments\Classes\PaymobPayment;
use App\Models\product;
use Illuminate\Http\Request;
use Livewire\Component;

class index extends Component
{

    public function try()
    {

        session_start();
        dump($_SESSION["cart"]);
    }


    public function plus($id)
    {

        $cart = session()->get('cart', []);
        $product = product::find($id);
        $cart[$id] = [
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'photo' => $product->photo,
            'qnt' => $cart[$id]['qnt'] + 1,
        ];

        session()->put('cart', $cart);
    }

    public function minus($id)
    {



        $cart = session()->get('cart', []);
        $product = product::find($id);
        $cart[$id] = [
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'photo' => $product->photo,
            'qnt' => $cart[$id]['qnt'] - 1,
        ];

        session()->put('cart', $cart);
    }


    public function pay(Request $request)
    {



        $payment = new PaymobPayment();
        $response = $payment
            ->setUserFirstName("ammar")
            ->setUserLastName("khaled")
            ->setUserEmail("ammar@email.com")
            ->setUserPhone("01020564328")
            ->setAmount("400")
            ->pay();


        // dd($response);
    }


    public function render()
    {





        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart  as $product) {
            $total += $product['price'] * $product['qnt'];
        }






        return view('livewire.cart.index', ['data' => $cart, 'total' => $total]);
    }
}
