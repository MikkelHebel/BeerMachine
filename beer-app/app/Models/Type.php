<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false; // the beer types doesnt need timestamps

    public function batches() {
        return $this->hasMany(Batch::class);
    }
}
