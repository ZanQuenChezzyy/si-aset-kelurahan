<?php

namespace App\Filament\Resources\AssetMutations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AssetMutationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Pemindahan Aset (Mutasi)')
                            ->description('Catat pergerakan lokasi fisik aset dari satu tempat ke tempat lain.')
                            ->icon('heroicon-o-arrows-right-left')
                            ->schema([
                                Select::make('asset_id')
                                    ->label('Aset yang Dipindah')
                                    ->relationship('asset', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih aset...'),
                                DatePicker::make('mutation_date')
                                    ->label('Tanggal Pemindahan')
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih tanggal...'),
                                Select::make('from_location_id')
                                    ->label('Lokasi Asal (Sebelumnya)')
                                    ->relationship('fromLocation', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->native(false)
                                    ->placeholder('Pilih lokasi awal...'),
                                Select::make('to_location_id')
                                    ->label('Lokasi Tujuan (Baru)')
                                    ->relationship('toLocation', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih lokasi baru...'),
                                Textarea::make('reason')
                                    ->label('Alasan Pemindahan')
                                    ->placeholder('Contoh: Renovasi ruangan, pembaruan fasilitas, dll.')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ])->columns(2),
                    ])->columnSpanFull(),
            ]);
    }
}
