<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDo extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['user_id', 'title', 'section', 'status'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
