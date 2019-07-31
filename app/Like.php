<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['comment_id', 'user_id', 'likes'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
