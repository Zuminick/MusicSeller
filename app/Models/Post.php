<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'artist',
        'name',
        'type',
        'release_year',
        'creation_year',
        'description',
        'status',
        'price',
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_post', 'post_id', 'image_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_post', 'post_id', 'genre_id');
    }
}
