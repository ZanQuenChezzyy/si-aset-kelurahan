<div class="flex flex-col items-center justify-center p-4">
    <div class="mb-4">
        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($record->asset_code) !!}
    </div>
    <div class="text-lg font-bold text-gray-900 dark:text-white">{{ $record->asset_code }}</div>
    <div class="text-sm text-gray-600 dark:text-gray-300">{{ $record->name }}</div>
    <button onclick="window.print()" class="mt-4 px-4 py-2 bg-primary-600 text-white rounded shadow hover:bg-primary-500">
        Print QR Code
    </button>
</div>
