<?php

namespace App\Http\Resources\Rider;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RiderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'IDRider'           => $this->IDRider,
            'IDOffice'          => (int) $this->IDOffice,
            'IDCountry'         => (int) $this->IDCountry,
            'RiderNationalID'   => $this->RiderNationalID,
            'RiderName'         => $this->RiderName,
            'RiderPhone'        => $this->RiderPhone,
            'RiderEmail'        => $this->RiderEmail,
            'RiderBirthDate'    => $this->RiderBirthDate,
            'RiderDay'          => Carbon::create($this->RiderBirthDate)->format('d'),
            'RiderMonth'        => Carbon::create($this->RiderBirthDate)->format('m'),
            'RiderYear'         => Carbon::create($this->RiderBirthDate)->format('Y'),
            'RiderGender'       => ucfirst(strtolower($this->RiderGender)),
            'RiderWorking'      => (int) $this->RiderWorking,
            'CompanyWorkingEn'  => ($this->CompanyWorking) ? $this->CompanyWorking->CompanyNameEn : 'Not Working Now',
            'CompanyWorkingAr'  => ($this->CompanyWorking) ? $this->CompanyWorking->CompanyNameAn : 'لا تعمل الان',
            'IsRider'           => (int) $this->IsRider,
            'IsPicker'          => (int) $this->IsPicker,
            'VehlcleType'       => ($this->VehlcleType) ? $this->VehlcleType : '',
            'IsUploaded'        => (int) $this->IsUploaded,
            'RiderActive'       => (int) $this->RiderActive,
            'Documents'         => DocumentResource::collection($this->Documents->where('DocumentActive', 1)),
        ];
    }
}
