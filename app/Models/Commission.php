<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Commission extends Model
{
    use HasFactory, HasUuids;
    public $incrementing = false;
    protected $primaryKey = 'id';
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
