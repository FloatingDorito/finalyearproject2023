<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Artist extends Model
{
    use HasFactory;

    public function artist()
    {
        return $this->belongsTo(User::class)->where('user_type', 'artist');
    }
}