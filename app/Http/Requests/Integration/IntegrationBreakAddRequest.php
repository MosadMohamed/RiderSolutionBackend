<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationBreakAddRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth('company')->check();
    }

    protected function failedAuthorization()
    {
        throw new CompanyNotAuthException();
    }

    public function rules()
    {
        return [
            'IDRider'           => ['required', 'exists:riders,IDRider,RiderActive,1'],
            'BreakCompanyCode'  => ['required'],
            'BreakDate'    => ['required', 'date_format:Y-m-d'],
            'BreakTimeStart'    => ['required', 'date_format:H:i:s'],
            'BreakTimeEnd'      => ['required', 'date_format:H:i:s'],
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'              => 'IDRider Required',
            'IDRider.exists'                => 'Rider Not Found',
            // 
            'BreakCompanyCode.required'     => 'BreakCompanyCode Required',
            // 
            'BreakDate.required'            => 'BreakDate Required',
            'BreakDate.date_format'         => 'BreakDate Must Match The Format Y:m:d',
           
            // 
            'BreakTimeStart.required'       => 'BreakTimeStart Required',
            'BreakTimeStart.date_format'    => 'BreakTimeStart Must Match The Format H:i:s',
            // 
            'BreakTimeEnd.required'         => 'BreakTimeEnd Required',
            'BreakTimeEnd.date_format'      => 'BreakTimeEnd Must Match The Format H:i:s',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response([
            'Success'   => false,
            'Message'   => 'Invalid Date',
            'Errors'    => $validator->errors()->all(),
        ]);

        throw new ValidationException($validator, $response);
    }
}
