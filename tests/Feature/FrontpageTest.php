<?php

use Illuminate\Support\Facades\Storage;

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

it('shows frontpage', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSeeText('Welcome to the forest journals');
});

it('shows latest posts on frontpage', function () {
    $postStructure = new \App\PostStructure(
        title: $this->post['title'],
        categories: $this->post['categories'],
        publishedAt: $this->post['publishedAt'],
    );
    $postStructure->create();

    $response = $this->get('/');
    $response->assertSeeText('Latest posts');
    $response->assertSeeText($this->post['title']);
    $response->assertSeeText($this->post['publishedAt']);
});
