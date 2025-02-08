<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('phats', function (Blueprint $table) {
            $table->foreignId('sinh_vien_id')->after('phieu_tra_id')->constrained('sinh_viens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sach_id')->after('sinh_vien_id')->constrained('sachs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phats', function (Blueprint $table) {
            $table->dropForeign(['sinh_vien_id']);
            $table->dropForeign(['sach_id']);
            $table->dropColumn(['sinh_vien_id', 'sach_id']);
        });
    }
};