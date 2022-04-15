<?php

class Functions {
    public static function cropAndResizeImage($img, $name, $width, $height, $folder_name)
    {
        $img->move(base_path().'/public/img/' . $folder_name . '/', $name);

        if(Image::make(sprintf('img/' . $folder_name . '/%s', $name))->width() < Image::make(sprintf('img/' . $folder_name . '/%s', $name))->height()) {
            Image::make(sprintf('img/' . $folder_name . '/%s', $name))->resize($width, null, function ($constraint) { $constraint->aspectRatio(); })->save();
        }

        Image::make(sprintf('img/' . $folder_name . '/%s', $name))->crop($width, $height)->save();

        return 1;
    }
}
