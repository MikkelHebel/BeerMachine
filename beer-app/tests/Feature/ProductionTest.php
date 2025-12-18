<?php

use App\Models\User;
use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('authenticated user can view production page', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $res = $this->get('/production');

    $res->assertStatus(200);
    $res->assertSee('Beer Type');
    $res->assertSee('Quantity');
    $res->assertSee('Speed');
});

test('guest cannot view production page', function () {
    $res = $this->get('/production');

    $res->assertRedirect('/login');
});

test('progress endpoint returns batch status data', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $res = $this->getJson('/api/status/batch');
    $res->assertStatus(200);
    $res->assertJsonStructure([
        'batchId',
        'beerType',
        'speed',
        'toProduceAmount',
        'producedAmount',
        'defectiveAmount',
        'userId'
    ]);
});
