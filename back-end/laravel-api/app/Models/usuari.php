<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class usuari extends Model
{

    use HasApiTokens, HasFactory, Notifiable;
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
