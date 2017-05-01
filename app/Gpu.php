<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gpu extends Model
{
    //
    protected $fillable = ['name','power'];
    protected $visible = ['name', 'id','power'];
}
