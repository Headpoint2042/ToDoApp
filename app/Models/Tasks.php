<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'type', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}