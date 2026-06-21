<?php

namespace App\Filament\Resources\AssetDisposals\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\Size;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AssetDisposalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('asset.name')
                    ->label('Aset Dihapuskan')
                    ->searchable()
                    ->weight('bold')
                    ->icon('heroicon-m-trash')
                    ->iconColor('danger'),
                TextColumn::make('disposal_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('disposal_value')
                    ->label('Nilai Jual/Pelepasan')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Metode')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Dijual' => 'success',
                        'Dihibahkan' => 'info',
                        'Dihancurkan' => 'warning',
                        'Hilang' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make()->color('primary'),
                    DeleteAction::make(),
                ])
                    ->label('')
                    ->icon('heroicon-m-ellipsis-horizontal')
                    ->size(Size::Small)
                    ->color('info')
                    ->outlined()
                    ->button(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
