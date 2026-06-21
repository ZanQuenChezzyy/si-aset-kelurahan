<?php

namespace App\Filament\Resources\AssetAudits;

use App\Filament\Resources\AssetAudits\Pages\CreateAssetAudit;
use App\Filament\Resources\AssetAudits\Pages\EditAssetAudit;
use App\Filament\Resources\AssetAudits\Pages\ListAssetAudits;
use App\Filament\Resources\AssetAudits\Pages\ViewAssetAudit;
use App\Filament\Resources\AssetAudits\Schemas\AssetAuditForm;
use App\Filament\Resources\AssetAudits\Schemas\AssetAuditInfolist;
use App\Filament\Resources\AssetAudits\Tables\AssetAuditsTable;
use App\Models\AssetAudit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AssetAuditResource extends Resource
{
    protected static ?string $model = AssetAudit::class;

    protected static string|UnitEnum|null $navigationGroup = 'Transaksi Aset';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::ClipboardDocumentCheck;

    public static function getNavigationLabel(): string
    {
        return 'Audit';
    }

    public static function getModelLabel(): string
    {
        return 'Audit';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Audit';
    }

    protected static ?int $navigationSort = 34;

    public static function form(Schema $schema): Schema
    {
        return AssetAuditForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AssetAuditInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssetAuditsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAssetAudits::route('/'),
            'create' => CreateAssetAudit::route('/create'),
            'view' => ViewAssetAudit::route('/{record}'),
            'edit' => EditAssetAudit::route('/{record}/edit'),
        ];
    }
}
