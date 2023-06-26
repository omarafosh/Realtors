<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdvertismentRequest;
use App\Models\Advertisment;
use Illuminate\Support\Facades\Validator;

class AdvertismentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Advertisment::orderBy('id', 'DESC')->paginate(5);
        return view('pages.advertisments.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.advertisments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdvertismentRequest $request)
    {
        $input = $request->all();
        $advertisment = Advertisment::create($input);

        // if ($request->hasFile('image') && $request->file('image')->isValid()) {

        //     $user->addMediaFromRequest('image')->usingName($user->email)->toMediaCollection('avtars');
        // }



        return redirect()->route('advertisments.index')
            ->with('success', 'Advertisment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisment $advertisment)
    {

        return view('pages.advertisments.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisment $advertisment)
    {

        return view('pages.advertisments.edit', compact('advertisment'))->with('success', 'User Created successfully');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdvertismentRequest $request, Advertisment $advertisment)
    {
        $input = $request->all();
        // if (!empty($input['password'])) {
        //     $input['password'] = Hash::make($input['password']);
        // } else {
        //     $input = $request->except('password');
        // }

        // if ($request->hasFile('image') && $request->file('image')->isValid()) {
        //     $advertisment->clearMediaCollection('avtars');
        //     $advertisment->addMediaFromRequest('image')->toMediaCollection('avtars');
        // }
        $advertisment->update($input);
        return redirect()->route('advertisments.index')
            ->with('success', 'advertisment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::find($user->id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
