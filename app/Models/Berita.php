<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $fillable = [
        'image', 'title', 'content', 'id_category', 'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
