<?php

namespace App\Filament\Resources\AssetAudits\Pages;

use App\Filament\Resources\AssetAudits\AssetAuditResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAssetAudits extends ListRecords
{
    protected static string $resource = AssetAuditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
