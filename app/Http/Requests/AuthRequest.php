<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use phpDocumentor\Reflection\Types\False_;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->get('id')],
            'password' => ['required', 'string', 'min:6']
        ];
    }

    /**
     * @param Validator $validator
     * @throws HttpResponseException
     */
/*    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(responder()->error('0', $validator->errors())->respond(401));
    }*/

}
