<?php

namespace App\Models;

use App\Models\Type;
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
        'type_id',
        'genre_id',
        'creation_year',
        'description',
        'status',
        'price',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }
    public function PostImages()
    {
        return $this->hasMany(Image::class, 'post_id', 'id');
    }
}
