<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['discussion_id', 'user_id', 'comment', 'helpful'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
}
