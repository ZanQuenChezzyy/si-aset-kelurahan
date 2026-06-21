<?php

namespace App\Filament\Resources\AssetDisposals\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AssetDisposalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Penghapusan / Pelepasan Aset')
                            ->description('Dokumentasikan aset yang dijual, dihibahkan, atau dihancurkan.')
                            ->icon('heroicon-o-trash')
                            ->schema([
                                Select::make('asset_id')
                                    ->label('Aset yang Dihapuskan')
                                    ->relationship('asset', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Cari aset...'),
                                DatePicker::make('disposal_date')
                                    ->label('Tanggal Penghapusan')
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih tanggal...'),
                                TextInput::make('disposal_value')
                                    ->label('Nilai Pelepasan (Rp)')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->placeholder('0')
                                    ->helperText('Kosongkan atau isi 0 jika dihancurkan/hilang.'),
                                Select::make('status')
                                    ->label('Metode Penghapusan')
                                    ->options([
                                        'Dijual' => 'Dijual (Lelang)',
                                        'Dihibahkan' => 'Dihibahkan',
                                        'Dihancurkan' => 'Dihancurkan (Rusak Total)',
                                        'Hilang' => 'Hilang / Dicuri',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih metode...'),
                                Textarea::make('reason')
                                    ->label('Alasan / Keterangan')
                                    ->placeholder('Tuliskan dasar keputusan penghapusan aset ini...')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ])->columns(2),
                    ])->columnSpanFull(),
            ]);
    }
}
