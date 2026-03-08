<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\Vehicle;  // Sesuaikan dengan model Anda


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat instance Faker
        $faker = Faker::create();

        // Tentukan jumlah data yang ingin diinsert
        $count = 80; // 120 data dummy

        // Insert data menggunakan loop
        for ($i = 0; $i < $count; $i++) {
            Vehicle::create([
                'vehicle_name' => $faker->word,  // Nama kendaraan
                'barcode' => (string) Str::uuid(),  // Gunakan UUID untuk barcode
                'barcodes' => $faker->unique()->word, // Pastikan barcodes unik
                'user_peralatan' => $faker->name,  // Nama user
                'vehicle_condition' => $faker->randomElement(['Serviceable', 'Unserviceable']),  // Status kendaraan
                'vehicle_type' => $faker->word,  // Jenis kendaraan
                'klasifikasi_kendaraan' => $faker->randomElement(['PKPPK', 'Alat Alat Berat','Operasional','Motor Dinas','Peralatan','Crash Car']),
                'tanggal_oli' => $faker->date(),  // Tanggal oli
                'vol_tangki' => $faker->randomFloat(2, 30, 150),  // Volume tangki
                'oli_selanjutnya' => $faker->date(),  // Tanggal oli selanjutnya
                'odo_meter' => $faker->randomNumber(5, true),  // Odometer
                'no_polisi' => $faker->bothify('??-####-???'),  // Nomor polisi
                'tahun' => $faker->year(),  // Tahun kendaraan
                'lokasi' => $faker->address,  // Lokasi
                'no_aset' => (string) Str::uuid(),  // Nomor aset, menggunakan UUID
                'no_rangka' => (string) Str::uuid(),  // Nomor rangka, menggunakan UUID
                'no_mesin' => (string) Str::uuid(),  // Nomor mesin, menggunakan UUID
                'engine' => $faker->word,  // Tipe engine
                'kap_silinder' => $faker->randomNumber(2),  // Kapasitas silinder
                'transmisi' => $faker->randomElement(['Manual', 'Automatic']),  // Transmisi
                'bakar_jenis' => $faker->randomElement(['Bensin', 'Solar']),  // Jenis bahan bakar
                'bakar_kapasitas' => $faker->randomFloat(1, 30, 100),  // Kapasitas bahan bakar
                'oli_mesin_volume1' => $faker->randomFloat(2, 1, 5),  // Volume oli mesin 1
                'oli_mesin_jenis1' => $faker->word,  // Jenis oli mesin 1
                'oli_mesin_volume2' => $faker->randomFloat(2, 1, 5),  // Volume oli mesin 2
                'oli_mesin_jenis2' => $faker->word,  // Jenis oli mesin 2
                'oli_transmisi_volume' => $faker->randomFloat(2, 1, 5),  // Volume oli transmisi
                'oli_transmisi_jenis' => $faker->word,  // Jenis oli transmisi
                'oli_gardan_volume' => $faker->randomFloat(2, 1, 5),  // Volume oli gardan
                'oli_gardan_jenis' => $faker->word,  // Jenis oli gardan
                'oli_hydrolis_volume' => $faker->randomFloat(2, 1, 5),  // Volume oli hidrolis
                'oli_hydrolis_oli' => $faker->word,  // Jenis oli hidrolis
                'ban_depan' => $faker->word,  // Ban depan
                'ban_belakang' => $faker->word,  // Ban belakang
                'ban_jumlah' => $faker->numberBetween(2, 8),  // Jumlah ban
                'accu1_spesifikasi' => $faker->word,  // Spesifikasi accu 1
                'accu2_spesifikasi' => $faker->word,  // Spesifikasi accu 2
                'accu1_jumlah' => $faker->numberBetween(1, 2),  // Jumlah accu 1
                'accu2_jumlah' => $faker->numberBetween(1, 2),  // Jumlah accu 2
                'foto_kendaraan' => $faker->imageUrl(640, 480, 'vehicles'),  // URL gambar kendaraan
                'bagian' => 'Tidak Ada',  // Bagian kendaraan (default value)
                'oli_keterangan' => 'Cukup',  // Keterangan oli
            ]);
        }
    }
}
