<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;
    protected $fillable = [
        'artist_id',
        'coverimage',
        'title',
        'price',
        'description',
        'expectations',
        'likes',
        'dislikes',
        'status',
        'exampleimageone',
        'exampleimagetwo',
        'exampleimagethree'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
}
