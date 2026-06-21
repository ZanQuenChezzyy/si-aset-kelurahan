<?php

namespace App\Filament\Resources\AssetAudits\Pages;

use App\Filament\Resources\AssetAudits\AssetAuditResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssetAudit extends ViewRecord
{
    protected static string $resource = AssetAuditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
