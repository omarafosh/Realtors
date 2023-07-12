<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Traits\FileUploaderCustomize;

class UserController extends Controller
{
    use FileUploaderCustomize;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::with('photo')->orderBy('id', 'DESC')->paginate(5);

        return view('pages.users.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.users.user');
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(UserRequest $request)
    {
        // Create Data for User
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        // Create Data for Photos

        $data = User::find($user->id);
        $photos = $request->file('photo');
        if ($photos != null) {
            foreach ($photos as $file) {
                $photo = new Photo;
                $imageInfo = $this->uploadFile($file, $data);

                if ($imageInfo['status'] == 'success') {
                    $filename = $imageInfo['filename'];
                    $path = $imageInfo['src'];
                    $source = public_path('media/' . $path);
                    $this->compressImageByGD($source, $filename);
                    $photo->user_id = $user->id;
                    $photo->name = $filename;
                    $photo->path = $path;
                    $photo->group = 'users';
                    $photo->save();
                } else {
                    continue;
                }
            }
        }
        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }




    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        return view('pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $images = Photo::where('user_id', $user->id)->get();
        return view('pages.users.user', compact('user', 'images'))->with('success', 'User Created successfully');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {

        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = $request->except('password');
        }


        $data = User::find($user->id);
        $this->deleteFile('avtars', $data);
        Photo::where('user_id', $user->id)->delete();
        $photos = $request->file('photo');
        if ($photos != null) {
            foreach ($photos as $file) {
                $photo = new Photo;
                $imageInfo = $this->uploadFile($file, $data);
                if ($imageInfo['status'] == 'success') {
                    $filename = $imageInfo['filename'];
                    $path = $imageInfo['src'];
                    $source = public_path('media/' . $path);
                    $this->compressImageByGD($source, $filename);
                    $photo->user_id = $user->id;
                    $photo->name = $filename;
                    $photo->path = $path;
                    $photo->group = 'users';
                    $photo->save();
                } else {
                    continue;
                }
            }
        }
       
        $user->update($input);
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
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
    // public function search(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = User::with('media')->where('name', 'LIKE', '%' . $request->search . "%")->get();
    //     }
    //     return response()->json($data);
    //     //    return view('pages.users.search', compact('data'))->render();
    // }
}
