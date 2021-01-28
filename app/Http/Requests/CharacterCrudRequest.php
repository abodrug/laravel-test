<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterCrudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'birthday' => ['date'],
            'occupations' => ['array'],
            'img' => ['string'],
            'nickname' => ['string', 'max:255'],
            'portrayed' => ['string', 'max:255'],
        ];
    }
}
