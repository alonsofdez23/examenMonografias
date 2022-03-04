<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monograph extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
