<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlaylist extends Model
{
    use HasFactory;
    protected $table = 'user_playlist';
    protected $fillable = [
        'title',
        'artist',
        'path',
        'img',
    ];
}