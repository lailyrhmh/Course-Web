<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Material::factory()->count(10)->create();

        Material::create([
            'material_title' => 'Laravel',
            'material_desc' => 'Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:',
            'material_link' => 'https://laravel.com/docs/8.x',
            'course_id' => 1
        ]);

        Material::create([
            'material_title' => 'PHP',
            'material_desc' => 'PHP is a popular general-purpose scripting language that is especially suited to web development.',
            'material_link' => 'https://www.php.net/manual/en/intro-whatis.php',
            'course_id' => 2
        ]);

        Material::create([
            'material_title' => 'JavaScript',
            'material_desc' => 'JavaScript is the Programming Language for the Web. JavaScript can update and change both HTML and CSS. JavaScript can calculate, manipulate and validate data.',
            'material_link' => 'https://www.javascript.com/',
            'course_id' => 3
        ]);

        Material::create([
            'material_title' => 'HTML',
            'material_desc' => 'HTML is the standard markup language for Web pages. With HTML you can create your own Website.',
            'material_link' => 'https://www.w3schools.com/html/',
            'course_id' => 1
        ]);

        Material::create([
            'material_title' => 'CSS',
            'material_desc' => 'CSS is the language we use to style an HTML document. CSS describes how HTML elements should be displayed.',
            'material_link' => 'https://www.w3schools.com/css/',
            'course_id' => 5
        ]);
    }
}
