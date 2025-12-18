<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'location',
        'type',
        'salary',
        'min_salary',
        'max_salary',
        'average_salary',
        'is_anonymous',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
