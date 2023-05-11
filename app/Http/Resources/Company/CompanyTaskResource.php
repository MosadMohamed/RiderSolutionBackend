<?php

namespace App\Http\Resources\Company;

use Carbon\Carbon;
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
            'TaskDateDay'   => Carbon::create($this->TaskDate)->format('d'),
            'TaskDateMonth' => Carbon::create($this->TaskDate)->format('m'),
            'TaskDateYear'  => Carbon::create($this->TaskDate)->format('Y'),
            'TaskTimeFrom'  => Carbon::create($this->TaskTimeFrom)->format('H:i'),
            'TaskTimeEnd'   => Carbon::create($this->TaskTimeEnd)->format('H:i'),
            'TaskNote'      => $this->TaskNote,
            'TaskApplied'   => $this->TaskApplied,
            'TaskActive'    => $this->TaskActive,
        ];
    }
}
