<?php

namespace App\Http\Resources\Company;

use App\Http\Resources\Rider\RiderResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyHiringApplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'IDHiringApply' => $this->IDHiringApply,
            'Rider'         => RiderResource::make($this->Rider),
        ];
    }
}
