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
            'nom' => ['required','string','max:255'],
            'prenom' => ['required','string','max:255'],
            'date_naissance' => ['required','date'],
            'lieu_naissance' => ['required','string','max:255'],
            'adresse' => ['required','string','max:255'],
            'telephone' => ['required','string','max:255'],
            'email' => ['required','email','unique:etudiants'],
        ];
    }
}
