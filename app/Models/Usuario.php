<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'Usuario';
    protected $primaryKey = 'ID_Usuario';
    public $timestamps=false;
}
