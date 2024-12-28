<?php
it('displays the home page', function () {
	$this->get(route('home'))
		->assertStatus(200)
		->assertSee('Home page');
});
