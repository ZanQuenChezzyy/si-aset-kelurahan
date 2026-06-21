<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DepartmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profil Departemen')
                    ->description('Detail informasi tentang unit kerja atau bagian dalam sistem')
                    ->icon('heroicon-o-building-office-2')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Nama Departemen / Unit Kerja')
                                    ->weight('bold')
                                    ->icon('heroicon-m-building-office-2')
                                    ->iconColor('primary')
                                    ->color('primary'),
                                TextEntry::make('description')
                                    ->label('Tugas & Fungsi (Deskripsi)')
                                    ->placeholder('Tidak ada catatan deskripsi yang tersedia.'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }
}
