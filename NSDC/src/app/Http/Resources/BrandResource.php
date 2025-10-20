<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
   
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'brand_name' => $this->b_name,
            'status' => $this->status
        ];
    }
}
