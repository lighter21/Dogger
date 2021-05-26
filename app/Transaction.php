<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function sender()
    {
        return $this->hasMany(User::class, 'sender_id');
    }
    public function recipient()
    {
        return $this->hasMany(User::class, 'recipient_id');
    }
    public function walk()
    {
        return $this->hasOne(Walk::class, 'walk_id');
    }
}
