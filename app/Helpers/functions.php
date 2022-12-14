<?php
    function updateImage($imageFile, $imageName, $imagePath) {
        $file = $imageFile;
        $ext = $file->extension();
        $fileName =  $imageName . '.' . $ext;
        $file->move(public_path($imagePath), $fileName);

        return $imagePath . '/' . $fileName;
    }

    function formartPriceVnd($number) {
        return number_format($number, 0, '', ',') . ' VND';
    }
