<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipusUsuari extends Model
{
    protected $table = "tipususuari";
    use HasFactory;
    protected $fillable =[
        'tipus'
    ];
}
