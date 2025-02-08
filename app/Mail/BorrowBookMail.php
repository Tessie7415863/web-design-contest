<?php

namespace App\Mail;

use App\Models\CuonSach;
use App\Models\PhieuMuon;
use App\Models\Sach;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BorrowBookMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sach;
    public $cuonSach;
    public $phieuMuon;

    /**
     * Create a new message instance.
     */
    public function __construct(Sach $sach, CuonSach $cuonSach, PhieuMuon $phieuMuon)
    {
        $this->sach = $sach;
        $this->cuonSach = $cuonSach;
        $this->phieuMuon = $phieuMuon;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Borrow Book Mail',
        );
    }

    public function build()
    {
        return $this->markdown('emails.borrow_book')
            ->with([
                'sach' => $this->sach,
                'cuonSach' => $this->cuonSach,
                'phieuMuon' => $this->phieuMuon,
                'ngay_muon' => Carbon::parse($this->phieuMuon->ngay_muon)->format('d/m/Y'),
                'ngay_hen_tra' => Carbon::parse($this->phieuMuon->ngay_hen_tra)->format('d/m/Y'),
            ]);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.borrow_book',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}