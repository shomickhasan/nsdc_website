<?php

namespace App\Jobs;

use App\Models\Backend\Regestration;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;


class RegistrationPDFEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $registration_id;
    protected $mail_to;
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
            $reg = Regestration::with('course')->findOrFail($this->registration_id);

            $pdf = Pdf::loadView('frontend.pdf.registration_pdf', compact('reg'))
                ->setPaper('A4', 'portrait');

            $pdf_content = $pdf->output();

            Mail::send([], [], function ($message) use ($pdf_content, $reg) {
                $message->to($this->mail_to)
                    ->subject('Admission Form')
                    ->attachData($pdf_content, 'Admission_Form_'.$reg->id.'.pdf', [
                        'mime' => 'application/pdf',
                    ])
                    ->html('
                            <p>Dear '.$reg->name.',</p>
                            <p>Please find your admission form attached (Office Copy + Student Copy).</p>
                            <p>Thank you.</p>
                        ');
            });

        } catch (Exception $e) {
            Log::error('PDF Email Job Failed | ' . $e->getMessage());
        }
    }

}
