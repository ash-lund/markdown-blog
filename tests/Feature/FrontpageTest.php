<?php

it('shows frontpage', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSeeText('Welcome to the forest journals');
});

it('shows latest posts on frontpage', function () {
    $response = $this->get('/');

    $response->assertSeeText('Latest posts');
    $response->assertSeeText('This is post no. 2');
    $response->assertSeeText('This is post no. 1');
});
