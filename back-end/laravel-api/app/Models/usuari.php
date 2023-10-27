<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuari extends Model
{   
    protected $table = "usuari";
    protected $fillable =[
        'nom',
        'cognoms',
        'email',
        'contrasenya',
        'tipus',
    ];
    use HasFactory;
}
