<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channel extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['channel', 'creator'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
