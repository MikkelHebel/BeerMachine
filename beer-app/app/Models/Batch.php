<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = ['amount', 'failed', 'user_id', 'type_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function times() {
        return $this->hasMany(Time::class);
    }
}
