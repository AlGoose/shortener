<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortLinkPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'source_link' => 'required|url',
            'code' => 'nullable|unique:short_links,code',
            'type' => 'required',
            'days' => 'required|integer|between:1,30'
        ];
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'source_link.required' => 'Не введена исходная ссылка',
            'source_link.url' => 'Ссылка некоректна, проверьте написание',
            'code.unique' => 'Такая короткая ссылка уже используется, введите другую',
            'type.required' => 'Не выбран тип короткой ссылки',
            'days.required' => 'Не введен срок жизни короткой ссылки',
            'days.integer' => 'Некоректный тип данных у срока жизни короткой ссылки',
            'days.between:1,30' => 'Некоректный срок жизни короткой ссылки, проверьте значение',
        ];
    }
}
