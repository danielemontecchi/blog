<?php
namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class GoogleAnalyticsVisitorsWidget extends Widget
{
	protected static string $view          = 'filament.widgets.google-analytics-visitors-widget';
	protected int|string|array $columnSpan = 'full';

	/**
	 * Render del Widget
	 */
	public function render(): \Illuminate\Contracts\View\View
	{
		$analyticsData = collect([]);

		try {
			$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(1));
		} catch (\Exception $e) {
			// Do nothing
		}

		return view('filament.widgets.google-analytics-visitors-widget', [
			'analyticsData' => $analyticsData->first() ?? [],
		]);
	}
}
