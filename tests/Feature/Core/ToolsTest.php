<?php

use App\Models\User;

it('enabled logs viewer', function () {
	$user = User::factory()->create();

	$this->actingAs($user)
		->get(route('log-viewer.index'))
		->assertStatus(200);
});

it('enabled horizon', function () {
	$user = User::factory()->create();

	$this->actingAs($user)
		->get(route('horizon.index', ['view' => 'dashboard']))
		->assertStatus(200);
});
