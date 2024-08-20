<?php

use App\Livewire\Courses\Create;
use App\Livewire\Courses\NameCourse;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('courses')->group(function () {
        Route::get('/create/name', NameCourse::class)->name('courses.new');
        Route::get('/{course:nanoid}/create', Create::class)->name('courses.create');
    });
});
