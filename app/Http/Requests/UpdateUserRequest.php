<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->route('user')),
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:siswa,admin,pembina',
            'nomor_telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:500',
            'jurusan' => 'nullable|string|max:100',
            'kelas' => 'nullable|string|max:50',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'role.required' => 'Role wajib dipilih',
            'role.in' => 'Role tidak valid',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'nomor_telepon' => 'Nomor Telepon',
            'alamat' => 'Alamat',
            'jurusan' => 'Jurusan',
            'kelas' => 'Kelas',
        ];
    }
}
