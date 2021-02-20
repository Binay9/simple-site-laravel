<?php
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;
use App\Models\Article;
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

//Email tests


Route::get('/contact', [ContactController::class, 'send']);
Route::post('/contact', [ContactController::class, 'store']);





Route::get('/', function () {
    return view('home');
});


Route::get('/about', function () {
    return view('about', [
        'articles' => Article::latest()->paginate(3)
    ]);
});

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::post('/articles', [ArticlesController::class, 'store']);
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
Route::put('/articles/{article}', [ArticlesController::class, 'update']);

