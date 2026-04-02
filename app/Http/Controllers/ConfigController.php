<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $config = \App\Models\Config::first();

        return response()->json($config);
    }
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
            'color' => $request->color,
            'maintenance_mode' => $request->maintenance_mode,
            'maintenance_message' => $request->maintenance_message,
            'min_supported_version' => $request->min_supported_version,
            'exact_blocked_version' => $request->exact_blocked_version,
        ]);

        return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح');
    }
}
