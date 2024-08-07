<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtudiantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required','string','max:25'],
            'prenom' => ['required','string','max:25'],
            'date_de_naissance' => ['required','date'],
            'adresse' => ['required','string','max:25'],
            'telephone' => ['required','string','max:25'],
            'email' => ['required','email','unique:etudiants'],
            'photo' => ['nullable','image','mimes:jpeg,png,jpg|max:2048'],
        ];
    }
}
