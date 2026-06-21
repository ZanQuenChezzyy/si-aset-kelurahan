<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak QR Code - {{ $record->asset_code }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            /* Border dihapus agar tidak terpotong tepi stiker */
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        .qr-code {
            margin-bottom: 5px;
            margin-top: 10px;
        }
        .asset-code {
            font-size: 14px;
            font-weight: bold;
            margin: 0 0 5px 0;
            color: #000;
        }
        .asset-name {
            font-size: 11px;
            color: #333;
            margin: 0 0 10px 0;
            line-height: 1.2;
            height: 26px; /* Maksimal 2 baris */
            overflow: hidden;
        }
        .instansi {
            font-size: 9px;
            color: #666;
            margin: 0;
            border-top: 1px dashed #ccc;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="qr-code">
            <img src="data:image/svg+xml;base64,{!! base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(90)->margin(0)->generate(route('filament.admin.resources.assets.view', $record))) !!}" alt="QR Code" width="90" height="90">
        </div>
        <h3 class="asset-code">{{ $record->asset_code }}</h3>
        <p class="asset-name">{{ Str::limit($record->name, 40) }}</p>
        <p class="instansi">Pemerintah Kota Bontang<br>Kelurahan Tanjung Laut Indah</p>
    </div>
</body>
</html>
