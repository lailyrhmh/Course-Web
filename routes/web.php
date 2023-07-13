<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CourseMaterialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/courses', function () {
//     return view('courses.index');
// });

// Route::get('/materials', function () {
//     return view('/materials');
// });

// Route::resource('courses', CourseController::class);
// Route::resource('materials', MaterialController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseMaterialController::class, 'index'])->name('courses.index');
    Route::get('/create', [CourseMaterialController::class, 'create'])->name('courses.create');
    Route::post('/', [CourseMaterialController::class, 'store'])->name('courses.store');
    Route::get('/{course}', [CourseMaterialController::class, 'show'])->name('courses.show');
    Route::get('/{course}/edit', [CourseMaterialController::class, 'edit'])->name('courses.edit');
    Route::put('/{course}', [CourseMaterialController::class, 'update'])->name('courses.update');
    Route::delete('/{course}', [CourseMaterialController::class, 'destroy'])->name('courses.destroy');
    Route::get('/{course}/materials/create', [CourseMaterialController::class, 'createMaterial'])->name('courses.materials.create');
    Route::post('/{course}/materials', [CourseMaterialController::class, 'storeMaterial'])->name('courses.materials.store');
    Route::get('/{course}/materials/{material}/edit', [CourseMaterialController::class, 'editMaterial'])->name('courses.materials.edit');
    Route::put('/{course}/materials/{material}', [CourseMaterialController::class, 'updateMaterial'])->name('courses.materials.update');
    Route::delete('/{course}/materials/{material}', [CourseMaterialController::class, 'destroyMaterial'])->name('courses.materials.destroy');
});

Route::prefix('materials')->group(function () {
    Route::get('/', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/create', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/', [MaterialController::class, 'store'])->name('materials.store');
    Route::get('/{material}', [MaterialController::class, 'show'])->name('materials.show');
    Route::get('/{material}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('/{material}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');
});
