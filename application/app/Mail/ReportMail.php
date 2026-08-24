<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Report;

use Illuminate\Contracts\Queue\ShouldQueue;

class ReportMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Laporan Anda')
            ->view('emails.report'); // Pastikan view ini ADA
    }
}

