<?php
namespace App\Repositories;

class FilamentRepository
{
	/**
	 * @return array<string, string>
	 */
	public function getColors(): array
	{
		//FIXME: This is a temporary solution until the Color::all() method is implemented.
		//		return collect(Color::all())
		//									->mapWithKeys(fn($palette, $color) => [$color => ucfirst($color)])
		//									->sort()
		//									->toArray();
		return [
			'amber'   => 'Amber',
			'blue'    => 'Blue',
			'cyan'    => 'Cyan',
			'emerald' => 'Emerald',
			'fuchsia' => 'Fuchsia',
			'gray'    => 'Gray',
			'green'   => 'Green',
			'indigo'  => 'Indigo',
			'lime'    => 'Lime',
			'neutral' => 'Neutral',
			'orange'  => 'Orange',
			'pink'    => 'Pink',
			'purple'  => 'Purple',
			'red'     => 'Red',
			'rose'    => 'Rose',
			'sky'     => 'Sky',
			'slate'   => 'Slate',
			'stone'   => 'Stone',
			'teal'    => 'Teal',
			'violet'  => 'Violet',
			'yellow'  => 'Yellow',
			'zinc'    => 'Zinc',
		];
	}
}
