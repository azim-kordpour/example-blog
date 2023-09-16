<?php

use App\Livewire\Back\Auth\Login;
use App\Livewire\Back\Auth\Profile;
use App\Livewire\Back\Category\AllCategories;
use App\Livewire\Back\Category\CreateCategory;
use App\Livewire\Back\Contact\AllContacts;
use App\Livewire\Back\Post\AllPosts;
use App\Livewire\Back\Post\CreatePost;
use App\Livewire\Back\Post\EditPost;
use App\Livewire\Front\Contact\CreateContact;
use App\Livewire\Front\Home\ShowHome;
use App\Livewire\Front\Post\ShowPost;
use Illuminate\Support\Facades\Route;

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

Route::get('/', ShowHome::class)
    ->name('home');

Route::get('post/{slug}', ShowPost::class)
    ->name('front.show.post');

Route::get('contact', CreateContact::class)
    ->name('front.create.contact');

Route::get('admin/login', Login::class)
    ->middleware('guest')
    ->name('login');

Route::middleware('auth')->prefix('admin')->name('back.')->group(function () {
    Route::get('posts', AllPosts::class)
        ->name('all.posts');

    Route::get('posts/create', CreatePost::class)
        ->name('create.post');

    Route::get('posts/edit/{post}', EditPost::class)
        ->name('edit.post');

    Route::get('categories', AllCategories::class)
        ->name('all.categories');

    Route::get('categories/create', CreateCategory::class)
        ->name('create.category');

    Route::get('contacts', AllContacts::class)
        ->name('all.contacts');

    Route::get('profile', Profile::class)
        ->name('profile');
});
