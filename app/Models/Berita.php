<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $fillable = [
        'image', 'title', 'content', 'id_category'
    ];

    public function beritacategory()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
