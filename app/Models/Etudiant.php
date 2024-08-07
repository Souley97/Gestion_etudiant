<?php

namespace App\Models;

use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    use HasFactory, SoftDeletes;


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

    public function notes(){
        return $this->hasMany(Evaluation::class);
    }

}
