<?php

namespace App\Http\Requests;

use App\Rules\SeriaRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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


    public function prepareForValidation()
    {
//        $this -> merge([
//            'name' => '123123',
//        ]);
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:',
            'slug' => [new SeriaRule()],
        ];
    }

    public function messages()
    {
        return array(
            'name.min' => 'Имя категории не должно быть короче 3х символов',
            'name.required' => 'Обязательное поле',
        );
    }

    public function attributes()
    {
        return [
            'name' => 'название категории',
        ];
    }

}
