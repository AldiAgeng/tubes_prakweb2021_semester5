<?php


use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminAllPostsController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardChangePasswordController;
use App\Http\Controllers\DashboardMyProfileController;
use App\Http\Controllers\DashboardPostController;

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
    return view('home', [
        'posts' => Post::latest()->get(),
        'categories' => Category::all(),
        'title' => 'Home',
    ]);
});


Route::get('/posts', [PostController::class, 'index']);

// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'posts' => Post::all(),
        'categories' => Category::all(),
        'user' => User::all()->where('is_admin', 0),
        'admin' => User::all()->where('is_admin', 1)
    ]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/all_posts/checkSlug', [AdminAllPostsController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/all_posts', AdminAllPostsController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/users', AdminUsersController::class)->except('show')->middleware('admin');

Route::get('/dashboard/myprofile', [DashboardMyProfileController::class, 'index']);
Route::get('/dashboard/myprofile/edit', [DashboardMyProfileController::class, 'edit']);
Route::put('/dashboard/myprofile/edit/{username}', [DashboardMyProfileController::class, 'update']);

Route::get('/dashboard/myprofile/password/edit', [DashboardChangePasswordController::class, 'edit']);
Route::put('/dashboard/myprofile/password/edit', [DashboardChangePasswordController::class, 'update']);