<?php

namespace App\Http\Requests\Integration;

use App\Exceptions\CompanyNotAuthException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class IntegrationFeedbackAddRequest extends FormRequest
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
            'FeedbackCompanyCode'   => ['required'],
            'FeedbackDate'          => ['required', 'date_format:Y-m-d'],
            'FeedbackText'          => ['required'],
            'FeedbackType'          => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'IDRider.required'          => 'IDRider Required',
            'IDRider.exists'            => 'Rider Not Found',
            // 
            'FeedbackCompanyCode.required' => 'FeedbackCompanyCode Required',
            // 
            'FeedbackDate.required'         => 'FeedbackDate Required',
            'FeedbackDate.date_format'      => 'FeedbackDate Must Match The Format Y:m:d',
            // 
            'FeedbackText.required'        => 'FeedbackText Required',
            // 
            'FeedbackType.required'        => 'FeedbackType Required',
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
