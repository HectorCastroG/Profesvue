<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProfesorController;
use App\Models\User;
use App\Models\Clase;
use Illuminate\Support\Facades\Request;
use Laravel\Jetstream\Rules\Role;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\SalasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/inicio', function () {
        return Inertia::render('Inicio');
    })->name('Inicio');

    Route::controller(ProfesorController::class)->group(function(){
        Route::get('/profesores','index')->name('profesores.index');
        Route::get('/seprofesor', 'create')->name('profesores.create');
        Route::post('/profesor/create', 'crear');
    });

    Route::controller(SalasController::class)->group(function(){
        Route::get('/misala', 'misala')->name('Misala');
        Route::get('/sala/{user:username}', 'sala')->name('Sala');
     });



    Route::controller(ClaseController::class)->group(function(){
        Route::get('/clase/create', 'create')->name('clase.create');
        Route::get('/clase/inicio', 'index')->name('clase.index');
        Route::post('/clase/crear', 'nuevo');
        Route::get('/clase/{user:username}/{clase}', 'show')->name('clase.clase');
        Route::get('/editar/{clase}', 'claseeditar')->name('clase.editar');
        Route::put('/clase/editar/{clase}', 'update');
        Route::delete('/delete/{clase}', 'destroy')->name('delete.clase');

    });

    Route::get('/usuarios', function () {
        return Inertia::render('Usuarios', [
            'users'=>User::query()
            ->when(Request::input('search'), function($query, $search){
                $query->where('name', 'like', '%' . $search . '%');

            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user)=>[
                'name'=>$user->name,
                'id'=>$user->id
            ]),
            'filter'=>Request::only(['search'])

        ]);
    })->name('Usuarios');

});
