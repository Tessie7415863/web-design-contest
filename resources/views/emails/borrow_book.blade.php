@component('mail::message')
# Thông tin mượn sách

Chào bạn **{{ $phieuMuon->sinhvien->ho_ten ?? 'Sinh viên' }}**,

Bạn đã mượn thành công cuốn sách **{{ $sach->ten_sach }}**.

**Thông tin chi tiết:**

- **Ngày mượn:** {{ $ngay_muon }}
- **Ngày hẹn trả:** {{ $ngay_hen_tra }}
- **Tác giả:** {{ $sach->tacGia->ho_ten ?? 'Không rõ' }}
- **Thể loại:** {{ $sach->theLoai->ten_the_loai ?? 'Không rõ' }}
- **Năm xuất bản:** {{ $sach->nam_xuat_ban ?? 'Không rõ' }}
- **Vị trí trong thư viện:** {{ $cuonSach->viTriSach->khu_vuc }},
{{ $cuonSach->viTriSach->tuong }},
{{ $cuonSach->viTriSach->ke }}

Vui lòng kiểm tra thông tin trên và liên hệ thư viện nếu có thắc mắc.
Bạn vui lòng lấy sách trong vòng 3 ngày nếu không sách sẽ được cho người khác mượn.

Trân trọng,<br>
**Thư viện ITC**
@endcomponent