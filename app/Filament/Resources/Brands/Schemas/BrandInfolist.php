<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BrandInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Merek (Brand)')
                    ->description('Rangkuman data terkait Merek (Brand)')
                    ->icon('heroicon-o-tag')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Nama Merek (Brand)')
                                    ->weight('bold')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->icon('heroicon-m-tag')
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
