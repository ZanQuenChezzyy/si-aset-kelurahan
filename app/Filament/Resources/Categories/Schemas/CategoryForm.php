<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Informasi Category')
                            ->description('Silakan lengkapi identitas untuk Kategori Aset')
                            ->icon('heroicon-o-rectangle-stack')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Kategori Aset')
                                    ->placeholder('Contoh: Elektronik, Kendaraan, Mebel, dll.')
                                    ->helperText('Kelompokkan aset berdasarkan jenis atau fungsinya.')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-m-rectangle-stack')
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->label('Deskripsi Lengkap')
                                    ->placeholder('Keterangan kategori (contoh: Aset yang menggunakan listrik)...')
                                    ->helperText('Penjelasan lebih detail mengenai kategori ini.')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])->columns(1),
                    ])->columnSpanFull(),
            ]);
    }
}
