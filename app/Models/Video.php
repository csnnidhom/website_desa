<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $fillable = ([
        'title', 'video', 'id_category'
    ]);

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
