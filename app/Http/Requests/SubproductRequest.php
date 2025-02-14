<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubproductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->roles === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'porsion' => 'required|numeric',
            'discount' => 'required|numeric',
            'size' => 'required|numeric',
            'extra' => 'required|numeric',
            'price' => 'required|numeric',
            'note' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ];
    }
}
