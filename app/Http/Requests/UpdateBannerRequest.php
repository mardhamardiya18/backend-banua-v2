<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBannerRequest extends FormRequest
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
            'url' => 'required|url',
            'order' => [
                'required',
                'integer',
                Rule::unique('banners', 'order')->ignore($this->banner), // Abaikan ID saat update
            ],
            'active' => 'required|boolean',
            'img_url' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Gambar opsional saat update
        ];
    }
}