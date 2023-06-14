<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'filelocation',
        'artist_id'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
}
