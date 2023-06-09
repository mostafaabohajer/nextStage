<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Company extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = "companies";

    protected $fillable = [
        'name',
        'slug',
        'email',
        'address',
        'logo',
        'website',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
