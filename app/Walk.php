<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Walk extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function agreement() {
        return $this->hasMany(Agreement::class);
    }

    public function pet() {
        return $this->belongsTo(Pet::class);
    }
}
