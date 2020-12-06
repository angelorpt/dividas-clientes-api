<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divida extends Model
{
    protected $table      =   'dividas';
    protected $fillable   = [ 'motivo'
                            , 'data'
                            , 'valor'
                            , 'cliente_id'
                            ];

    Public Function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }
}
