<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'user_id',
        'commissions_id',
        'session_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function commission(){
        return $this->belongsTo(Commission::class, 'commissions_id');
    }
}
