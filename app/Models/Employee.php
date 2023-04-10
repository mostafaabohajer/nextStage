<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Employee extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = "employees";

    protected $fillable = [
        'first_name',
        'last_name',
        'slug',
        'email',
        'phone',
        'company_id'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name'])
            ->saveSlugsTo('slug');
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
