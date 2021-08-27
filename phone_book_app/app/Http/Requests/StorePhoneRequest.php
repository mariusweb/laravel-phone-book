<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePhoneRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:80'],
            'phone' => [Rule::unique('phones')->where('user_id', auth()->id()), 'required', 'string', 'regex:/^([0-9]{6}|[0-9]{9}|\+[0-9]{11})$/', 'min:6', 'max:12']
        ];
    }
}
