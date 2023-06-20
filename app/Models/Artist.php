<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Artist extends Model
{
    use HasFactory, HasUuids;
    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'description',
        'facebook',
        'twitter'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function portfolio(){
        return $this->belongsTo(Portfolio::class, 'artist_id');
    }
}