<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'name',
        'industry',
        'location',
        'description',
        'logo',
        'size',
        'website',
        'email',
        'average_rating',
        'reviews_count',
    ];

    public function reviews()
    {
        return $this->hasMany(CompanyReview::class);
    }
}
