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
		Schema::create('blog_posts', function (Blueprint $table) {
			$table->id();
			$table->foreignId('author_id')
				->nullable()
				->constrained('users')
				->nullOnDelete();
			$table->string('sync_reference_id')->nullable();
			$table->string('title');
			$table->string('slug')->unique();
			$table->string('intro');
			$table->text('content');
			$table->string('cover')->nullable();
			$table->unsignedInteger('views')->default(0);
			$table->timestamp('published_at')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('blog_posts');
	}
};
