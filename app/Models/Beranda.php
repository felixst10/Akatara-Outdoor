<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Beranda extends Model
{
    use HasFactory, Sluggable;

     //protected $fillable = ['title', 'slug', 'excerpt', 'body'];

     protected $guarded = ['id'];
     protected $with = ['category'];

     public function scopeFilter($query, array $filters){ //query scope

         $query->when($filters['search'] ?? false, function($query, $search){
             return $query->where(function($query)use($search) {
                 $query->where('title', 'like', '%' .$search. '%')
                       ->orWhere('body', 'like', '%'. $search. '%');
             });
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });
     }

     public function category(){
         return $this->belongsTo(Category::class);
     }

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
