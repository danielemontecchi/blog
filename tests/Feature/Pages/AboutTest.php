<?php
it('displays the about page', function () {
	$this->get(route('about'))
		->assertStatus(200)
		->assertSee('About page');
});
