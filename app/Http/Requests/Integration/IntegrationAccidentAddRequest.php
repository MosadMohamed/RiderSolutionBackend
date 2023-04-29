<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationAccidentAddRequest extends FormRequest
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
            'IDRider'               => ['required', 'exists:riders,IDRider,RiderActive,1'],
            'AccidentCompanyCode'   => ['required'],
            'AccidentDate'          => ['required', 'date_format:Y-m-d'],
            'AccidentType'          => ['required', 'in:RIDER,VEHICLE'],
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'          => 'IDRider Required',
            'IDRider.exists'            => 'Rider Not Found',
            // 
            'AccidentCompanyCode.required' => 'AccidentCompanyCode Required',
            // 
            'AccidentDate.required'        => 'AccidentDate Required',
            'AccidentDate.date_format'     => 'AccidentDate Must Match The Format Y:m:d',
            // 
            'AccidentType.required'      => 'AccidentType Required',
            'AccidentType.in'            => 'AccidentType Must Be RIDER or VEHICLE',
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
