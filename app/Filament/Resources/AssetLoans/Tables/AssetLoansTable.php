<?php

namespace App\Filament\Resources\AssetLoans\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\Size;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AssetLoansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('asset.name')
                    ->label('Aset yang Dipinjam')
                    ->searchable()
                    ->weight('bold')
                    ->icon('heroicon-m-cube')
                    ->iconColor('warning'),
                TextColumn::make('user.name')
                    ->label('Peminjam')
                    ->searchable()
                    ->icon('heroicon-m-user'),
                TextColumn::make('loan_date')
                    ->label('Tgl Pinjam')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('return_date')
                    ->label('Rencana Kembali')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('Belum ditentukan'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Dipinjam' => 'warning',
                        'Dikembalikan' => 'success',
                        'Terlambat' => 'danger',
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
