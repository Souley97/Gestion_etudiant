<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    // "nom": "Khalil",
    // "prenom": "Amara",
    // "adresse": "Tunis",
    // "telephone": "765432109",
    // "matricule": "MAT202303",
    // "mot_de_passe": "$2y$12$2r4YTysDqPgYMl0a5KIkQO7ztONRXczmD5BCAj\/bari9QzvCp8dHm",
    // "email": "amara@gmail.com",
    // "photo": "https:\/\/example.com\/photos\/olivia.jpg",
    // "date_de_naissance": "1999-08-10",
    // "deleted_at": null,
    // "created_at": "2024-08-06T12:06:31.000000Z",
    // "updated_at": "2024-08-06T12:06:31.000000Z"

    // protected $fillable
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone',
        'matricule',
       'mot_de_passe',
        'email',
        'photo',
        'date_de_naissance',
    ];

}
