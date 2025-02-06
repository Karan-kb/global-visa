<?php

namespace App\Models;

use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResizeImg extends Model
{
    use HasFactory;

    public static function resizeImage($max_width, $max_height, $image, $filename)
    {
        // Load the image using the Image facade
        $img = Image::make($image);

        // Get the original dimensions
        $width = $img->width();
        $height = $img->height();

        // Calculate new dimensions while maintaining aspect ratio
        $width_new = round($height * $max_width / $max_height);
        $height_new = round($width * $max_height / $max_width);

        if ($width_new > $width) {
            // Cut point by height
            $h_point = round(($height - $height_new) / 2);

            // Crop and resize the image
            $img->crop($width, $height_new, 0, $h_point)
                ->resize($max_width, $max_height)
                ->save(storage_path('app/' . $filename));
        } else {
            // Cut point by width
            $w_point = round(($width - $width_new) / 2);

            // Crop and resize the image
            $img->crop($width_new, $height, $w_point, 0)
                ->resize($max_width, $max_height)
                ->save(storage_path('app/' . $filename));
        }
    }
}