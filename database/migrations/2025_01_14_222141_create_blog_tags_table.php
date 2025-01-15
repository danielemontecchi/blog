<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('blog_tags', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('slug')->unique();
			$table->unsignedInteger('views')->default(0);
		});

		Schema::create('blog_post_blog_tag', function (Blueprint $table) {
			$table->id();
			$table->foreignId('blog_post_id')->constrained('blog_posts')->cascadeOnDelete();
			$table->foreignId('blog_tag_id')->constrained('blog_tags')->cascadeOnDelete();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('blog_post_blog_tag');
		Schema::dropIfExists('blog_tags');
	}
};
