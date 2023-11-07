<?php

use Illuminate\Support\Facades\File;

function deleteFileStorage($image) {

    $imageThumbs = dirname($image) . '/thumbs/' . basename($image);
    File::delete(public_path($image));
    File::delete(public_path($imageThumbs));

}
