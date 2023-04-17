<?php

namespace App\Http\Resources\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyTaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'IDTask'        => $this->IDTask,
            'TaskType'      => $this->TaskType,
            'TaskDate'      => $this->TaskDate,
            'TaskTimeFrom'  => $this->TaskTimeFrom,
            'TaskTimeEnd'   => $this->TaskTimeEnd,
            'TaskNote'      => $this->TaskNote,
            'TaskApplied'   => $this->TaskApplied,
            'TaskActive'    => $this->TaskActive,
        ];
    }
}
