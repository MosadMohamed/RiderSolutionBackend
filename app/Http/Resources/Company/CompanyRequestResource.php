<?php

namespace App\Http\Resources\Company;

use App\Http\Resources\Rider\RiderResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'IDRiderRequest'    => $this->IDRiderRequest,
            'Rider'             => RiderResource::make($this->Rider),
        ];
    }
}
