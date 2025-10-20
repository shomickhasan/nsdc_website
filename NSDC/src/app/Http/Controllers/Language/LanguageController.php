<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request, $locale)
    {
        $request->session()->put('locale', $locale);
        return redirect()->back();
    }
}
