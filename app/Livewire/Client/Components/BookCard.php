<?php

namespace App\Livewire\Client\Components;

use App\Models\Sach;
use Livewire\Component;
use Livewire\WithPagination;

class BookCard extends Component
{
    use WithPagination;

    public $filters = []; // Các bộ lọc (ví dụ: tác giả, thể loại, năm xuất bản, v.v.)

    protected $listeners = ['filtersChanged'];
    public $selectedBook = null;
    public function filtersChanged($filters)
    {
        // Cập nhật bộ lọc khi có sự kiện từ bên ngoài
        $this->filters = $filters;
        $this->resetPage(); // Reset về trang đầu tiên khi bộ lọc thay đổi
    }
    public $showModal = false;   // Điều khiển hiển thị modal


    public function showBookDetails($bookId)
    {
        $this->selectedBook = Sach::find($bookId); // Lấy thông tin sách
        $this->showModal = true;                  // Hiển thị modal
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedBook = null;
    }

    public function render()
    {
        $query = Sach::query()->with(['tacGia', 'nhaXuatBan', 'theLoai']); // Tải trước các mối quan hệ

        // Áp dụng các bộ lọc
        if (!empty($this->filters)) {
            if (!empty($this->filters['tac_gia_id'])) {
                $query->where('tac_gia_id', $this->filters['tac_gia_id']);
            }
            if (!empty($this->filters['the_loai_id'])) {
                $query->where('the_loai_id', $this->filters['the_loai_id']);
            }
            if (!empty($this->filters['nam_xuat_ban'])) {
                $query->where('nam_xuat_ban', $this->filters['nam_xuat_ban']);
            }
        }

        // Phân trang kết quả
        $books = $query->paginate(12);

        return view('livewire.client.components.book-card', [
            'books' => $books
        ]);
    }
}