<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('requires the password confirmation to match', function () {
    $response = $this->post('/register', [
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'email' => 'jane@example.com',
        'role' => 'employee',
        'password' => 'StrongPass123!',
        'password_confirmation' => 'DifferentPass123!',
    ]);

    $response->assertSessionHasErrors('password');
    $this->assertDatabaseMissing('users', ['email' => 'jane@example.com']);
});
