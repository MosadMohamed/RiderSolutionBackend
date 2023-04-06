<?php

namespace App\Http\Resources\Rider;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'IDCompany'     => $this->IDCompany,
            'CompanyNameEn' => $this->CompanyNameEn,
            'CompanyNameAr' => $this->CompanyNameAr,
            'CompanyImage'  => asset('images/companies/' . $this->CompanyImage),
            'Is_Requisted'  => ($this->Is_Requisted) ? $this->Is_Requisted : 0,
        ];
    }
}
