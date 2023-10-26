<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lineadecomanda extends Model
{
    use HasFactory;
    protected $table="liniacomandes";
    protected $fillable =[
        'id_comanda',
        'id_producte',
        'nom_producte',
        'desc_producte',
        'quantitat',
        'preu'
    ];
}
