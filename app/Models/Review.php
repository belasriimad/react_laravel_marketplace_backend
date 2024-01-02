<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'user_id', 'approved',
    'rating', 'picture_id'];
 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function picture()
    {
        return $this->belongsTo(Picture::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
