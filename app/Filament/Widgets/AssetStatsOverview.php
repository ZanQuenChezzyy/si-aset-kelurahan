<?php

namespace App\Filament\Widgets;

use App\Models\Asset;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AssetStatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalAssets = \App\Models\Asset::count();
        $totalValue = \App\Models\Asset::sum('purchase_price');
        $goodCondition = \App\Models\Asset::where('condition', 'Baik')->count();
        $loanedOut = \App\Models\Asset::where('status', 'Dipinjam')->count();

        return [
            Stat::make('Total Keseluruhan Aset', $totalAssets)
                ->description('Seluruh aset terdaftar')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),
            Stat::make('Total Nilai Aset', 'Rp '.number_format($totalValue, 0, ',', '.'))
                ->description('Estimasi nilai keseluruhan')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
            Stat::make('Kondisi Baik', $goodCondition)
                ->description('Aset yang siap digunakan')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),
            Stat::make('Sedang Dipinjam', $loanedOut)
                ->description('Aset berada di luar')
                ->descriptionIcon('heroicon-m-arrow-right-circle')
                ->color('warning'),
        ];
    }
}
