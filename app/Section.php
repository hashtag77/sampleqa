<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['user_id', 'name'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
