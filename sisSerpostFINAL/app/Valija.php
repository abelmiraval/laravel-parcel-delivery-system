<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;

class Valija extends Model
{
    protected $table      = 'valija';
    protected $primaryKey = 'idvalija';
    public $timestamps    = false;
    protected $fillable   = [
        'descripcion',
        
    ];

    protected $guarded = [

    ];

}
