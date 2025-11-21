<?php
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()
        ->state([
            'email' => 'test@example.com',
            'password' => Hash::make('password123456'), // ← OVERSKRIV PASSWORD
        ])
        ->create();
});

test('user logins with correct credentials', function () {
    $response = $this->post('/login', [
        'email' => 'test@example.com',
        'password' => 'password123456',
    ]);

    $response->assertRedirect('/');
    $this->assertAuthenticatedAs($this->user);
});

test('logged in user can logout', function () {
    $response = $this->post('/login', [
        'email' => 'test@example.com',
        'password' => 'password123456',
    ]);

    $response = $this->post('/logout');

    $response->assertRedirect('/login');
    $this->assertGuest();
});

test('shows error with wrong password', function () {
    $response = $this->post('/login', [
        'email' => 'test@example.com',
        'password' => 'wrongPassword',
    ]);

    $response->assertSessionHasErrors(['credentials' => 'Sorry, incorrect credentials']);
    $this->assertGuest();
});
