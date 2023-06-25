<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class OrderImage extends Model
{
    use HasFactory, HasUuids;
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'filename',
        'filelocation',
        'order_id'
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
    
}
