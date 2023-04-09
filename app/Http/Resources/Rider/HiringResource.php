<?php

namespace App\Http\Resources\Rider;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HiringResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'IDHiring'      => $this->IDHiring,
            'IDCompany'     => (int)$this->IDCompany,
            'CompanyNameEn' => $this->Company->CompanyNameEn,
            'CompanyNameAr' => $this->Company->CompanyNameAr,
            'CompanyImage'  => asset('images/companies/' . $this->Company->CompanyImage),
            'HiringType'    => $this->HiringType,
            'HiringNote'    => $this->HiringNote,
            'Is_Applied'    => (int) ($this->Is_Applied) ? $this->Is_Applied : 0,
        ];
    }
}
