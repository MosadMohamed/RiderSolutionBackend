<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationAcceptAddRequest extends FormRequest
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
            'AcceptCompanyCode' => ['required'],
            'AcceptDate'        => ['required', 'date_format:Y-m-d'],
            'AcceptTime'        => ['required', 'date_format:H:i:s'],
            'AcceptType'        => ['required', 'in:ACCEPT,REFUSE'],
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'              => 'IDRider Required',
            'IDRider.exists'                => 'Rider Not Found',
            // 
            'AcceptCompanyCode.required'    => 'AcceptCompanyCode Required',
            // 
            'AcceptDate.required'        => 'AcceptDate Required',
            'AcceptDate.date_format'     => 'AcceptDate Must Match The Format Y:m:d',
            // 
            'AcceptTime.required'        => 'AcceptTime Required',
            'AcceptTime.date_format'     => 'AcceptTime Must Match The Format H:i:s',
            // 
            'AcceptType.required'      => 'AcceptType Required',
            'AcceptType.in'            => 'AcceptType Must Be ACCEPT or REFUSE',
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
