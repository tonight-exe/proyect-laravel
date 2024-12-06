<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personajes extends Model
{
    protected $table = 'personajes';
    protected $primaryKey = 'id_pj';
    protected $fillable = ['name', 'id_arma', 'id_armadura', 'age', 'img'];
}
