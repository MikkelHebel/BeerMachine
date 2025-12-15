<?php

use App\Models\User;
use App\Models\Batch;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

test('return null if fewer than three batches exist for the given speed', function () {
    Batch::factory()->count(2)->create([
        'speed' => 450,
        'amount_completed' => 100,
        'failed' => 10,
    ]);

    $res = $this->getJson('/api/expected-failure-rate?speed=450');

    $res->assertStatus(200)
        ->assertJson([
            'expectedFailureRate' => null,
            'basedOn' => 2,
        ]);
});

test('limits to a maximum of ten batches', function () {
    Batch::factory()->count(15)->create([
        'speed' => 450,
        'amount_completed' => 100,
        'failed' => 10,
    ]);

    $res = $this->getJson('/api/expected-failure-rate?speed=450');

    $res->assertJson([
        'basedOn' => 10,
    ]);

    expect($res->json('expectedFailureRate'))->toBeApproximately(0.10, 0.00001);
});

test('calculates correct average failure rate for matching speed', function () {
    Batch::factory()->create([
        'speed' => 450,
        'amount_completed' => 100,
        'failed' => 10,
    ]);

    Batch::factory()->create([
        'speed' => 450,
        'amount_completed' => 200,
        'failed' => 20,
    ]);

    Batch::factory()->create([
        'speed' => 450,
        'amount_completed' => 50,
        'failed' => 5,
    ]);

    $res = $this->getJson('/api/expected-failure-rate?speed=450');

    $res->assertStatus(200)
        ->assertJson([
            'basedOn' => 3,
        ]);

    expect($res->json('expectedFailureRate'))->toBeApproximately(0.10, 0.00001);
});

test('only uses batches with the requested speed', function () {
    Batch::factory()->count(5)->create([
        'speed' => 300,
        'amount_completed' => 100,
        'failed' => 50,
    ]);

    Batch::factory()->count(3)->create([
        'speed' => 450,
        'amount_completed' => 100,
        'failed' => 10,
    ]);

    $res = $this->getJson('/api/expected-failure-rate?speed=450');

    $res->assertJson([
        'basedOn' => 3,
    ]);

    expect($res->json('expectedFailureRate'))->toBeApproximately(0.10, 0.00001);
});

test('ignores batches with zero completed amount', function () {
    Batch::factory()->create([
        'speed' => 450,
        'amount_completed' => 0,
        'failed' => 10,
    ]);

    Batch::factory()->count(3)->create([
        'speed' => 450,
        'amount_completed' => 100,
        'failed' => 10,
    ]);

    $res = $this->getJson('/api/expected-failure-rate?speed=450');

    $res->assertJson([
        'basedOn' => 3,
    ]);

    expect($res->json('expectedFailureRate'))->toBeApproximately(0.10, 0.00001);
});

test('returns error if speed parameter is missing', function () {
    $res = $this->getJson('/api/expected-failure-rate');

    $res->assertStatus(400)
        ->assertJson([
            'error' => true,
            'message' => 'Missing speed parameter!'
        ]);
});

