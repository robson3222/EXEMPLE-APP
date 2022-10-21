<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\AgendaController;
use App\Models\Agenda;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [AgendaController::class, 'index']);
Route::get('/agendas/create', [AgendaController::class, 'create'])->middleware('auth');
Route::get('/agendas/{id}', [AgendaController::class, 'show'])->middleware('auth');
Route::post('/agendas', [AgendaController::class, 'store']);
Route::delete('/agendas/{id}',[AgendaController::class, 'destroy'])->middleware('auth');
Route::get('/agendas/edit/{id}', [AgendaController::class, 'edit'])->middleware('auth');
Route::put('/agendas/update/{id}', [AgendaController::class, 'update'])->middleware('auth');


Route::get('/contato', function () {
    return view('contato');
});

Route::get('/dashboard', [AgendaController::class,'dashboard'])->middleware('auth');

Route::post('/agendas/join/{id}', [AgendaController::class, 'joinAgenda'])->middleware('auth');

Route::delete('/agendas/leave/{id}', [AgendaController::class, 'leaveAgenda'])->middleware('auth');



