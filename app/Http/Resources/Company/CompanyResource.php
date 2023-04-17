<?php

namespace App\Http\Resources\Company;

use Carbon\Carbon;
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
            'CompanyEmail'  => $this->CompanyEmail,
            'CompanyPhone'  => $this->CompanyPhone,
            'CompanyImage'  => asset('images/company' . $this->CompanyImage),
            'CompanyActive' => (int) $this->CompanyActive,
        ];
    }
}
