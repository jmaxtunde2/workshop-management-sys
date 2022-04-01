<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    use HasFactory;

    protected $fillable = [
        'from','to','openday_id','user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function openday() {
        return $this->belongsTo(Openday::class, 'openday_id')->withDefault();
    }

}
