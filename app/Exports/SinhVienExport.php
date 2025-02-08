<?php

namespace App\Exports;

use App\Models\SinhVien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SinhVienExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return SinhVien::select('id', 'ho_ten', 'ngay_sinh', 'lop', 'email', 'tai_khoan', 'sdt', 'dia_chi')->get();
    }

    public function headings(): array
    {
        return ["ID", "Họ Tên", "Ngày Sinh", "Lớp", "Email", "Tài Khoản", "Số Điện Thoại", "Địa Chỉ"];
    }
}