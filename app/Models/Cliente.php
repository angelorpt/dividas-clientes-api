<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table      =   'clientes';
    protected $fillable   = [ 'id_jsonph'
                            , 'name'
                            , 'username'
                            , 'email'
                            , 'phone'
                            , 'website'
                            ];
}
