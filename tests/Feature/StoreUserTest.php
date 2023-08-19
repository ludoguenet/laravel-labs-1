<?php

it('can store users', function () {
    $usersData = [
        [
            'name' => fake()->name,
            'email' => fake()->email,
            'password' => fake()->password,
        ],
        [
            'name' => fake()->name,
            'email' => 'admin@test.com',
            'password' => fake()->password,
        ],
    ];

    \Pest\Laravel\post(
        uri: route('users.store'),
        data: [
            'users_data' => $usersData,
        ],
    )
        ->assertRedirect()
        ->assertSessionHasErrors('users_data.1.password');
});
