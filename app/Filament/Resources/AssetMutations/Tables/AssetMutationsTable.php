<?php

namespace App\Filament\Resources\AssetMutations\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\Size;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AssetMutationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('asset.name')
                    ->label('Aset Dimutasi')
                    ->searchable()
                    ->weight('bold')
                    ->icon('heroicon-m-arrows-right-left')
                    ->iconColor('info'),
                TextColumn::make('fromLocation.name')
                    ->label('Dari Lokasi')
                    ->icon('heroicon-m-map-pin'),
                TextColumn::make('toLocation.name')
                    ->label('Ke Lokasi')
                    ->icon('heroicon-m-map-pin')
                    ->color('success'),
                TextColumn::make('mutation_date')
                    ->label('Tanggal Pemindahan')
                    ->date('d M Y')
                    ->sortable(),
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
