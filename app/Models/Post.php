<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'uuid',
        'user_id',
        'category',
        'image',
        'slug'
    ];

    public function detail() {
        return $this->hasMany(Detail::class);
    }
}
