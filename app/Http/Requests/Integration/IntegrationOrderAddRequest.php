<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationOrderAddRequest extends FormRequest
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
            'OrderCompanyCode'  => ['required'],
            'OrderDate'         => ['required', 'date_format:Y-m-d'],
            'OrderTime'         => ['required', 'date_format:H:i:s'],
            'OrderValue'        => ['required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
            'OrderStatus'       => ['required', 'in:ACCEPT,CANCEL'],
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'          => 'IDRider Required',
            'IDRider.exists'            => 'Rider Not Found',
            // 
            'OrderCompanyCode.required' => 'OrderCompanyCode Required',
            // 
            'OrderDate.required'        => 'OrderDate Required',
            'OrderDate.date_format'     => 'OrderDate Must Match The Format Y:m:d',
            // 
            'OrderTime.required'        => 'OrderTime Required',
            'OrderTime.date_format'     => 'OrderTime Must Match The Format H:i:s',
            // 
            'OrderValue.required'       => 'OrderValue Required',
            'OrderValue.regex'          => 'OrderValue Format Must Be Double',
            // 
            'OrderStatus.required'      => 'OrderStatus Required',
            'OrderStatus.in'            => 'OrderStatus Must Be ACCEPT or CANCEL',
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
