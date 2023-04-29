<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationBonusAddRequest extends FormRequest
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
            'BonusCompanyCode'  => ['required'],
            'BonusDate'         => ['required', 'date_format:Y-m-d'],
            'BonusTime'         => ['required', 'date_format:H:i:s'],
            'BonusValue'        => ['required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'          => 'IDRider Required',
            'IDRider.exists'            => 'Rider Not Found',
            // 
            'BonusCompanyCode.required' => 'BonusCompanyCode Required',
            // 
            'BonusDate.required'        => 'BonusDate Required',
            'BonusDate.date_format'     => 'BonusDate Must Match The Format Y:m:d',
            // 
            'BonusTime.required'        => 'BonusTime Required',
            'BonusTime.date_format'     => 'BonusTime Must Match The Format H:i:s',
            // 
            'BonusValue.required'       => 'BonusValue Required',
            'BonusValue.regex'          => 'BonusValue Format Must Be Double',
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
