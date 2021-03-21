<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;
    protected $table = 'Vacante';
    protected $primaryKey = 'ID_Vacante';
    public $timestamps=false;

}
