<?php

namespace App\Exports;

use App\Models\Uddokta;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class UddoktaExport implements FromView
{
    protected $uddoktas;
    protected $request;


    public function __construct($uddoktas, Request $request)
    {
        $this->uddoktas = $uddoktas;
        $this->request = $request;
    }

    public function charset(): string
    {
        return 'UTF-8';
    }

    public function view(): View
    {
        $headers = [
            __('label.entrepreneur.type'),
            __('label.entrepreneur.reg.no'),
            __('label.entrepreneur.name'),
            __('label.mother.name'),
            __('label.father.name'),
            __('label.husband.name'),
            __('label.division'),
            __('label.district'),
            __('label.present.address'),
            __('label.permanent.address'),
            __('label.birth.date'),
            __('label.phone.number'),
            __('label.nid'),
            __('label.email'),
            __('label.secretary.name'),
            __('label.secretary.phone.number'),
            __('label.secretary.email'),
            __('label.secretary.nid'),
            __('label.secretary.address'),
            __('label.association.name'),
            __('label.association.address'),
            __('label.name.organization.managed'),
            __('label.organization.address'),
            __('label.organization.email'),
            __('label.product.type'),
            __('label.product.desciption'),
            __('label.online.shop.name'),
            __('label.online.shop.url'),
            __('label.tin'),
            __('label.vat'),
            __('label.association.reg.certificate'),
            __('label.association.trade.license'),
            __('label.association.constitution'),
            __('label.association.executive.council'),
            __('label.association.president.nid'),
            __('label.association.editor.nid'),
        ];

        $uddoktas = $this->uddoktas->map(function ($uddokta) {
            $data = [];
            foreach ($uddokta->toArray() as $key => $value) {
                $data[$key] = iconv('UTF-8', 'UTF-8', $value);
            }
            return $data;
        });
        return view('backend.pages.exports.index', [
            'uddoktas' => $this->uddoktas,
            'headers' => $headers,
        ]);
    }
}
