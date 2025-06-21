<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabkota;
use App\Models\JenisFaskes;
use App\Models\Kategori;
use App\Models\Faskes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create regular user
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create sample provinsi
        $jatim = Provinsi::create([
            'nama' => 'Jawa Timur',
            'ibukota' => 'Surabaya',
            'latitude' => -7.250445,
            'longitude' => 112.768845,
        ]);

        $jateng = Provinsi::create([
            'nama' => 'Jawa Tengah',
            'ibukota' => 'Semarang',
            'latitude' => -6.993194,
            'longitude' => 110.420761,
        ]);

        // Create sample kabkota
        $surabaya = Kabkota::create([
            'nama' => 'Kota Surabaya',
            'latitude' => -7.257472,
            'longitude' => 112.752088,
            'provinsi_id' => $jatim->id,
        ]);

        $malang = Kabkota::create([
            'nama' => 'Kota Malang',
            'latitude' => -7.966620,
            'longitude' => 112.632632,
            'provinsi_id' => $jatim->id,
        ]);

        $semarang = Kabkota::create([
            'nama' => 'Kota Semarang',
            'latitude' => -7.005145,
            'longitude' => 110.438125,
            'provinsi_id' => $jateng->id,
        ]);

        // Create jenis faskes
        $rs = JenisFaskes::create(['nama' => 'Rumah Sakit']);
        $puskesmas = JenisFaskes::create(['nama' => 'Puskesmas']);
        $klinik = JenisFaskes::create(['nama' => 'Klinik']);
        $apotek = JenisFaskes::create(['nama' => 'Apotek']);

        // Create kategori
        $negeri = Kategori::create(['nama' => 'Negeri']);
        $swasta = Kategori::create(['nama' => 'Swasta']);

        // Create sample faskes
        Faskes::create([
            'nama' => 'RSUD Dr. Soetomo',
            'nama_pengelola' => 'Pemerintah Provinsi Jawa Timur',
            'alamat' => 'Jl. Mayjen Prof. Dr. Moestopo No.6-8, Airlangga, Gubeng, Surabaya',
            'website' => 'https://rsud.soetomo.go.id',
            'email' => 'info@rsud.soetomo.go.id',
            'kabkota_id' => $surabaya->id,
            'rating' => 5,
            'latitude' => -7.269206,
            'longitude' => 112.760133,
            'jenis_faskes_id' => $rs->id,
            'kategori_id' => $negeri->id,
        ]);

        Faskes::create([
            'nama' => 'RS Siloam Surabaya',
            'nama_pengelola' => 'PT Siloam International Hospitals',
            'alamat' => 'Jl. Raya Gubeng No.70, Gubeng, Surabaya',
            'website' => 'https://siloamhospitals.com',
            'email' => 'surabaya@siloamhospitals.com',
            'kabkota_id' => $surabaya->id,
            'rating' => 4,
            'latitude' => -7.265757,
            'longitude' => 112.752193,
            'jenis_faskes_id' => $rs->id,
            'kategori_id' => $swasta->id,
        ]);

        Faskes::create([
            'nama' => 'Puskesmas Gubeng',
            'nama_pengelola' => 'Dinas Kesehatan Kota Surabaya',
            'alamat' => 'Jl. Gubeng Pojok No.24, Gubeng, Surabaya',
            'email' => 'puskesmas.gubeng@surabaya.go.id',
            'kabkota_id' => $surabaya->id,
            'rating' => 3,
            'latitude' => -7.265045,
            'longitude' => 112.751892,
            'jenis_faskes_id' => $puskesmas->id,
            'kategori_id' => $negeri->id,
        ]);

        Faskes::create([
            'nama' => 'RSU dr. Saiful Anwar Malang',
            'nama_pengelola' => 'Universitas Brawijaya',
            'alamat' => 'Jl. Jaksa Agung Suprapto No.2, Klojen, Malang',
            'website' => 'https://rssa.malang.ac.id',
            'email' => 'info@rssa.malang.ac.id',
            'kabkota_id' => $malang->id,
            'rating' => 5,
            'latitude' => -7.966720,
            'longitude' => 112.633832,
            'jenis_faskes_id' => $rs->id,
            'kategori_id' => $negeri->id,
        ]);

        Faskes::create([
            'nama' => 'RSUP Dr. Kariadi Semarang',
            'nama_pengelola' => 'Universitas Diponegoro',
            'alamat' => 'Jl. Dr. Sutomo No.16, Randusari, Semarang Selatan',
            'website' => 'https://rskariadi.co.id',
            'email' => 'info@rskariadi.co.id',
            'kabkota_id' => $semarang->id,
            'rating' => 4,
            'latitude' => -7.003245,
            'longitude' => 110.438225,
            'jenis_faskes_id' => $rs->id,
            'kategori_id' => $negeri->id,
        ]);
    }
}
