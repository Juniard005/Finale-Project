<?php

namespace App\Filament\Widgets;

use App\Models\santri;
use Illuminate\Support\Carbon;
use Filament\Widgets\ChartWidget;

class SantriChart extends ChartWidget
{
    protected static ?string $heading = 'Data Santri';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = $this->getSantriPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Data Penambahan Santri',

                    'data' => $data['santrisPerMonth'],
                ],
            ],
            'labels' => $data['months'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    private function getSantriPerMonth()
    {
        $now = Carbon::now();

        $santrisPerMonth = [];

        $months = collect(range(1, 12))->map(function ($month) use ($now, &$santrisPerMonth) {
            $count = Santri::whereMonth('created_at', Carbon::parse($now->month($month)->format

            ('Y-m')))->count();

            $santrisPerMonth[] = $count;

            return $now->copy()->month($month)->format('M');
        })->toArray();

        return [
            'santrisPerMonth' => $santrisPerMonth,

            'months' => $months,
        ];
    }
}
