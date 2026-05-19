<?php

namespace App\Services;

use App\Models\Backend\Regestration;
use Illuminate\Support\Facades\File;
use Mpdf\Mpdf;

class RegistrationPdfService
{
    public function output(Regestration $reg): string
    {
        $tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'nsdc-mpdf';
        File::ensureDirectoryExists($tempDir);

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'default_font' => 'freeserif',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'useSubstitutions' => true,
            'tempDir' => $tempDir,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 8,
            'margin_bottom' => 8,
        ]);

        $mpdf->WriteHTML(view('frontend.pdf.registration_pdf', compact('reg'))->render());

        return $mpdf->Output('', 'S');
    }
}
