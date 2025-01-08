<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class GoogleAnalyticsVisitorsWidget extends Widget
{
	protected static string $view = 'filament.widgets.google-analytics-visitors-widget';
	protected int|string|array $columnSpan = 'full';

	/**
	 * Render del Widget
	 */
	public function render(): \Illuminate\Contracts\View\View
	{
		$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(1));

		return view('filament.widgets.google-analytics-visitors-widget', (array)($analyticsData->first() ?? []));
	}
}
