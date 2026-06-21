<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Department;
use App\Models\Location;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder hak akses dan pengguna milik user
        $this->call([
            UserRolePermissionSeeder::class,
        ]);

        $departments = [
            Department::create(['name' => 'Pelayanan Umum', 'description' => 'Seksi Pelayanan Umum']),
            Department::create(['name' => 'Kesejahteraan Sosial', 'description' => 'Seksi Kesejahteraan Sosial']),
            Department::create(['name' => 'Pemerintahan', 'description' => 'Seksi Pemerintahan']),
        ];

        $locations = [
            Location::create(['name' => 'Ruang Pelayanan', 'description' => 'Ruang Utama Lantai 1']),
            Location::create(['name' => 'Ruang Lurah', 'description' => 'Ruang Kepala Kelurahan Lantai 2']),
            Location::create(['name' => 'Gudang Logistik', 'description' => 'Gudang Penyimpanan Kelurahan Lantai Dasar']),
        ];

        $brands = [
            Brand::create(['name' => 'Asus', 'description' => 'Peralatan Komputer']),
            Brand::create(['name' => 'Epson', 'description' => 'Peralatan Printer']),
            Brand::create(['name' => 'IKEA', 'description' => 'Perabotan Kantor']),
            Brand::create(['name' => 'Honda', 'description' => 'Kendaraan Bermotor']),
        ];

        $vendors = [
            Vendor::create(['name' => 'PT. Komputerindo Kelurahan', 'email' => 'budi@komputerindo.com', 'phone' => '0812345678', 'address' => 'Jalan Merdeka No 1']),
            Vendor::create(['name' => 'CV. Perabot Nyaman', 'email' => 'agus@perabotnyaman.com', 'phone' => '0812999888', 'address' => 'Jalan Sudirman No 5']),
        ];

        $categories = [
            Category::create(['name' => 'Elektronik & IT', 'description' => 'Komputer, Printer, Scanner']),
            Category::create(['name' => 'Mebel & Perabotan', 'description' => 'Meja, Kursi, Lemari']),
            Category::create(['name' => 'Kendaraan Operasional', 'description' => 'Motor, Mobil Dinas']),
        ];

        // Buat 15 Data Aset Dummy
        for ($i = 1; $i <= 15; $i++) {
            Asset::create([
                'name' => 'Aset Kelurahan '.$i,
                'category_id' => $categories[array_rand($categories)]->id,
                'brand_id' => $brands[array_rand($brands)]->id,
                'vendor_id' => $vendors[array_rand($vendors)]->id,
                'location_id' => $locations[array_rand($locations)]->id,
                'department_id' => $departments[array_rand($departments)]->id,
                'purchase_date' => now()->subDays(rand(1, 365)),
                'purchase_price' => rand(10, 200) * 100000,
                'condition' => ['Baik', 'Rusak Ringan', 'Rusak Berat'][rand(0, 2)],
                'status' => ['Tersedia', 'Dipinjam', 'Diperbaiki', 'Dihapuskan'][rand(0, 3)],
                'description' => 'Aset pengadaan otomatis dari Seeder',
            ]);
        }
    }
}
