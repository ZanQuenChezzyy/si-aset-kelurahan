<?php

namespace App\Filament\Exports;

use App\Models\Asset;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class AssetExporter extends Exporter
{
    protected static ?string $model = Asset::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('asset_code')->label('Kode Aset'),
            ExportColumn::make('name')->label('Nama Aset'),
            ExportColumn::make('category.name')->label('Kategori'),
            ExportColumn::make('brand.name')->label('Merek'),
            ExportColumn::make('department.name')->label('Departemen'),
            ExportColumn::make('location.name')->label('Lokasi'),
            ExportColumn::make('purchase_date')->label('Tgl Beli'),
            ExportColumn::make('purchase_price')->label('Harga (Rp)'),
            ExportColumn::make('condition')->label('Kondisi Fisik'),
            ExportColumn::make('status')->label('Status Aset'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your asset export has completed and '.Number::format($export->successful_rows).' '.str('row')->plural($export->successful_rows).' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.Number::format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to export.';
        }

        return $body;
    }
}
