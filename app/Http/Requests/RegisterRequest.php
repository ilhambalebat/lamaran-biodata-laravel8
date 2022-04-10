<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:4',
            'konfirmasi_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Email tidak boleh kosong",
            "email.email" => "Email tidak valid",
            "email.unique" => "Email sudah terdaftar",
            "password.required" => "Password tidak boleh kosong",
            "password.min" => "Password terlalu pendek",
            "konfirmasi_password.required" => "Konfirmasi Password tidak boleh kosong",
            "konfirmasi_password.same" => "Konfirmasi password harus sama dengan password"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        // $response = response()->json([
        //     'success' => false,
        //     'message' => 'Ops! Some errors occurred',
        //     'errors' => $validator->errors()
        // ]);
        $response = redirect()
            ->back()
            // ->with('danger', 'Pastikan data valid')
            // ->withErrors($validator)
            ->withInput();
        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
