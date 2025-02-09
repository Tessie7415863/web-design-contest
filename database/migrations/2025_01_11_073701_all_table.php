<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        // 1. bo_phans (Departments)
        Schema::create('bo_phans', function (Blueprint $table) {
            $table->id();
            $table->string('ten_bo_phan');
            $table->text('mo_ta')->nullable();
            $table->timestamps();
        });

        // 2. khoas (Faculty)
        Schema::create('khoas', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khoa');
            $table->string('dia_chi')->nullable();
            $table->string('sdt', 20)->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamps();
        });

        // 3. nganhs (Majors)
        Schema::create('nganhs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_nganh');
            $table->foreignId('khoa_id')->nullable()->constrained('khoas')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });

        // 4. sinh_viens (Students)
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->unique()->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ho_ten');
            $table->date('ngay_sinh')->nullable();
            $table->enum('gioi_tinh', ['Nam', 'Nu', 'Khac'])->default('Nam');
            $table->string('lop')->nullable();
            $table->string('email')->unique();
            $table->string('tai_khoan')->nullable();
            $table->string('password');
            $table->string('sdt', 20)->nullable();
            $table->string('dia_chi')->nullable();
            $table->timestamps();
        });

        // 5. nhan_viens (Staff)
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->nullable()->constrained('users')->onDelete('set null')->onUpdate('cascade');
            $table->string('ho_ten');
            $table->string('chuc_vu')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('sdt', 15)->nullable();
            $table->string('dia_chi')->nullable();
            $table->foreignId('bo_phan_id')->nullable()->constrained('bo_phans')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });

        // 6. the_loais (Categories)
        Schema::create('the_loais', function (Blueprint $table) {
            $table->id();
            $table->string('ten_the_loai');
            $table->text('mo_ta')->nullable();
            $table->timestamps();
        });


        // 8. tac_gias (Authors)
        Schema::create('tac_gias', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->text('thong_tin')->nullable();
            $table->timestamps();
        });

        // 9. nha_xuat_bans (Publishers)
        Schema::create('nha_xuat_bans', function (Blueprint $table) {
            $table->id();
            $table->string('ten_nha_xuat_ban');
            $table->string('dia_chi')->nullable();
            $table->string('sdt', 15)->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamps();
        });

        // 10. mon_hocs (Subjects)
        Schema::create('mon_hocs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_mon');
            $table->foreignId('nganh_id')->nullable()->constrained('nganhs')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });

        // 11. sachs (Books)
        Schema::create('sachs', function (Blueprint $table) {
            $table->id();
            $table->string('anh_bia')->nullable();
            $table->string('ten_sach');
            $table->foreignId('tac_gia_id')->nullable()->constrained('tac_gias')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('nha_xuat_ban_id')->nullable()->constrained('nha_xuat_bans')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('the_loai_id')->nullable()->constrained('the_loais')->onDelete('set null')->onUpdate('cascade');
            $table->year('nam_xuat_ban')->nullable();
            $table->integer('so_trang')->nullable();
            $table->string('isbn', 20)->unique()->nullable();
            $table->foreignId('mon_hoc_id')->nullable()->constrained('mon_hocs')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('nganh_id')->nullable()->constrained('nganhs')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('khoa_id')->nullable()->constrained('khoas')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });

        // 12. tai_lieu_mos (Digital Resources)
        Schema::create('tai_lieu_mos', function (Blueprint $table) {
            $table->id();
            $table->string('anh_bia')->nullable();
            $table->string('ten_tai_lieu');
            $table->foreignId('tac_gia_id')->nullable()->constrained('tac_gias')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('nha_xuat_ban_id')->nullable()->constrained('nha_xuat_bans')->onDelete('set null')->onUpdate('cascade');
            $table->year('nam_phat_hanh')->nullable();
            $table->integer('so_trang')->nullable();
            $table->string('isbn', 20)->unique()->nullable();
            $table->string('link_tai_ve')->nullable();
            $table->foreignId('khoa_id')->nullable()->constrained('khoas')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('mon_hoc_id')->nullable()->constrained('mon_hocs')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('nganh_id')->nullable()->constrained('nganhs')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });

        // 13. vi_tri_sachs (Book Locations)
        Schema::create('vi_tri_sachs', function (Blueprint $table) {
            $table->id();
            $table->string('khu_vuc')->nullable();
            $table->string('tuong')->nullable();
            $table->string('ke')->nullable();
            $table->timestamps();
        });

        // 14. cuon_sachs (Book Copies)
        Schema::create('cuon_sachs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sach_id')->constrained('sachs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vi_tri_sach_id')->nullable()->constrained('vi_tri_sachs')->onDelete('set null')->onUpdate('cascade');
            $table->enum('tinh_trang', ['Con', 'Muon', 'Bao_Tri', 'Mat'])->default('Con');
            $table->timestamps();
        });

        // 15. phieu_muons (Borrow Records)
        Schema::create('phieu_muons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sinh_vien_id')->constrained('sinh_viens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('nhan_vien_id')->nullable()->constrained('nhan_viens')->onDelete('set null')->onUpdate('cascade');
            $table->date('ngay_muon');
            $table->date('ngay_hen_tra')->nullable();
            $table->date('ngay_tra')->nullable();
            $table->enum('tinh_trang', ['DangMuon', 'DaTra', 'QuaHan'])->default('DangMuon');
            $table->timestamps();
        });

        // 16. phieu_tras (Return Records)
        Schema::create('phieu_tras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phieu_muon_id')->constrained('phieu_muons')->onDelete('cascade')->onUpdate('cascade');
            $table->date('ngay_tra');
            $table->enum('tinh_trang', ['HoanThanh', 'ChuaHoanThanh'])->default('HoanThanh');
            $table->timestamps();
        });

        // 17. dat_sachs (Reservations)
        Schema::create('dat_sachs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sinh_vien_id')->constrained('sinh_viens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cuon_sach_id')->constrained('cuon_sachs')->onDelete('cascade')->onUpdate('cascade');
            $table->date('ngay_dat');
            $table->enum('tinh_trang', ['DangDat', 'DaNhan', 'Huy'])->default('DangDat');
            $table->timestamps();
        });

        // 18. phats (Fines)
        Schema::create('phats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phieu_tra_id')->constrained('phieu_tras')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('so_tien', 10, 2);
            $table->text('ly_do')->nullable();
            $table->enum('tinh_trang', ['ChuaThanhToan', 'DaThanhToan'])->default('ChuaThanhToan');
            $table->timestamps();
        });

        // 19. hoa_don_phats (Fine Invoices)
        Schema::create('hoa_don_phats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phat_id')->constrained('phats')->onDelete('cascade')->onUpdate('cascade');
            $table->date('ngay_lap');
            $table->date('ngay_thanh_toan')->nullable();
            $table->enum('trang_thai', ['ChuaThanhToan', 'DaThanhToan'])->default('ChuaThanhToan');
            $table->timestamps();
        });

        // 21.1 book_subject (Books and Subjects)
        Schema::create('book_subject', function (Blueprint $table) {
            $table->foreignId('sach_id')->constrained('sachs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mon_hoc_id')->constrained('mon_hocs')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            $table->primary(['sach_id', 'mon_hoc_id']);
        });

        // 21.2 digital_resource_subject (Digital Resources and Subjects)
        Schema::create('digital_resource_subject', function (Blueprint $table) {
            $table->foreignId('tai_lieu_mo_id')->constrained('tai_lieu_mos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mon_hoc_id')->constrained('mon_hocs')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            $table->primary(['tai_lieu_mo_id', 'mon_hoc_id']);
        });

        // 21.3 lien_ket_sach_nganhs (Books and Majors)
        Schema::create('lien_ket_sach_nganhs', function (Blueprint $table) {
            $table->foreignId('sach_id')->constrained('sachs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('nganh_id')->constrained('nganhs')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            $table->primary(['sach_id', 'nganh_id']);
        });

        // 21.4 digital_resource_major (Digital Resources and Majors)
        Schema::create('digital_resource_major', function (Blueprint $table) {
            $table->foreignId('tai_lieu_mo_id')->constrained('tai_lieu_mos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('nganh_id')->constrained('nganhs')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->primary(['tai_lieu_mo_id', 'nganh_id']);
        });
        Schema::create('de_xuats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sinh_vien_id')->nullable()->constrained('sinh_viens')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tieu_de');
            $table->enum('loai', ['sach', 'tai_lieu'])->default('sach');
            $table->text('mo_ta')->nullable();
            $table->enum('trang_thai', ['ChuaXuLy', 'DaXuLy'])->default('ChuaXuLy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop pivot tables first
        Schema::dropIfExists('digital_resource_major');
        Schema::dropIfExists('lien_ket_sach_nganhs');
        Schema::dropIfExists('digital_resource_subject');
        Schema::dropIfExists('book_subject');

        // Drop main tables in reverse order
        Schema::dropIfExists('hoa_don_phats');
        Schema::dropIfExists('phats');
        Schema::dropIfExists('dat_sachs');
        Schema::dropIfExists('phieu_tras');
        Schema::dropIfExists('phieu_muons');
        Schema::dropIfExists('cuon_sachs');
        Schema::dropIfExists('vi_tri_sachs');
        Schema::dropIfExists('tai_lieu_mos');
        Schema::dropIfExists('sachs');
        Schema::dropIfExists('mon_hocs');
        Schema::dropIfExists('nha_xuat_bans');
        Schema::dropIfExists('tac_gias');
        Schema::dropIfExists('the_loais');
        Schema::dropIfExists('nhan_viens');
        Schema::dropIfExists('sinh_viens');
        Schema::dropIfExists('nganhs');
        Schema::dropIfExists('khoas');
        Schema::dropIfExists('bo_phans');
    }
};
