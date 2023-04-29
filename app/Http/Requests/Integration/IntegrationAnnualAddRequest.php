<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationAnnualAddRequest extends FormRequest
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
            'AnnualCompanyCode' => ['required'],
            'AnnualDate'        => ['required', 'date_format:Y-m-d'],
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'          => 'IDRider Required',
            'IDRider.exists'            => 'Rider Not Found',
            // 
            'AnnualCompanyCode.required' => 'AnnualCompanyCode Required',
            // 
            'AnnualDate.required'        => 'AnnualDate Required',
            'AnnualDate.date_format'     => 'AnnualDate Must Match The Format Y:m:d',
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
