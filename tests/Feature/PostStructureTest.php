<?php

use App\PostStructure;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;

beforeEach(function () {
    $this->post = [
        'title' => 'My awesome post with ÆØÅ',
        'categories' => [
            'php',
            'laravel',
            'testing',
        ],
        'publishedAt' => date('Y-m-d H:i:s'),
    ];
});

afterAll(function () {
    $postDir = Storage::disk('marker')->path('my-awesome-post-with-aeoeaa');
    if (is_dir($postDir)) {
        Storage::disk('marker')->deleteDirectory('my-awesome-post-with-aeoeaa');
    }
});

test('slug is created from title without special characters', function () {
    $postStructure = new PostStructure(
        title: $this->post['title'],
        categories: $this->post['categories'],
        publishedAt: $this->post['publishedAt'],
    );

    expect($postStructure->slug)->toBe('my-awesome-post-with-aeoeaa');
});

test('structure object is complete', function () {
    $postStructure = new \App\PostStructure(
        title: $this->post['title'],
        categories: $this->post['categories'],
        publishedAt: $this->post['publishedAt'],
    );

    expect($postStructure->title)->toBe($this->post['title']);
    expect($postStructure->categories)->toBe($this->post['categories']);
    expect($postStructure->publishedAt)->toBe($this->post['publishedAt']);
});

test('that the folder, config and markdown file is created', function () {
    $postStructure = new \App\PostStructure(
        title: $this->post['title'],
        categories: $this->post['categories'],
        publishedAt: $this->post['publishedAt'],
    );
    $postStructure->create();

    $postDir = Storage::disk('marker')->path($postStructure->slug);
    expect($postDir)->toBeDirectory();
    expect($postDir.'/config.yaml')->toBeFile();
    expect($postDir.'/post.md')->toBeFile();

    $this->post['slug'] = $postStructure->slug;
    $config = Yaml::parseFile($postDir.'/config.yaml');

    expect($config)->toMatchArray($this->post);
});
