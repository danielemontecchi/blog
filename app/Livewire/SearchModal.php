<?php
namespace App\Livewire;

use App\Models\BlogPost;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as CView;
use Illuminate\Foundation\Application;
use Illuminate\View\View as VView;
use Livewire\Component;

class SearchModal extends Component
{
	/**
	 * @var array<mixed>
	 */
	public array $results = [];

	/**
	 * @var array<string, array<int, array{icon: string, link: string, title: string}>>
	 */
	public array $initialLinks = [];

	public string $search = '';

	public function mount(): void
	{
		$this->initialLinks = [
			'Test' => [
				[
					'icon'  => 'gift',
					'link'  => 'https://google.com',
					'title' => 'Google',
				],
			],
		];
	}

	public function updatedSearch(string $value): void
	{
		$this->results = (strlen($value) > 2)
			? BlogPost::query()
				->where('title', 'like', "%{$value}%")
				->orWhere('intro', 'like', "%{$value}%")
//				->orWhere('content', 'like', "%{$value}%")
				->limit(5)
				->get()
				->map(
					fn ($item) => [
						'icon'  => 'document-text',
						'link'  => route('blog.show', $item),
						'title' => $item->title,
					]
				)
				->toArray()
			: [];
	}

	public function render(): Factory|CView|Application|VView
	{
		return view('livewire.search-modal');
	}
}
