<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Time extends Model
{
    /** @use HasFactory<\Database\Factories\TimeFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['temperature', 'vibration', 'humidity', 'batch_id', 'speed', 'time_stamp'];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
