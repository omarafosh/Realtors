<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::all();
        return view('pages.settings.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingsRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            foreach ($request->lang_native as $key => $item) {
                $setting = new Setting;
                $setting->lang_name = $request->lang_name[$key];
                $setting->lang_native = $request->lang_native[$key];
                $setting->lang_local = $request->lang_local[$key];
                $setting->status = '0';
                $setting->save();
            }
            return response()->json(['success' => 'language created successfully.']);
        } else {
            return response()->json(['error' => $validated->errors()->all()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
