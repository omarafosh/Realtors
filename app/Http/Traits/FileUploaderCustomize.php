<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUploaderCustomize
{
    /**
     * Upload a file
     *
     * @param file   $to select Name Input file
     * @param data $ to select Data For Group is The Photo
     * @param folder $ select Directory Name To Save Photo
     * @param disk $ select Disk Name
     * @author Omar Afosh <omarafosh@gmail.com>
     * @return Status
     */
    public function uploadFile($file, $data, $folder = "avtars", $disk = "avtar")
    {
        $path = $folder . '/' . $data->name;
        try {
            // $extension = $file->getClientOriginalExtension();
            $fileName = $data->name . '_' . $file->getClientOriginalName();
            $file->storeAs($path, $fileName, $disk);
            return $fileName;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deleteFile($fileName, $folder = "avtars", $disk = "avtar", $inputName = 'photo')
    {
        try {
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
