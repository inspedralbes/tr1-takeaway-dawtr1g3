<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'comandes';
    protected $fillable =[
        'estat',
        'total'
    ];
}
