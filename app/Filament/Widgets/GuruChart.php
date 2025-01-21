<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Guru;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class GuruChart extends ChartWidget
{
    protected static ?string $heading = 'Data Guru';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = $this->getGuruPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Data Penambahan Guru',

                    'data' => $data['gurusPerMonth'],
                ],
            ],
            'labels' => $data['months'],
        ];

    }

    protected function getType(): string
    {
        return 'line';
    }

    private function getGuruPerMonth()
    {
        $now = Carbon::now();

        $gurusPerMonth = [];

        $months = collect(range(1, 12))->map(function ($month) use ($now, &$gurusPerMonth) {
            $count = Guru::whereMonth('created_at', Carbon::parse($now->month($month)->format

            ('Y-m')))->count();

            $gurusPerMonth[] = $count;

            return $now->copy()->month($month)->format('M');
        })->toArray();

        return [
            'gurusPerMonth' => $gurusPerMonth,

            'months' => $months,
        ];
    }
}
