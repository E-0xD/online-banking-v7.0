<?php

namespace App\Models;

use App\Models\GrantApplication;
use App\Enum\GrantCategoryStatus;
use Illuminate\Database\Eloquent\Model;

class GrantCategory extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'status' => GrantCategoryStatus::class,
        ];
    }

    public function grantApplication()
    {
        return $this->belongsToMany(GrantApplication::class, 'grant_application_grant_category');
    }
}
