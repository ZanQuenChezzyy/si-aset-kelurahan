<?php

namespace App\Filament\Resources\AssetAudits\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AssetAuditForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Pemeriksaan Aset (Audit)')
                            ->description('Formulir pencatatan hasil inspeksi dan pengecekan fisik aset berkala.')
                            ->icon('heroicon-o-clipboard-document-check')
                            ->schema([
                                Select::make('asset_id')
                                    ->label('Aset yang Diaudit')
                                    ->relationship('asset', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Cari aset...'),
                                Select::make('user_id')
                                    ->label('Auditor / Pemeriksa')
                                    ->relationship('user', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih nama pemeriksa...'),
                                DatePicker::make('audit_date')
                                    ->label('Tanggal Audit')
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih tanggal pengecekan...'),
                                Select::make('condition_status')
                                    ->label('Kondisi Fisik Saat Audit')
                                    ->options([
                                        'Sesuai' => 'Sesuai / Baik',
                                        'Tidak Sesuai' => 'Tidak Sesuai (Rusak)',
                                        'Hilang' => 'Hilang / Tidak Ditemukan',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih kondisi...')
                                    ->helperText('Apakah fisik aset sesuai dengan yang tercatat di sistem?'),
                                Textarea::make('notes')
                                    ->label('Catatan Temuan')
                                    ->placeholder('Jelaskan jika ada cacat, kekurangan komponen, atau anomali lainnya...')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])->columns(2),
                    ])->columnSpanFull(),
            ]);
    }
}
