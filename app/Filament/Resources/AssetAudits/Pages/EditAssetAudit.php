<?php

namespace App\Filament\Resources\AssetAudits\Pages;

use App\Filament\Resources\AssetAudits\AssetAuditResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAssetAudit extends EditRecord
{
    protected static string $resource = AssetAuditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
