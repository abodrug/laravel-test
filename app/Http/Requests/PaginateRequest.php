<?php

namespace App\Http\Requests;

class PaginateRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'limit' => 'numeric|min:1|nullable',
            'page' => 'numeric|min:1|nullable'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'limit.numeric' => 'Лимит должен быть числом',
            'limit.min' => 'Лимит должен быть больше 0',
            'page.numeric' => 'Номер страницы должен быть числом',
        ];
    }
}
