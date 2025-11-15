<?php

test('the application returns a successful response', function () {
    $response = $this->get('/login');
    $response->assertStatus(200);

    $response = $this->get('/');
    $response->assertStatus(302);
});
