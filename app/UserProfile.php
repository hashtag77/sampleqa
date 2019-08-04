<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['user_id', 'website', 'github', 'twitter', 'company', 'job_title', 'hometown', 'country_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
