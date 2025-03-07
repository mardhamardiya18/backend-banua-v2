<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuoptionRequest extends FormRequest
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
            'name' => 'required|string|max:255',

            'menu_type' => 'required|in:rice,utama,pendamping,pelengkap',
        ];
    }
}
