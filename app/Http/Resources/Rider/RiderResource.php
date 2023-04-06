<?php

namespace App\Http\Resources\Rider;

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
            'IDOffice'          => $this->IDOffice,
            'IDCountry'         => $this->IDCountry,
            'RiderNaturalID'    => $this->RiderNaturalID,
            'RiderName'         => $this->RiderName,
            'RiderPhone'        => $this->RiderPhone,
            'RiderEmail'        => $this->RiderEmail,
            'RiderBirthDate'    => $this->RiderBirthDate,
            'RiderGender'       => $this->RiderGender,
            'IsRider'           => $this->IsRider,
            'IsPicker'          => $this->IsPicker,
            'VehlcleType'       => ($this->VehlcleType) ? $this->VehlcleType : '',
            'IsUploaded'        => $this->IsUploaded,
            'RiderActive'       => $this->RiderActive,
            'Documents'         => DocumentResource::collection($this->Documents->where('DocumentActive', 1)),
        ];
    }
}
