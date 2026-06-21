<?php

namespace App\Filament\Resources\Vendors\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VendorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Informasi Dasar')
                            ->description('Data utama dan kontak vendor')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Vendor / Perusahaan')
                                    ->required()
                                    ->prefixIcon('heroicon-m-building-storefront')
                                    ->columnSpanFull(),
                                TextInput::make('email')
                                    ->label('Alamat Email')
                                    ->email()
                                    ->prefixIcon('heroicon-m-envelope'),
                                TextInput::make('phone')
                                    ->label('No. Telepon')
                                    ->tel()
                                    ->prefixIcon('heroicon-m-phone'),
                            ])->columns(2),
                    ])->columnSpan([
                        'default' => 3,
                        'xl' => 2,
                    ]),

                Group::make()
                    ->schema([
                        Section::make('Lokasi')
                            ->description('Alamat fisik vendor')
                            ->icon('heroicon-o-map')
                            ->schema([
                                Textarea::make('address')
                                    ->label('Alamat Lengkap')
                                    ->rows(6)
                                    ->placeholder('Masukkan alamat lengkap vendor di sini...'),
                            ]),
                    ])->columnSpan([
                        'default' => 3,
                        'xl' => 1,
                    ]),
            ])->columns(3);
    }
}
