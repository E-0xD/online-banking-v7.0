<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrantApplication extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grantCategory()
    {
        return $this->belongsToMany(GrantCategory::class, 'grant_application_grant_category');
    }
}
