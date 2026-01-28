<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\section;

class homeScreenController extends Controller
{
    public function support()
    {
        return view('front.support');
    }
    public function index()
    {
        $sections = section::take(10)->get();
        $products = product::take(10)->get();
        return view('front.FrontendHome', ['sections' => $sections, 'products' => $products]);
    }


    public function clientShowProductPage($productID)
    {

        $product = product::find($productID);
        $relevantProducts = product::where(['section_id' => $product->section_id])->take(10)->get();
        return view('front.product.showProduct', ['product' => $product, 'relevantProducts' => $relevantProducts]);
    }


    public function clientSectionProducts($sectionID)
    {
        $products = product::where(['section_id' => $sectionID])->get();
        return view('front.sections.showAllProducs', ['products' => $products]);
    }


    public function cart()
    {

        return view('front.cart.index');
    }
}
