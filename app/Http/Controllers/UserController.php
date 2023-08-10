<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Traits\FileUploaderCustomize;
use PHPUnit\Framework\Constraint\IsFalse;


class UserController extends Controller
{
    use FileUploaderCustomize;
    /**
     * Display a listing of the resource.
     */

    public function saveImage($photos, $folder, $user)
     {
         if ($photos != null) {
             foreach ($photos as $file) {
                 $photo = new Photo;
                 if ($this->existFile($file, $folder,'avtars') == false) {
                     $imageInfo = $this->uploadFile($file, $folder);
                     if ($imageInfo['status'] == 'success') {
                         $filename = $imageInfo['filename'];
                         $path = $imageInfo['src'];
                         $source = public_path('media/' . $path);
                         $this->compressImageByGD($source, $filename);
                         $photo->photoable_id = $user->id;
                         $photo->photoable_type = User::class;
                         $photo->name = $filename;
                         $photo->path = $path;
                         $photo->group = 'user';
                         $photo->save();
                     }
                 }
             }
         }else {

           $this->deleteImages($user->id,$user->name,'avtars');
        }

     }

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
        $input['name'] = [app()->getLocale() => $input['name']];
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        // Create Data for Photos
        $photos = $request->file('photo');
        $this->saveImage($photos, $input['name'], $user);
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
        $images = Photo::where('photoable_id', $user->id)->get();
        return view('pages.users.user', compact('user', 'images'))->with('success', 'User Created successfully');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {

        $input = $request->all();
        $input['name'] = [app()->getLocale()=> $input['name']];
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = $request->except('password');
        }
        $photos = $request->file('photo');
        $this->saveImage($photos, $input['name'], $user);
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
        $this->deleteImages($user->id,$user->name,'avtars');
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
