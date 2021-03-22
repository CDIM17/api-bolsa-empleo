<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use HasFactory;
    protected $table = 'Paises';
    protected $primaryKey = 'ID_Pais';
    public $timestamps=false;
}
