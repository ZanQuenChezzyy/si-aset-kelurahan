<div class="flex flex-col items-center justify-center p-6 space-y-6">
    <div class="p-4 bg-white rounded-xl shadow-sm ring-1 ring-gray-950/5">
        {{-- Generate QR Code --}}
        <div class="flex justify-center">
            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(250)
                    ->style('round')
                    ->eye('circle')
                    ->margin(1)
                    ->color(17, 24, 39) 
                    ->generate(route('filament.admin.resources.assets.view', $record)) !!}
        </div>
        
        <div class="mt-4 text-center">
            <h3 class="text-lg font-bold text-gray-900">
                {{ $record->asset_code }}
            </h3>
            <p class="text-sm text-gray-500">
                {{ $record->name }}
            </p>
            <p class="text-xs text-gray-400 mt-1">
                Kelurahan Tanjung Laut Indah
            </p>
        </div>
    </div>

    <div class="flex gap-3">
        <a 
            href="{{ route('assets.print-qr', $record) }}" 
            target="_blank"
            class="filament-button inline-flex items-center justify-center py-2 gap-2 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-success-600 hover:bg-success-500 focus:bg-success-700 focus:ring-offset-success-700"
            style="background-color: #10b981; color: white; text-decoration: none;"
        >
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
            </svg>
            Cetak Label QR
        </a>
    </div>
</div>
