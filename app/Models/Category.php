<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    // Casts for specific attributes
    protected $casts = [
        'icon' => 'string',  // Store the icon path as a string
    ];

    // Mutator for 'name' attribute to automatically generate the 'slug'
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Define the relationship with the ArticleNews model
    public function news(): HasMany
    {
        return $this->hasMany(ArticleNews::class);
    }
}
