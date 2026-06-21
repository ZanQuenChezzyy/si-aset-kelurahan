<?php

namespace App\Filament\Resources\AssetLoans\Pages;

use App\Filament\Resources\AssetLoans\AssetLoanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssetLoan extends ViewRecord
{
    protected static string $resource = AssetLoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
