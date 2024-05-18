<?php

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
