<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
        $this->redirect = url()->previous().'#feedback';
        return [
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|min:5',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute должно быть заполнено',
            'email' => 'Email должен быть в правильном формате',
            'min' => 'Поле :attribute должно содержать не менее :min символов',
            'numeric' => 'Поле должно быть числовым',
            'g-recaptcha-response,required' => 'Подтвердите, что вы не робот'
        ];
    }
}
