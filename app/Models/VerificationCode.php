<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'applicable_to', 'id');
    }
}
