<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = [
        'name', 'jabatan', 'bio', 'image', 'id_category'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('name', 'LIKE', "%{$title}%");
    }
}
