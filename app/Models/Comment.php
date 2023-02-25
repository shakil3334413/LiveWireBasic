<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'body','user_id','image','super_tic_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function supertic()
    {
        return $this->belongsTo(SuperTic::class);
    }

    public function getImagePathAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}
