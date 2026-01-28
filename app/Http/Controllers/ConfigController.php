<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
   public function edit()
   {
       $config = \App\Models\Config::first();

       return view('pages.configs.edit', compact('config'));
   }

    public function update(Request $request)
    {
         $config = \App\Models\Config::first();

         $request->validate([
              'withQnt' => 'required|in:yes,no',
              'qntStatus' => 'required|in:unavailable,inactive,both',
         ]);

         $config->update([
              'withQnt' => $request->withQnt,
              'qntStatus' => $request->qntStatus,
         ]);

         return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح');
    }
}
