<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubproductUpdateRequest extends FormRequest
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
            'portion' => 'nullable',
            'discount' => 'nullable|numeric',
            'size' => 'nullable|numeric',
            'extra' => 'nullable|numeric',
            'price' => 'nullable',
            'note' => 'nullable|string',
            'product_id' => 'nullable|exists:products,id',
        ];
    }
}
