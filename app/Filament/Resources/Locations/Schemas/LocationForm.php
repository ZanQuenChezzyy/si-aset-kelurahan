<?php

namespace App\Filament\Resources\Locations\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Informasi Location')
                            ->description('Silakan lengkapi identitas untuk Lokasi Penempatan')
                            ->icon('heroicon-o-map-pin')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Lokasi Penempatan')
                                    ->placeholder('Contoh: Ruang Rapat, Gudang Utama, dll.')
                                    ->helperText('Titik lokasi fisik tempat aset akan diletakkan.')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-m-map-pin')
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->label('Deskripsi Lengkap')
                                    ->placeholder('Petunjuk arah atau detail ruangan...')
                                    ->helperText('Bantu pengguna lain menemukan lokasi ini dengan mudah.')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])->columns(1),
                    ])->columnSpanFull(),
            ]);
    }
}
