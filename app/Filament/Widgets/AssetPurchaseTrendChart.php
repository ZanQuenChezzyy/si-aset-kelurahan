<?php

namespace App\Filament\Widgets;

use App\Models\Asset;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class AssetPurchaseTrendChart extends ChartWidget
{
    protected ?string $heading = 'Tren Pembelian Aset (6 Bulan Terakhir)';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = collect();
        $labels = collect();

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->startOfMonth()->subMonths($i);
            $labels->push($date->translatedFormat('M Y'));

            $count = Asset::whereMonth('purchase_date', $date->month)
                ->whereYear('purchase_date', $date->year)
                ->count();

            $data->push($count);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Aset Dibeli',
                    'data' => $data->toArray(),
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
