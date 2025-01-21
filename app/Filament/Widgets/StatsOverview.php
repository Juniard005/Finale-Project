<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Santri;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        // $startDate = ! is_null($this->filters['startDate'] ?? null) ?
        // Carbon::parse($this->filters['startDate']) :
        // null;

        // $endDate = ! is_null($this->filters['endDate'] ?? null) ?
        // Carbon::parse($this->filters['endDate']) :
        // now();

        return [
            Stat::make('Santri', Santri::query()->count())
                ->description('Total Santri')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7,2,10,3,15,4,17])
                ->color('success'),
            Stat::make('Bounce rate', '21%')
                ->description('7% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Guru', Guru::query()->count())
                ->description('Total Guru')
                ->chart([3,2,5,7,8,3,2])
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
