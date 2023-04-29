<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationShiftAddRequest extends FormRequest
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
            'ShiftCompanyCode'  => ['required'],
            'ShiftDateStart'    => ['required', 'date_format:Y-m-d'],
            'ShiftDateEnd'      => ['required', 'date_format:Y-m-d'],
            'ShiftTimeStart'    => ['required', 'date_format:H:i:s'],
            'ShiftTimeEnd'      => ['required', 'date_format:H:i:s'],
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'              => 'IDRider Required',
            'IDRider.exists'                => 'Rider Not Found',
            // 
            'ShiftCompanyCode.required'     => 'ShiftCompanyCode Required',
            // 
            'ShiftDateStart.required'       => 'ShiftDateStart Required',
            'ShiftDateStart.date_format'    => 'ShiftDateStart Must Match The Format Y:m:d',
            // 
            'ShiftDateEnd.required'         => 'ShiftDateEnd Required',
            'ShiftDateEnd.date_format'      => 'ShiftDateEnd Must Match The Format Y:m:d',
            // 
            'ShiftTimeStart.required'       => 'ShiftTimeStart Required',
            'ShiftTimeStart.date_format'    => 'ShiftTimeStart Must Match The Format H:i:s',
            // 
            'ShiftTimeEnd.required'         => 'ShiftTimeEnd Required',
            'ShiftTimeEnd.date_format'      => 'ShiftTimeEnd Must Match The Format H:i:s',
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
