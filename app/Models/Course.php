<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    public $fillable = [
        'course_name',
        'course_desc',
        'course_duration'
    ];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
