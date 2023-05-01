<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationLateAddRequest extends FormRequest
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
            'LateCompanyCode'   => ['required'],
            'LateDate'          => ['required', 'date_format:Y-m-d'],
            'LateTimeStart'     => ['required', 'date_format:H:i:s'],
            'LateTimeEnd'       => ['required', 'date_format:H:i:s'],
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'              => 'IDRider Required',
            'IDRider.exists'                => 'Rider Not Found',
            // 
            'LateCompanyCode.required'     => 'LateCompanyCode Required',
            // 
            'LateDate.required'             => 'LateDate Required',
            'LateDate.date_format'          => 'LateDate Must Match The Format Y:m:d',
            // 
            'LateTimeStart.required'        => 'LateTimeStart Required',
            'LateTimeStart.date_format'    => 'LateTimeStart Must Match The Format H:i:s',
            // 
            'LateTimeEnd.required'         => 'LateTimeEnd Required',
            'LateTimeEnd.date_format'      => 'LateTimeEnd Must Match The Format H:i:s',
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
