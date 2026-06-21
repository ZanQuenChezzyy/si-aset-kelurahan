<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AssetInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    Section::make('Informasi Utama')
                        ->icon('heroicon-o-cube')
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextEntry::make('asset_code')
                                        ->label('Kode Aset')
                                        ->badge()
                                        ->color('gray')
                                        ->copyable(),
                                    TextEntry::make('name')
                                        ->label('Nama Aset')
                                        ->weight('bold'),
                                    TextEntry::make('category.name')
                                        ->label('Kategori')
                                        ->icon('heroicon-m-tag'),
                                    TextEntry::make('brand.name')
                                        ->label('Merek')
                                        ->icon('heroicon-m-bookmark'),
                                ]),
                        ]),

                    Section::make('Penempatan & Deskripsi')
                        ->icon('heroicon-o-map-pin')
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextEntry::make('location.name')
                                        ->label('Lokasi')
                                        ->icon('heroicon-m-building-office-2'),
                                    TextEntry::make('department.name')
                                        ->label('Departemen')
                                        ->icon('heroicon-m-users'),
                                    TextEntry::make('description')
                                        ->label('Catatan Tambahan')
                                        ->columnSpanFull()
                                        ->placeholder('Tidak ada catatan.'),
                                ]),
                        ]),
                ])
                    ->columnSpan([
                        'default' => 3,
                        'sm' => 3,
                        'md' => 3,
                        'lg' => 4,
                        'xl' => 2,
                        '2xl' => 2,
                    ]),

                Group::make([
                    Section::make('Kondisi & Status')
                        ->icon('heroicon-o-check-badge')
                        ->schema([
                            TextEntry::make('condition')
                                ->label('Kondisi Fisik')
                                ->badge()
                                ->color(fn (string $state): string => match ($state) {
                                    'Baik' => 'success',
                                    'Rusak Ringan' => 'warning',
                                    'Rusak Berat' => 'danger',
                                    default => 'gray',
                                }),
                            TextEntry::make('status')
                                ->label('Status Operasional')
                                ->badge()
                                ->color(fn (string $state): string => match ($state) {
                                    'Tersedia' => 'success',
                                    'Dipinjam' => 'info',
                                    'Diperbaiki' => 'warning',
                                    'Dihapuskan' => 'danger',
                                    default => 'gray',
                                }),
                        ]),

                    Section::make('Pengadaan')
                        ->icon('heroicon-o-banknotes')
                        ->schema([
                            TextEntry::make('vendor.name')
                                ->label('Vendor Pemasok')
                                ->icon('heroicon-m-truck')
                                ->color('primary'),
                            TextEntry::make('purchase_date')
                                ->label('Tanggal Pengadaan')
                                ->date('d M Y'),
                            TextEntry::make('purchase_price')
                                ->label('Harga Pembelian')
                                ->money('IDR')
                                ->weight('bold'),
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
