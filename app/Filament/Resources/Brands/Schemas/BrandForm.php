<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Informasi Brand')
                            ->description('Silakan lengkapi identitas untuk Merek (Brand)')
                            ->icon('heroicon-o-tag')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Merek (Brand)')
                                    ->placeholder('Contoh: Samsung, Epson, dll.')
                                    ->helperText('Masukkan nama merek dagang dari aset.')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-m-tag')
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->label('Deskripsi Lengkap')
                                    ->placeholder('Penjelasan opsional tentang merek ini (contoh: Produsen elektronik)...')
                                    ->helperText('Boleh dikosongkan jika tidak ada detail tambahan.')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])->columns(1),
                    ])->columnSpanFull(),
            ]);
    }
}
