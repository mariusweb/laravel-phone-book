<?php

namespace App\Http\Requests;

use App\Rules\NotEqualToAuth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreShareRequest extends FormRequest
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
            'phone_id' => ['required', Rule::unique('shares')->where('user_shares_id', $this->user_shares_id)],
            'user_shares_id' => ['required', Rule::unique('shares')->where('phone_id', $this->phone_id), new NotEqualToAuth]
        ];
    }
}
