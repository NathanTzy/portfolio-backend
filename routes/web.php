<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('depan');

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->name('belakang');


Route::resource('skills', SkillController::class);
Route::resource('projects', ProjectController::class);
Route::resource('contacts', ContactController::class);
Route::resource('comments', CommentController::class)->only([
'index', 'store', 'destroy'
]);
Route::resource('experiences', ExperienceController::class);


