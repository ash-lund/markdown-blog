<?php

test('folder structure is available', function () {
    $markdownBaseDir = storage_path('app').'/'.env('MARKDOWN_BASE_DIR');
    expect($markdownBaseDir)->toBeDirectory();
});
