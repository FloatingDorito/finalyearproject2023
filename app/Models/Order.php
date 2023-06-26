<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Order extends Model
{
    use HasFactory, HasUuids;
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'artist_id',
        'user_id',
        'commission_id',
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
        return $this->belongsTo(Commission::class, 'commission_id');
    }

    public function orderImage()
   {
       return $this->hasMany(OrderImage::class);
   }
}
