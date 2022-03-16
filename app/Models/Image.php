<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image';
    protected $fillable = [
        'title', 'image', 'id_category'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
