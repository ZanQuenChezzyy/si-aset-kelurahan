<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Informasi Utama Departemen')
                            ->description('Data dasar tentang bagian/unit kerja di lingkungan kelurahan')
                            ->icon('heroicon-o-building-office-2')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Departemen / Unit Kerja')
                                    ->placeholder('Contoh: Pelayanan Umum')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-m-building-office-2')
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->label('Deskripsi Tugas & Fungsi')
                                    ->placeholder('Jelaskan secara singkat ruang lingkup atau tugas departemen ini')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])->columns(1),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
