<?php

namespace App\Filament\Resources\AssetLoans\Schemas;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AssetLoanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Peminjaman')
                    ->icon('heroicon-o-arrow-right-on-rectangle')
                    ->schema([
                        Grid::make(2)->schema([
                            Group::make()->schema([
                                TextEntry::make('asset.name')
                                    ->label('Aset')
                                    ->weight('bold')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->color('warning'),
                                TextEntry::make('user.name')
                                    ->label('Peminjam')
                                    ->icon('heroicon-m-user'),
                            ]),
                            Group::make()->schema([
                                TextEntry::make('loan_date')
                                    ->label('Tanggal Peminjaman')
                                    ->date('d M Y'),
                                TextEntry::make('return_date')
                                    ->label('Batas Pengembalian')
                                    ->date('d M Y')
                                    ->placeholder('Belum diatur'),
                            ]),
                        ]),
                        Grid::make(1)->schema([
                            TextEntry::make('status')
                                ->label('Status Peminjaman')
                                ->badge()
                                ->color(fn (string $state): string => match ($state) {
                                    'Dipinjam' => 'warning',
                                    'Dikembalikan' => 'success',
                                    'Terlambat' => 'danger',
                                    default => 'gray',
                                }),
                            TextEntry::make('notes')
                                ->label('Catatan Khusus')
                                ->placeholder('Tidak ada catatan peminjaman.'),
                        ]),
                    ])->columnSpanFull(),
            ]);
    }
}
