<?php

namespace App\Filament\Resources\AssetMaintenances\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AssetMaintenanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Data Perbaikan / Maintenance')
                            ->description('Catat riwayat perbaikan aset yang rusak atau butuh perawatan rutin.')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->schema([
                                Select::make('asset_id')
                                    ->label('Aset yang Diperbaiki')
                                    ->relationship('asset', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Cari aset...')
                                    ->columnSpanFull(),
                                DatePicker::make('maintenance_date')
                                    ->label('Tanggal Perbaikan')
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih tanggal...'),
                                TextInput::make('cost')
                                    ->label('Biaya Perbaikan (Rp)')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->placeholder('0')
                                    ->helperText('Biaya estimasi atau faktur bengkel.'),
                                Select::make('status')
                                    ->label('Status Perbaikan')
                                    ->options([
                                        'Sedang Diperbaiki' => 'Sedang Diperbaiki',
                                        'Selesai' => 'Selesai',
                                        'Gagal' => 'Gagal',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->default('Sedang Diperbaiki')
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->label('Detail Kerusakan / Tindakan')
                                    ->placeholder('Jelaskan bagian apa saja yang diganti atau diperbaiki...')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])->columns(2),
                    ])->columnSpanFull(),
            ]);
    }
}
