<?php
// el use del namespace es para que no tenga que escribir el nombre de la clase
// es como si fuera un include
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriesController;

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
    return view('welcome');
});

Route::get ('/tareas',[TodosController::class,'index'])->name('todos');

//como se especifica toda la clase sin crear un objeto se puede usar la clase directamente con::class
// y se tiene que especificar cual es el metodo que se quiere llamar de la clase
Route::post('/tareas', TodosController::class . '@store')->name('todos');
Route::get('/tareas/{id}', [TodosController::class,'show'])->name('todos.edit');
Route::patch('/tareas/{id}', [TodosController::class,'update'])->name('todos.update');
Route::delete('/tareas/{id}', [TodosController::class,'destroy'])->name('todos.destroy');

Route::resource ('categories', CategoriesController::class);
