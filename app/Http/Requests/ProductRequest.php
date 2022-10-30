<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'            => ['required'],
            'description'     => ['required'],
            'category_id'     => ['required'],
            'quantity'        => ['required', 'integer'],
            'expiration_date' => ['required', 'date'],
            'lot_number'      => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'            => 'El nombre del producto es requerido, verifica el ingresado',
            'description.required'     => 'La descripcion del producto es requerido, verifica el ingresado',
            'category_id.required'     => 'La categoría del producto es requerida, verifica la seleccionada',
            'quantity.required'        => 'La cantidad del producto es requerida, verifica el ingresado',
            'quantity.integer'         => 'La cantidad del producto debe ser un número entero',
            'expiration_date.required' => 'La fecha de expiración es requerida, verifica la ingresada',
            'expiration_date.date'     => 'La fecha de expiración, debe ser una fecha',
            'lot_number.required'      => 'El lote es requerido, verifica el ingresado',
            'birth_date.required'      => 'La fecha de cumpleaños es requerida',
        ];
    }
}
