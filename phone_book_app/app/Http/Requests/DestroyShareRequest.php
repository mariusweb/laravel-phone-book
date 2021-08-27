<?php

namespace App\Http\Requests;

use App\Managers\SharesManager;
use App\Rules\NotEqualToAuth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestroyShareRequest extends FormRequest
{
    public function __construct(private SharesManager $sharesManager)
    {
        parent::__construct();
    }
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
        $shareId = $this->sharesManager->getSharesId(auth()->id(), $this->phone_id, $this->user_shares_id);
        return [
            'phone_id' => [
                'required',
                Rule::unique('shares')
                    ->ignore($shareId)
                    ->where('user_shares_id', $this->user_shares_id)
                    ->where('user_sharing_id', auth()->id())
            ],
            'user_shares_id' => [
                'required',
                Rule::unique('shares')
                    ->ignore($shareId)
                    ->where('phone_id', $this->phone_id)
                    ->where('user_sharing_id', auth()->id()),
                new NotEqualToAuth
            ]
        ];
    }
}
