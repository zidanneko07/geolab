<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHasilLabRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_user' => 'required|exists:login,id',
            'kode_lab' => 'required|string|max:25',
            'judul_lab' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'link_dokumen' => 'required|string|max:255',
            'rating' => 'nullable|integer|min:0|max:5',
        ];
    }
}
