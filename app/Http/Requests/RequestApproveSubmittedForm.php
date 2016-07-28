<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestApproveSubmittedForm extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'form_user_id' => 'required',
            'form_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'form_user_id.required' => 'Approve failed. The Submitted Form ID is missing.',
            'form_id.required' => 'Approve failed. The Form ID is missing.'
        ];
    }
}
