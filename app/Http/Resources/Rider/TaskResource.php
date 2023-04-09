<?php

namespace App\Http\Resources\Rider;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'IDCompany'     => (int) $this->IDCompany,
            'CompanyNameEn' => $this->Company->CompanyNameEn,
            'CompanyNameAr' => $this->Company->CompanyNameAr,
            'CompanyImage'  => asset('images/companies/' . $this->Company->CompanyImage),
            'TaskType'      => $this->TaskType,
            'TaskDate'      => $this->TaskDate,
            'TaskTimeFrom'  => $this->TaskTimeFrom,
            'TaskTimeEnd'   => $this->TaskTimeEnd,
            'TaskNote'      => $this->TaskNote,
            'Is_Applied'    => (int) ($this->Is_Applied) ? $this->Is_Applied : 0,
        ];
    }
}
