<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'phone' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute должно быть заполнено',
            'min' => 'Поле :attribute должно содержать не менее :min символов',
            'max' => 'Поле :attribute должно содержать не более :max символов',
            'numeric' => 'Поле должно быть числовым'
        ];
    }
}
