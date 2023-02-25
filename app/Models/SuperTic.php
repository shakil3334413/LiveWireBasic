<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperTic extends Model
{
    use HasFactory;
    protected $fillable=[
        'question'
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
