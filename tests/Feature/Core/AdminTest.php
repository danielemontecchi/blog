<?php

it('enabled admin panel', function () {
	$this->get(route('filament.admin.auth.login'))
		->assertStatus(200);
});
