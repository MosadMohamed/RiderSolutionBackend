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
            'RiderName'         => $this->RiderName,
            'RiderPhone'        => $this->RiderPhone,
            'RiderEmail'        => $this->RiderEmail,
            'RiderBirthDate'    => $this->RiderBirthDate,
            'RiderGender'       => $this->RiderGender,
        ];
    }
}
