<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        ];

    public function category()
        {
            return $this->belongsTo(categories::class);
        }

    public function users()
        {
            return $this->belongsTo(categories::class);
        }
}


