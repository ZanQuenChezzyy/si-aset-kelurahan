<?php

namespace App\Filament\Resources\AssetLoans;

use App\Filament\Resources\AssetLoans\Pages\CreateAssetLoan;
use App\Filament\Resources\AssetLoans\Pages\EditAssetLoan;
use App\Filament\Resources\AssetLoans\Pages\ListAssetLoans;
use App\Filament\Resources\AssetLoans\Pages\ViewAssetLoan;
use App\Filament\Resources\AssetLoans\Schemas\AssetLoanForm;
use App\Filament\Resources\AssetLoans\Schemas\AssetLoanInfolist;
use App\Filament\Resources\AssetLoans\Tables\AssetLoansTable;
use App\Models\AssetLoan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AssetLoanResource extends Resource
{
    protected static ?string $model = AssetLoan::class;

    protected static string|UnitEnum|null $navigationGroup = 'Transaksi Aset';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowRightOnRectangle;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::ArrowRightOnRectangle;

    public static function getNavigationLabel(): string
    {
        return 'Peminjaman';
    }

    public static function getModelLabel(): string
    {
        return 'Peminjaman';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Peminjaman';
    }

    protected static ?int $navigationSort = 31;

    public static function form(Schema $schema): Schema
    {
        return AssetLoanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AssetLoanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssetLoansTable::configure($table);
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
            'index' => ListAssetLoans::route('/'),
            'create' => CreateAssetLoan::route('/create'),
            'view' => ViewAssetLoan::route('/{record}'),
            'edit' => EditAssetLoan::route('/{record}/edit'),
        ];
    }
}
