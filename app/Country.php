<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['abbr', 'name', 'user_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
