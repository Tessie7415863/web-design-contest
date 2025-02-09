<?php

namespace App\Livewire\Admin\Phieutra;

use App\Models\DatSach;
use App\Models\HoaDonPhat;
use App\Models\Phat;
use App\Models\PhieuMuon;
use App\Models\PhieuTra;
use Carbon\Carbon;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $phieu_muon_id, $ngay_tra, $tinh_trang;
    public $deletePhieuTra;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;

    public function render()
    {
        $phieutras = PhieuTra::paginate(10);
        $phieumuons = PhieuMuon::all();
        return view('livewire.admin.phieutra.main', compact('phieumuons', 'phieutras'));
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->isModalOpen = false;
    }

    public function openConfirmModal($id)
    {
        $this->deletePhieuTra = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deletePhieuTra = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->phieu_muon_id = null;
        $this->ngay_tra = null;
        $this->tinh_trang = null;
        $this->isEditMode = false;
    }

    public function createPhieuTra(FlasherInterface $flasher)
    {
        // Validate dữ liệu đầu vào
        $this->validate([
            'phieu_muon_id' => 'required|exists:phieu_muons,id',
            'ngay_tra'      => 'required',
            'tinh_trang'    => 'required',
        ]);

        // Tạo phiếu trả
        $phieuTra = PhieuTra::create([
            'phieu_muon_id' => $this->phieu_muon_id,
            'ngay_tra'      => $this->ngay_tra,
            'tinh_trang'    => $this->tinh_trang,
        ]);

        // Lấy phiếu mượn tương ứng để so sánh ngày hẹn trả
        $phieuMuon = PhieuMuon::find($this->phieu_muon_id);

        // Chuyển đổi ngày trả và ngày hẹn trả sang đối tượng Carbon
        $ngayTra    = Carbon::parse($this->ngay_tra);
        $ngayHenTra = Carbon::parse($phieuMuon->ngay_hen_tra);
        $phieuMuon->update(['ngay_tra' => $ngayTra, 'tinh_trang' => 'DaTra']);

        // Nếu ngày trả thực tế muộn hơn ngày hẹn trả
        if ($ngayTra->greaterThan($ngayHenTra)) {
            // Tính số ngày trễ
            $soNgayTre = $ngayTra->diffInDays($ngayHenTra);
            // Tính số tiền phạt (2.000 đồng mỗi ngày trễ)
            $soTien = $soNgayTre * 2000;

            // Lấy thông tin sách thông qua bản ghi đặt sách (DatSach)
            // (Giả sử sinh viên chỉ có 1 bản ghi đặt sách gần đây)
            $sinhVien = Auth::guard('sinhvien')->user();
            $datSachRecord = DatSach::where('sinh_vien_id', $sinhVien->id)
                ->orderBy('ngay_dat', 'desc')
                ->first();

            // Nếu bản ghi đặt sách tồn tại và có quan hệ cuonSach hợp lệ, lấy sach_id
            $sach_id = ($datSachRecord && $datSachRecord->cuonSach)
                ? $datSachRecord->cuonSach->sach_id
                : null;
            // Tạo phiếu phạt (Phat)
            $phat = Phat::create([
                'phieu_tra_id' => $phieuTra->id,
                'sinh_vien_id' => $phieuMuon->sinh_vien_id,
                'sach_id'      => $sach_id,
                'so_tien'      => $soTien,
                'ly_do'        => "Trễ trả sách: {$soNgayTre} ngày",
                'tinh_trang'   => 'ChuaThanhToan',
            ]);
        }
        HoaDonPhat::create([
            'phat_id'         => $phat->id,
            'ngay_lap'        => Carbon::now(),
            'ngay_thanh_toan' => null,
            'trang_thai'      => 'ChuaThanhToan',
        ]);
        $flasher->addSuccess('Tạo phiếu trả thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editPhieuTra($id)
    {

        $phieutra = PhieuTra::findOrFail($id);
        $this->id = $phieutra->id;
        $this->phieu_muon_id = $phieutra->phieu_muon_id;
        $this->ngay_tra = $phieutra->ngay_tra;
        $this->tinh_trang = $phieutra->tinh_trang;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updatePhieuTra(FlasherInterface $flasher)
    {
        $this->validate([
            'phieu_muon_id' => 'required|exists:phieu_muons,id',
            'ngay_tra' => 'required',
            'tinh_trang' => 'required',
        ]);
        $phieutra = PhieuTra::findOrFail($this->id);
        $phieutra->update([
            'phieu_muon_id' => $this->phieu_muon_id,
            'ngay_tra' => $this->ngay_tra,
            'tinh_trang' => $this->tinh_trang,
        ]);
        $flasher->addSuccess('Cập nhật phiếu trả thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deletePhieuTra(FlasherInterface $flasher)
    {
        if ($this->deletePhieuTra) {
            PhieuTra::findOrFail($this->deletePhieuTra)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá phiếu trả thành công!');
        }
    }
}
