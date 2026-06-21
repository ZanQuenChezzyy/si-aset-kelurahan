<?php

namespace App\Filament\Resources\Vendors\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VendorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Vendor')
                    ->description('Informasi lengkap mengenai rekanan/vendor')
                    ->icon('heroicon-o-truck')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Group::make()
                                    ->schema([
                                        TextEntry::make('name')
                                            ->label('Nama Vendor / Perusahaan')
                                            ->weight('bold')
                                            ->icon('heroicon-m-building-storefront')
                                            ->color('primary'),
                                        TextEntry::make('email')
                                            ->label('Alamat Email')
                                            ->icon('heroicon-m-envelope')
                                            ->copyable()
                                            ->placeholder('Belum ada email'),
                                    ])->columnSpan(2),

                                Group::make()
                                    ->schema([
                                        TextEntry::make('phone')
                                            ->label('Nomor Telepon')
                                            ->icon('heroicon-m-phone')
                                            ->copyable()
                                            ->placeholder('Belum ada nomor telepon'),
                                        TextEntry::make('address')
                                            ->label('Alamat Lengkap')
                                            ->icon('heroicon-m-map-pin')
                                            ->placeholder('Belum ada alamat'),
                                    ])->columnSpan(1),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }
}
