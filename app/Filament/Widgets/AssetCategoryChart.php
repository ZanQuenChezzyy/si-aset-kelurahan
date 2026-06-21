<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class AssetCategoryChart extends ChartWidget
{
    protected ?string $heading = 'Sebaran Aset Berdasarkan Kategori';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $categories = Category::withCount('assets')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Aset',
                    'data' => $categories->pluck('assets_count')->toArray(),
                    'backgroundColor' => [
                        '#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6', '#ec4899', '#14b8a6', '#f97316',
                    ],
                ],
            ],
            'labels' => $categories->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
