<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class articles extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'price',
        'stock',
        'image',
        'category_id',
        'user_id',
        'contact',
        'click_count',
        'reponse',
        ];

    public function category()
        {
            return $this->belongsTo(categories::class);
        }

    public function users()
        {
            return $this->belongsTo(User::class);
        }

        // creation de slug a chaque article
        protected static function boot()
            {
                parent::boot();
            
                static::saving(function ($article) {
                    if (empty($article->slug)) {
                        $slug = Str::slug($article->title);
                        $originalSlug = $slug;
            
                        // Vérifier l'unicité du slug
                        $count = 1;
                        while (Articles::where('slug', $slug)->exists()) {
                            $slug = $originalSlug . '-' . $count;
                            $count++;
                        }
            
                        $article->slug = $slug;
                    }
                });
            }
}


