<?php

namespace App\Filament\Resources\AssetMaintenances\Schemas;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AssetMaintenanceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Perawatan')
                    ->icon('heroicon-o-wrench-screwdriver')
                    ->schema([
                        Grid::make(2)->schema([
                            Group::make()->schema([
                                TextEntry::make('asset.name')
                                    ->label('Aset')
                                    ->weight('bold')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->color('primary'),
                                TextEntry::make('maintenance_date')
                                    ->label('Tanggal Perawatan')
                                    ->date('d M Y'),
                            ]),
                            Group::make()->schema([
                                TextEntry::make('cost')
                                    ->label('Biaya Perbaikan')
                                    ->money('IDR')
                                    ->weight('bold')
                                    ->color('success'),
                                TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'Sedang Diperbaiki' => 'warning',
                                        'Selesai' => 'success',
                                        'Gagal' => 'danger',
                                        default => 'gray',
                                    }),
                            ]),
                        ]),
                        Grid::make(1)->schema([
                            TextEntry::make('description')
                                ->label('Detail Tindakan & Kerusakan')
                                ->placeholder('Tidak ada rincian tindakan.'),
                        ]),
                    ])->columnSpanFull(),
            ]);
    }
}
