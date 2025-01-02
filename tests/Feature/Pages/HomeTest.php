<?php

it('displays the home page', function () {
	$this->get(route('pages.home'))
		->assertStatus(200);
});
