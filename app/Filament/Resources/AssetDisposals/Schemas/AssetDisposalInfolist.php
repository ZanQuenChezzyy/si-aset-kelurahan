<?php

namespace App\Filament\Resources\AssetDisposals\Schemas;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AssetDisposalInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Penghapusan')
                    ->icon('heroicon-o-trash')
                    ->schema([
                        Grid::make(2)->schema([
                            Group::make()->schema([
                                TextEntry::make('asset.name')
                                    ->label('Identitas Aset')
                                    ->weight('bold')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->color('danger'),
                                TextEntry::make('disposal_date')
                                    ->label('Tanggal Pemusnahan/Pelepasan')
                                    ->date('d M Y'),
                            ]),
                            Group::make()->schema([
                                TextEntry::make('status')
                                    ->label('Metode Penghapusan')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'Dijual' => 'success',
                                        'Dihibahkan' => 'info',
                                        'Dihancurkan' => 'warning',
                                        'Hilang' => 'danger',
                                        default => 'gray',
                                    }),
                                TextEntry::make('disposal_value')
                                    ->label('Nilai Residu / Hasil Jual')
                                    ->money('IDR')
                                    ->weight('bold')
                                    ->color('success'),
                            ]),
                        ]),
                        Grid::make(1)->schema([
                            TextEntry::make('reason')
                                ->label('Dasar Penghapusan')
                                ->placeholder('Tidak ada keterangan alasan tertulis.'),
                        ]),
                    ])->columnSpanFull(),
            ]);
    }
}
