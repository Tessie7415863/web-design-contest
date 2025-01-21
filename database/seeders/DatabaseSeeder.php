<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RolesAndPermissionsSeeder::class,
            BoPhanSeeder::class,
            KhoaSeeder::class,
            NganhSeeder::class,
        ]);
        $this->call([
            SinhVienSeeder::class,
            NhanVienSeeder::class,
            TheLoaiSeeder::class,

            LoaiTaiLieuSeeder::class,
            TacGiaSeeder::class,
            NhaXuatBanSeeder::class,
            MonHocSeeder::class,
            SachSeeder::class,
            TaiLieuMoSeeder::class,
            ViTriSachSeeder::class,
            CuonSachSeeder::class,
            PhieuMuonSeeder::class,
            PhieuTraSeeder::class,
            DatSachSeeder::class,
            PhatSeeder::class,
            HoaDonPhatSeeder::class,
            // BookSubjectSeeder::class,
            // DigitalResourceSubjectSeeder::class,
            // LienKetSachNganhSeeder::class,
            // DigitalResourceMajorSeeder::class,
        ]);
    }
}