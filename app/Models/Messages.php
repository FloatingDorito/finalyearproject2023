<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Messages extends Model
{
    use HasFactory, HasUuids;
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'conversations_id',
        'texts',
        'type'
    ];

    public function conversations(){
        return $this->belongsTo(Conversations::class, 'conversations_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
