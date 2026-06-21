<?php

namespace App\Filament\Resources\AssetLoans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AssetLoanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Informasi Peminjaman')
                            ->description('Pilih aset dan pengguna yang meminjam.')
                            ->icon('heroicon-o-arrow-right-on-rectangle')
                            ->schema([
                                Select::make('asset_id')
                                    ->label('Pilih Aset')
                                    ->relationship('asset', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Ketik nama aset...')
                                    ->helperText('Hanya aset yang berstatus Tersedia yang dapat dipinjam.'),
                                Select::make('user_id')
                                    ->label('Peminjam (User)')
                                    ->relationship('user', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih nama peminjam...'),
                            ])->columns(2),

                        Section::make('Waktu & Keterangan')
                            ->icon('heroicon-o-clock')
                            ->schema([
                                DatePicker::make('loan_date')
                                    ->label('Tanggal Peminjaman')
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih tanggal pinjam'),
                                DatePicker::make('return_date')
                                    ->label('Rencana Pengembalian')
                                    ->native(false)
                                    ->placeholder('Kosongkan jika belum pasti')
                                    ->helperText('Batas waktu maksimal pengembalian aset.'),
                                Select::make('status')
                                    ->label('Status Peminjaman')
                                    ->options([
                                        'Dipinjam' => 'Dipinjam',
                                        'Dikembalikan' => 'Dikembalikan',
                                        'Terlambat' => 'Terlambat',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->default('Dipinjam')
                                    ->columnSpanFull(),
                                Textarea::make('notes')
                                    ->label('Catatan Peminjaman')
                                    ->placeholder('Tambahkan kondisi awal atau tujuan peminjaman...')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ])->columns(2),
                    ])->columnSpanFull(),
            ]);
    }
}
