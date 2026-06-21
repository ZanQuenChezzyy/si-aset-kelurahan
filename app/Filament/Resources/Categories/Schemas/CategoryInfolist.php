<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Kategori Aset')
                    ->description('Rangkuman data terkait Kategori Aset')
                    ->icon('heroicon-o-rectangle-stack')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Nama Kategori Aset')
                                    ->weight('bold')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->icon('heroicon-m-rectangle-stack')
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
