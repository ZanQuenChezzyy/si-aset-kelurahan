<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Informasi Utama')
                            ->description('Data identitas dasar dari aset')
                            ->icon('heroicon-o-cube')
                            ->schema([
                                TextInput::make('asset_code')
                                    ->label('Kode Aset')
                                    ->placeholder('Auto-generate jika dikosongkan')
                                    ->disabled()
                                    ->dehydrated(false)
                                    ->columnSpanFull(),

                                TextInput::make('name')
                                    ->label('Nama Aset')
                                    ->placeholder('Masukkan nama aset')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),

                                Select::make('category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Select::make('brand_id')
                                    ->label('Merek/Brand')
                                    ->relationship('brand', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Select::make('vendor_id')
                                    ->label('Vendor (Pemasok)')
                                    ->relationship('vendor', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Section::make('Penempatan & Deskripsi')
                            ->icon('heroicon-o-map-pin')
                            ->schema([
                                Select::make('location_id')
                                    ->label('Lokasi')
                                    ->relationship('location', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Select::make('department_id')
                                    ->label('Departemen')
                                    ->relationship('department', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Textarea::make('description')
                                    ->label('Deskripsi/Catatan')
                                    ->placeholder('Keterangan tambahan mengenai aset ini...')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])->columns(2),
                    ])
                    ->columnSpan([
                        'default' => 3,
                        'sm' => 3,
                        'md' => 3,
                        'lg' => 4,
                        'xl' => 2,
                        '2xl' => 2,
                    ]),

                Group::make()
                    ->schema([
                        Section::make('Kondisi & Status')
                            ->icon('heroicon-o-tag')
                            ->schema([
                                Select::make('condition')
                                    ->label('Kondisi Fisik')
                                    ->options([
                                        'Baik' => 'Baik',
                                        'Rusak Ringan' => 'Rusak Ringan',
                                        'Rusak Berat' => 'Rusak Berat',
                                    ])
                                    ->required()
                                    ->native(false),

                                Select::make('status')
                                    ->label('Status Penggunaan')
                                    ->options([
                                        'Tersedia' => 'Tersedia',
                                        'Dipinjam' => 'Dipinjam',
                                        'Diperbaiki' => 'Diperbaiki',
                                        'Dihapuskan' => 'Dihapuskan',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->default('Tersedia'),
                            ]),

                        Section::make('Nilai Pengadaan')
                            ->icon('heroicon-o-banknotes')
                            ->schema([
                                DatePicker::make('purchase_date')
                                    ->label('Tanggal Pembelian')
                                    ->required()
                                    ->native(false)
                                    ->maxDate(now()),

                                TextInput::make('purchase_price')
                                    ->label('Harga Beli (Rp)')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->required()
                                    ->minValue(0),
                            ]),
                    ])
                    ->columnSpan([
                        'default' => 3,
                        'sm' => 3,
                        'md' => 3,
                        'lg' => 4,
                        'xl' => 1,
                        '2xl' => 1,
                    ]),
            ])->columns(3);
    }
}
