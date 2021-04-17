<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function walk()
    {
        return $this->belongsTo(Walk::class);
    }
}
