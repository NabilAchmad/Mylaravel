<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenggunaRequest extends FormRequest
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
            //
            'name'=>'required|string|max:100',
            'phone'=>'nullable|digits_between:9,13',
            'file_upload'=>'nullable|file|mimes:png,jpg,jpeg,pdf|max:5120',
        ];
    }
    public function messages():array
    {
        return [
          'name.required'=>'Nama Tidak Boleh Kosong🤪',
          'file_upload.required' => 'Upload File Tidak Boleh Kosong',
        ];
    }
}
