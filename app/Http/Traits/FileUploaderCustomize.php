<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\DirectoryExists;

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
            $fileName = $data->name . '_' . $file->getClientOriginalName();
            $ImageSrc = $file->storeAs($path, $fileName, $disk);
            return ['src' => $path, 'filename' => $fileName];
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function compressImage($source, $destination, $quality)
    {
        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
        } else {
            return false;
        }

        imagejpeg($image, $destination, $quality);
        imagedestroy($image);

        return true;
    }
    public function compressImageByGD($source, $filename, $newWidth = 100, $newHeight = 100, $quality = 90)
    {

        $fullPathSrc = $source . '/' . $filename;

        $imageInfo = getimagesize($fullPathSrc);

        if ($imageInfo['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($fullPathSrc);
        } elseif ($imageInfo['mime'] == 'image/gif') {
            $image = imagecreatefromgif($fullPathSrc);
        } elseif ($imageInfo['mime'] == 'image/png') {
            $image = imagecreatefrompng($fullPathSrc);
        } else {
            return false;
        }

        //   GD تحويل الصورة الى شكل كائن
        $sourceImage = imagecreatefromjpeg($fullPathSrc);

        // إنشاء نسخة جديدة من الصورة بأبعاد محددة
        $compresseImage = imagecreatetruecolor($newWidth, $newHeight);

        $originalWidth = $imageInfo[0];
        $originalHeight = $imageInfo[1];

        // نسخ الصورة الأصلية إلى الصورة المضغوطة بأبعادها الجديدة
        imagecopyresampled($compresseImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

        if (!is_dir($source . '/' . 'thumb')) {
            mkdir($source . '/' . 'thumb', 0755, true);
        }

        $fullPathDes = $source . '/thumb/' . $filename;

        // حفظ الصورة المضغوطة بمستوى ضغط محدد (0 يعني ضغط بدرجة عالية جدًا و100 يعني عدم وجود ضغط)
        imagejpeg($compresseImage, $fullPathDes, $quality);

        // حرّر الذاكرة المخصصة للصور
        imagedestroy($sourceImage);
        imagedestroy($compresseImage);
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
