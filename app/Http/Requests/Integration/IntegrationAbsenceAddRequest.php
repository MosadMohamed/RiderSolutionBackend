<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationAbsenceAddRequest extends FormRequest
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
            'AbsenceCompanyCode'    => ['required'],
            'AbsenceDate'           => ['required', 'date_format:Y-m-d'],
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'              => 'IDRider Required',
            'IDRider.exists'                => 'Rider Not Found',
            // 
            'AbsenceCompanyCode.required'   => 'AbsenceCompanyCode Required',
            // 
            'AbsenceDate.required'          => 'AbsenceDate Required',
            'AbsenceDate.date_format'       => 'AbsenceDate Must Match The Format Y:m:d',
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
