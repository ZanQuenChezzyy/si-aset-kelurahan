<?php

namespace App\Filament\Resources\AssetMutations\Schemas;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AssetMutationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Mutasi')
                    ->icon('heroicon-o-arrows-right-left')
                    ->schema([
                        Grid::make(2)->schema([
                            Group::make()->schema([
                                TextEntry::make('asset.name')
                                    ->label('Aset yang Dipindahkan')
                                    ->weight('bold')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->color('info'),
                                TextEntry::make('mutation_date')
                                    ->label('Tanggal Pelaksanaan')
                                    ->date('d M Y'),
                            ]),
                            Group::make()->schema([
                                TextEntry::make('fromLocation.name')
                                    ->label('Lokasi Asal')
                                    ->icon('heroicon-m-arrow-right-circle')
                                    ->color('danger'),
                                TextEntry::make('toLocation.name')
                                    ->label('Lokasi Tujuan')
                                    ->icon('heroicon-m-map-pin')
                                    ->color('success'),
                            ]),
                        ]),
                        Grid::make(1)->schema([
                            TextEntry::make('reason')
                                ->label('Alasan Pemindahan')
                                ->placeholder('Tidak ada alasan khusus dicatat.'),
                        ]),
                    ])->columnSpanFull(),
            ]);
    }
}
