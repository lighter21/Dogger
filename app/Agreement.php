<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agreement extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function walk()
    {
        return $this->belongsTo(Walk::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
