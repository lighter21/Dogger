<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $guarded = [];

    public function walk()
    {
        return $this->belongsTo(Walk::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
