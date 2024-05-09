<?php

use Illuminate\Support\Facades\Config;

test('folder structure is available', function () {
    $markdownBaseDir = storage_path('app').'/'.Config::get('app.marker.directory');

    expect($markdownBaseDir)->toBeDirectory();
});
