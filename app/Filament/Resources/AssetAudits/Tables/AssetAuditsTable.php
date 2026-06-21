<?php

namespace App\Filament\Resources\AssetAudits\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\Size;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AssetAuditsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('asset.name')
                    ->label('Aset Diaudit')
                    ->searchable()
                    ->weight('bold')
                    ->icon('heroicon-m-clipboard-document-check')
                    ->iconColor('success'),
                TextColumn::make('user.name')
                    ->label('Auditor')
                    ->searchable()
                    ->icon('heroicon-m-user-circle'),
                TextColumn::make('audit_date')
                    ->label('Tanggal Audit')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('condition_status')
                    ->label('Kondisi Temuan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Sesuai' => 'success',
                        'Tidak Sesuai' => 'warning',
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
