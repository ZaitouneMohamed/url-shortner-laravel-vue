<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class urls extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_url',
        'shorten_url',
        'url_desc',
        'visits',
        'user_id',
    ];


    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }

}
