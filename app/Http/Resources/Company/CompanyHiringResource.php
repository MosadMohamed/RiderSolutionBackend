<?php

namespace App\Http\Resources\Company;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyHiringResource extends JsonResource
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
            'HiringType'    => $this->HiringType,
            'HiringNote'    => $this->HiringNote,
            'HiringActive'  => (int) $this->HiringActive,
            'HiringApplied' => (int) $this->HiringApplied,
        ];
    }
}
