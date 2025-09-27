<?php

namespace App\Models;

use App\Enum\GrantApplicationStatus;
use Illuminate\Database\Eloquent\Model;

class GrantApplication extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'status' => GrantApplicationStatus::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grantCategory()
    {
        return $this->belongsToMany(GrantCategory::class, 'grant_application_grant_category');
    }

    public function isPending()
    {
        return $this->status->value === GrantApplicationStatus::Pending->value;
    }
}
