<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'berandas';
    protected $fillable = ['title', 'slug', 'excerpt', 'category_id', 'body', 'image'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
