<?php

it('enabled logs viewer', function () {
	$this->get(route('log-viewer.index'))
		->assertStatus(200);
});
