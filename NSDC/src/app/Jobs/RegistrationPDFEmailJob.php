<?php

namespace App\Jobs;

use App\Models\Backend\Regestration;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegistrationPDFEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $registration_id;
    protected string $mail_to;

    public function __construct($registration_id, $mail_to)
    {
        $this->registration_id = $registration_id;
        $this->mail_to = $mail_to;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $reg = Regestration::with([
                'course',
                'permanentDivision',
                'permanentDistrict',
                'permanentUpazila',
                'presentDivision',
                'presentDistrict',
                'presentUpazila',
            ])->findOrFail($this->registration_id);

            $pdf = Pdf::loadView('frontend.pdf.registration_pdf', compact('reg'))
                ->setPaper('A4', 'portrait');

            $pdfContent = $pdf->output();

            $studentName = $reg->full_name_en ?? $reg->name ?? 'Student';

            Mail::send([], [], function ($message) use ($pdfContent, $reg, $studentName) {
                $message->to($this->mail_to)
                    ->subject('Admission Form')
                    ->attachData($pdfContent, 'Admission_Form_' . $reg->id . '.pdf', [
                        'mime' => 'application/pdf',
                    ])
                    ->html("
                        <p>Dear {$studentName},</p>
                        <p>Please find your admission form attached.</p>
                        <p>Thank you.</p>
                    ");
            });
        } catch (Exception $e) {
            Log::error('Registration PDF Email Job Failed | Registration ID: ' . $this->registration_id . ' | Error: ' . $e->getMessage());
        }
    }
}
