<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;

    public $fillable = [
        'material_title',
        'material_desc',
        'material_link',
        'course_id'
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
