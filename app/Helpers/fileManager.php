<?php

function deleteImage($url)
{
    $urlArray = explode('/', $url);
    $path = 'assets/image/' . end($urlArray);
    \Illuminate\Support\Facades\File::delete($path);
}
