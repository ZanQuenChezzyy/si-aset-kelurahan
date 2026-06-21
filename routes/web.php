<?php

use App\Models\Asset;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

Route::get('/assets/{asset}/print-qr', function (Asset $asset) {
    $pdf = Pdf::loadView('filament.pages.print-qr', ['record' => $asset])
        ->setPaper([0, 0, 226.77, 226.77]); // 80x80 mm in points

    return $pdf->stream('QR_Code_'.$asset->asset_code.'.pdf');
})->name('assets.print-qr');
