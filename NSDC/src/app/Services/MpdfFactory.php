<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;

class MpdfFactory
{
    public function make(array $config = []): Mpdf
    {
        $tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'nsdc-mpdf';
        File::ensureDirectoryExists($tempDir);

        $defaultConfig = (new ConfigVariables())->getDefaults();
        $defaultFontConfig = (new FontVariables())->getDefaults();

        return new Mpdf(array_replace_recursive([
            'mode' => 'utf-8',
            'fontDir' => array_merge($defaultConfig['fontDir'], [
                public_path('fonts'),
            ]),
            'fontdata' => $defaultFontConfig['fontdata'] + [
                'solaimanlipi' => [
                    'R' => 'SolaimanLipi.ttf',
                    'useOTL' => 0xFF,
                ],
            ],
            'default_font' => 'solaimanlipi',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'useSubstitutions' => true,
            'tempDir' => $tempDir,
        ], $config));
    }
}
