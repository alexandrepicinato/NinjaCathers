<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestlog extends Model
{
    public $fillable = ['idrequest','requestcontentpost','requestcontentget','requestcontentbody','requestsendto','enderecoip','daterequest','navegador','updated_at','created_at'];
}
