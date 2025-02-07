<?php

use App\Models\User;

it('enabled logs viewer', function () {
	$user = User::factory()->create();

	$this->actingAs($user)
		->get(route('log-viewer.index'))
		->assertStatus(200);
});
