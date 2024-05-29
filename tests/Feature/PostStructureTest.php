<?php

use Symfony\Component\Yaml\Yaml;

test('structure object is complete', function () {
    $post = [
        'title' => 'My awesome post',
        'categories' => [
            'php',
            'laravel',
            'testing',
        ],
        'publishedAt' => date('Y-m-d H:i:s'),
    ];
    $postStructure = new \App\PostStructure(
        title: $post['title'],
        categories: $post['categories'],
        publishedAt: $post['publishedAt'],
    );

    expect($postStructure->title)->toBe($post['title']);
    expect($postStructure->categories)->toBe($post['categories']);
    expect($postStructure->publishedAt)->toBe($post['publishedAt']);
    expect($postStructure->slug)->toBe('my-awesome-post');
});

test('that the folder and config is created', function () {
    $post = [
        'title' => 'My awesome post',
        'categories' => [
            'php',
            'laravel',
            'testing',
        ],
        'publishedAt' => date('Y-m-d H:i:s'),
    ];
    $postStructure = new \App\PostStructure(
        title: $post['title'],
        categories: $post['categories'],
        publishedAt: $post['publishedAt'],
    );
    $postStructure->create();
    $postDir = storage_path('app').'/'.Config::get('app.marker.directory').'/'.$postStructure->slug;

    expect($postDir)->toBeDirectory();
    expect($postDir.'/config.yaml')->toBeFile();

    $post['slug'] = $postStructure->slug;
    $config = Yaml::parseFile($postDir.'/config.yaml');

    expect($config)->toMatchArray($post);
});
