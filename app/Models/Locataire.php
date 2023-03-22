<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;

    protected $table = 'Locataire'; 
    protected $fillable = ['nom', 'telephone', 'montant_p', 'montant_r', 'num_chamb'];
}
