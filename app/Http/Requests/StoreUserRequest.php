<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'employee_id' => 'required|unique:users,employee_id',
            'password' => 'required|confirmed',
            'campaign_id' => 'required',
            'rank' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please provide user\'s name',
            'email.required' => 'Please provide user\'s email',
            'email.unique' => 'Email already exists. Please choose other email',
            'password.required' => 'Please provide user\'s password',
            'password.confirmed' => 'Password do no match',
            'employee_id.required' => 'Please provide user\'s employee id',
            'employee_id.unique' => 'Employee ID already exists. Please choose other ID',
        ];
    }
}
