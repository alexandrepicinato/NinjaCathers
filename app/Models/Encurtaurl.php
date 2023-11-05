<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encurtaurl extends Model
{
    public $fillable = ['ninjaurl','debugurl','debugactive','enderecoip','daterequest','navegador','updated_at','created_at'];
}
