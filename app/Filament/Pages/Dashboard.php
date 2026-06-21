<?php

namespace App\Filament\Pages;

use App\Filament\Exports\AssetExporter;
use App\Models\Asset;
use BackedEnum;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\ExportAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Halaman Utama';

    protected static string $routePath = '/';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::Home;

    protected static ?int $navigationSort = -2;

    protected function getHeaderActions(): array
    {
        $formSchema = [
            Select::make('bulan')
                ->options([
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
                ])
                ->default(date('m'))
                ->required()
                ->native(false),
            TextInput::make('tahun')
                ->numeric()
                ->default(date('Y'))
                ->required(),
        ];

        return [
            ExportAction::make('export_excel')
                ->label('Export Excel')
                ->icon('heroicon-o-table-cells')
                ->color('success')
                ->exporter(AssetExporter::class)
                ->form($formSchema)
                ->modalHeading('Export Laporan Excel')
                ->modalDescription('Pilih periode bulan dan tahun untuk mengekspor laporan aset ke dalam format Excel (CSV).')
                ->modifyQueryUsing(function ($query, array $data) {
                    return $query
                        ->whereMonth('purchase_date', $data['bulan'])
                        ->whereYear('purchase_date', $data['tahun']);
                }),

            Action::make('cetak_pdf')
                ->label('Cetak PDF')
                ->icon('heroicon-o-printer')
                ->form($formSchema)
                ->modalHeading('Cetak Laporan PDF')
                ->modalDescription('Pilih periode bulan dan tahun untuk mencetak laporan aset berformat PDF.')
                ->action(function (array $data) {
                    $assets = Asset::with(['category', 'brand', 'location', 'department'])
                        ->whereMonth('purchase_date', $data['bulan'])
                        ->whereYear('purchase_date', $data['tahun'])
                        ->get();

                    $pdf = Pdf::loadView('pdf.laporan-aset', [
                        'assets' => $assets,
                        'bulan' => $data['bulan'],
                        'tahun' => $data['tahun'],
                    ])->setPaper('a4', 'landscape');

                    return response()->streamDownload(fn () => print ($pdf->output()), 'Laporan_Aset_'.$data['bulan'].'_'.$data['tahun'].'.pdf');
                }),
        ];
    }
}
