<?php

namespace App\Filament\Resources\Locations\Schemas;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LocationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Lokasi Penempatan')
                    ->description('Rangkuman data terkait Lokasi Penempatan')
                    ->icon('heroicon-o-map-pin')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Nama Lokasi Penempatan')
                                    ->weight('bold')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->icon('heroicon-m-map-pin')
                                    ->iconColor('primary')
                                    ->color('primary'),
                                TextEntry::make('description')
                                    ->label('Keterangan / Deskripsi')
                                    ->placeholder('Tidak ada keterangan yang tercatat.'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }
}
