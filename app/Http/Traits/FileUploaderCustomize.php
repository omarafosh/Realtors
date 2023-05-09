<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUploaderCustomize
{
    public function uploadFile($request, $data, $folder = "avtars", $disk = "avtar", $inputName = 'photo')
    {
        $files = $request->file($inputName);
        $path=$folder.'/'.$request->name;

        try {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = $data->name . '_' . $file->getClientOriginalName();
                $file->storeAs($path, $fileName, $disk);
            }
            return true;
        } catch (\Throwable $th) {
            report($th);

            return $th->getMessage();
        }
    }

    public function deleteFile($fileName,$folder = "avtars", $disk = "avtar", $inputName = 'photo')
    {
        try {


            return true;
        } catch (\Throwable $th) {
            report($th);

            return $th->getMessage();
        }
    }
}
