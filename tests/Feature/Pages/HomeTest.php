<?php
it('displays the home page', function () {
	$this->get(route('home'))
		->assertStatus(200)
		->assertSee('Welcome to the Home Page');
});
