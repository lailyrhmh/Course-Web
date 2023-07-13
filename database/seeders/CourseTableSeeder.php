<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Course::factory()->count(10)->create();

        Course::create([
            'course_name' => 'Laravel',
            'course_desc' => 'Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:',
            'course_duration' => 40
        ]);

        Course::create([
            'course_name' => 'PHP',
            'course_desc' => 'PHP is a popular general-purpose scripting language that is especially suited to web development.',
            'course_duration' => 40
        ]);

        Course::create([
            'course_name' => 'JavaScript',
            'course_desc' => 'JavaScript is the Programming Language for the Web. JavaScript can update and change both HTML and CSS. JavaScript can calculate, manipulate and validate data.',
            'course_duration' => 40
        ]);

        Course::create([
            'course_name' => 'HTML',
            'course_desc' => 'HTML is the standard markup language for Web pages. With HTML you can create your own Website.',
            'course_duration' => 40
        ]);

        Course::create([
            'course_name' => 'CSS',
            'course_desc' => 'CSS is the language we use to style an HTML document. CSS describes how HTML elements should be displayed.',
            'course_duration' => 40
        ]);
    }
}
