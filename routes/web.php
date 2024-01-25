<?php

use App\Http\Controllers\EnterControlle;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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


//Маршруты для гостей авторизованных на сайте
Route::group(['middleware' => 'guest'], function(){

    //Регистрация пользователя
    Route::get('/register', [UserController::class, 'create'])->name('user.create');
    Route::post('/register', [UserController::class, 'store'])->name('user.store');

    //Авторизация пользователя
    Route::get('/login', [UserController::class, 'loginCreate'])->name('login.create');
    Route::post('/login', [UserController::class, 'loginStore'])->name('login.store');
   
});

//Перекидывание на about и на глявную страницу home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'show'])->name('about');

//Маршруты для авторизированных пользователей
Route::group(['middleware' => 'auth'], function(){
    //Выход для пользователя из аккаунта
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

//Маршруты для админов
Route::group(['middleware' => 'admin'], function(){
    //Посты
    Route::get('/post/create', [HomeController::class, 'create'])->name('post.create')->middleware('admin');
    Route::post('/post', [HomeController::class, 'store'])->name('post.store');

    //Для таблицы
    Route::get('/main', [MainController::class, 'index'])->name('main.index');
});



Route::get('/success', [EnterControlle::class, 'success'])->name('success');
Route::get('/enter/create', [EnterControlle::class, 'create2'])->name('enter.create2');
Route::post('/enter', [EnterControlle::class, 'store2'])->name('enter.store2');




Route::get('/hello', function () {
    return view('welcome');
})->name('welcome');

Route::get('/post/{id}/{slug?}', function($id, $slug = null) {
    return "<h1> POST $id | $slug </h1>";
});

// ->where(['id' => '[0-9]+', 'slug' => '[A-Za-z]+'])

// Route::get('/home', function() {
//     $res = 2 + 3;
//     $name = 'Name'; 
//     return view('home', compact('res', 'name'));
// });


Route::resource('/posts', PostController::class);


Route::match(['post', 'get'],'/contact9', function () {
    if (!empty($_POST)) {
        dump($_POST);
        }
    return view('contact');
})->name('isp222');

Route::prefix('admin')->group(function(){
    Route::get('/posts', function() {
        return 'Posts List';
    });
    Route::get('/posts/create', function() {
        return 'Posts Create';
    });
    Route::get('/posts/{id}/edit', function($id) {
        return "Edit Post $id";
    });
});

Route::fallback(function () {
    // return redirect()->route('welcome');
    abort(404, 'Page not found');
});


// Route::redirect('/contact7', 'home', 301);

// Route::get('/contact', function() {
//     return view('contact');
// });

// Route::post('/send', function() {
//     if (!empty($_POST)) {
//         dump($_POST);
//     }
//     return '<h1> SEND </h1>';
// });

Route::get('/task', [HomeController::class, 'task']);



