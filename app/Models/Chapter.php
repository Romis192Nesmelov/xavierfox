<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    use Sluggable;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'active',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class)->where('active', 1);
    }
}
