<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|max:50',
            'precio' => 'required|decimal:0,2',
            'cantidad' => 'required|integer|digits_between:1,4',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede tener más de :max caracteres.',
            'alpha_num' => 'El campo :attribute solo puede contener letras y números.',
            'decimal' => 'El campo :attribute debe ser un número de :min a :max decimales.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'digits_between' => 'El campo :attribute debe ser de :min a :max digitos.',
            'image' => 'El campo :attribute debe ser una imagen válida.',
            'mimes' => 'El campo :attribute debe ser una imagen jpeg, png o jpg.',
            'imagen.max' => 'El campo :attribute debe ser una imagen de máximo 2MB.',
        ];
    }
}
