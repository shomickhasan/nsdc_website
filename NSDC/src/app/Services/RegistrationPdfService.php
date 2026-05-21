<?php

namespace App\Services;

use App\Models\Backend\Regestration;

class RegistrationPdfService
{
    public function __construct(
        protected MpdfFactory $mpdfFactory
    ) {
    }

    public function output(Regestration $reg): string
    {
        $mpdf = $this->mpdfFactory->make([
            'format' => 'A4',
            'orientation' => 'P',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 8,
            'margin_bottom' => 8,
        ]);

        $mpdf->WriteHTML(view('frontend.pdf.registration_pdf', compact('reg'))->render());

        return $mpdf->Output('', 'S');
    }
}
