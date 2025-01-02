<?php

use App\Models\Page;

test('show dynamic pages', function () {
	$pages = Page::select('slug')->get();

	foreach ($pages as $page) {
		$this->get(route('pages.page', ['slug' => $page->slug]))
			->assertStatus(200);
	}
});
