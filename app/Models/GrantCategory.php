<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrantCategory extends Model
{
    protected $guarded = [];

    public function grantApplication()
    {
        return $this->belongsToMany(GrantApplication::class, 'grant_application_grant_category');
    }
}
