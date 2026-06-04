<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'level',
        'duration_weeks',
        'price',
        'instructor',
        'thumbnail'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
