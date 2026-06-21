<?php

namespace App\Filament\Resources\AssetAudits\Schemas;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AssetAuditInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Audit & Inspeksi')
                    ->icon('heroicon-o-clipboard-document-check')
                    ->schema([
                        Grid::make(2)->schema([
                            Group::make()->schema([
                                TextEntry::make('asset.name')
                                    ->label('Aset')
                                    ->weight('bold')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->color('success'),
                                TextEntry::make('user.name')
                                    ->label('Pemeriksa (Auditor)')
                                    ->icon('heroicon-m-check-badge'),
                            ]),
                            Group::make()->schema([
                                TextEntry::make('audit_date')
                                    ->label('Tanggal Pengecekan')
                                    ->date('d M Y'),
                                TextEntry::make('condition_status')
                                    ->label('Status Temuan')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'Sesuai' => 'success',
                                        'Tidak Sesuai' => 'warning',
                                        'Hilang' => 'danger',
                                        default => 'gray',
                                    }),
                            ]),
                        ]),
                        Grid::make(1)->schema([
                            TextEntry::make('notes')
                                ->label('Catatan Evaluasi')
                                ->placeholder('Tidak ada catatan anomali dari auditor.'),
                        ]),
                    ])->columnSpanFull(),
            ]);
    }
}
