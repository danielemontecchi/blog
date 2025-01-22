<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('blog_categories', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('slug')->unique();
			$table->string('icon')->nullable();
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->boolean('is_featured')->default(false);
			$table->unsignedSmallInteger('order')->default(99);
		});

		Schema::create('blog_category_blog_post', function (Blueprint $table) {
			$table->id();
			$table->foreignId('blog_category_id')->constrained()->cascadeOnDelete();
			$table->foreignId('blog_post_id')->constrained()->cascadeOnDelete();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('blog_category_blog_post');
		Schema::dropIfExists('blog_categories');
	}
};
