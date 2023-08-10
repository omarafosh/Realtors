<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Requests\LanguagesRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('pages.languages.index', compact('languages'));
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
    public function store(LanguagesRequest $request)
    {
        $Validator=$request->validated();
        if (!$Validator) {

            redirect(route('languages.index'))
            ->withErrors($Validator->errors)
            ->withInput($request->all());
        }
        foreach ($Validator['languages'] as $key => $item) {
            Language::create($Validator['languages'][$key]);
        }
        return redirect()->route('languages.index')
            ->with('success', 'languages updated successfully');
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
