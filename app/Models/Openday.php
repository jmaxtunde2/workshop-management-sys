<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Openday extends Model
{
    use HasFactory;

    protected $fillable = [
        'workshop_id','day','time_from','time_to',
    ];

    public function workshop() {
        return $this->belongsTo(Workshop::class, 'workshop_id')->withDefault();
    }
}
