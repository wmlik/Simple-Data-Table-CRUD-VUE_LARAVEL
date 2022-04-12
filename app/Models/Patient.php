<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
    'num_securite_sociale','caisse','nom','prenom','etat_civile','date_naiss','adresse','tel'
    ];
}
