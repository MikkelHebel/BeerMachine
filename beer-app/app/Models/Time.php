<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['temperature', 'vibration', 'humidity', 'batch_id'];

    public function batch() {
        return $this->belongsTo(Batch::class);
    }
}
