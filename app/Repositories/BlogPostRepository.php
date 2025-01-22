<?php
namespace App\Repositories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class BlogPostRepository
{
	/**
	 * Retrieve related posts based on shared tags.
	 *
	 * @param BlogPost $post
	 * @param int $limit
	 * @return array<BlogPost>
	 */
	public function relatedPosts(BlogPost $post, int $limit = 3): array
	{
		/** @var Collection<int, int> $tagIds */
		$tagIds = $post->tags()->pluck('blog_tags.id')->toArray();

		return BlogPost::where('id', '!=', $post->id)
			->whereHas('tags', function (Builder $query) use ($tagIds) {
				$query->whereIn('blog_tag_id', $tagIds);
			})
			->withCount(['tags as shared_tags_count' => function (Builder $query) use ($tagIds) {
				$query->whereIn('blog_tag_id', $tagIds);
			}])
			->orderByDesc('shared_tags_count')
			->orderByDesc('published_at')
			->limit($limit)
			->get()
			->all();
	}
}
