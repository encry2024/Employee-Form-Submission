<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserSettingsRequest extends Request
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
            'vacation_leave' => 'numeric',
            'sick_leave' => 'numeric',
            'paternity_leave' => 'numeric',
            'maternity_leave' => 'numeric',
            'authorized_leave' => 'numeric',
        ];
    }
}
