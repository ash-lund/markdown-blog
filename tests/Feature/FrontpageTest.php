<?php

it('shows frontpage', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSeeText('Welcome to the forest journals');
});

it('shows latest posts on frontpage', function () {
    $response = $this->get('/');
    $response->assertSeeText('Latest posts');

    expect(substr_count($response->getContent(), '<h1>') >= 2)->toBe(true);
});
