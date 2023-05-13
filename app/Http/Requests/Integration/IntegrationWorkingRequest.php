<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationWorkingRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'              => 'IDRider Required',
            'IDRider.exists'                => 'Rider Not Found',
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
