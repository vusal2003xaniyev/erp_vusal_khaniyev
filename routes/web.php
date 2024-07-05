<?php

use App\Http\Controllers\course\courseController;
use App\Http\Controllers\dashboard\dashboardController;
use App\Http\Controllers\profile\profileController;
use App\Http\Controllers\login\loginController;
use App\Http\Controllers\products\productsController;
use App\Http\Controllers\users\userController;
use App\Http\Controllers\accounting\accountingController;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\isLogout;


use Illuminate\Support\Facades\Route;



Route::middleware([isLogout::class])->group(function () {
    Route::get('/', function () {
        return redirect()->route('index_page_view');  //Dashboard View
    });
    Route::controller(dashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboarView')->name('index_page_view'); //Dashboard View
    });

    Route::controller(profileController::class)->group(function () {
        Route::get('/profile', 'profileView')->name('profil_page_view'); //Profile View
        Route::post('/profile', 'profileInformationPost')->name('profil_information_post'); //Profile Post
        Route::post('/password', 'profilePasswordPost')->name('profil_password_post'); //Password Post


    });
    Route::controller(loginController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout'); //Logout
    });
    Route::prefix('users')->group(function () {
        Route::controller(userController::class)->group(function () {
            Route::get('/user-add', 'AddView')->name('user_add_view'); //User Add View
            Route::post('/user-add', 'addPost')->name('user_add_post'); //User Add Post
            //    Route::post('/user-list', 'faviconEdit')->name('favicon_edit_post'); //Favicon Edit Post


        });
    });
    Route::prefix('products')->group(function () {
        Route::controller(productsController::class)->group(function () {
            Route::get('/product-list', 'productsView')->name('products_view'); //Products List
            Route::get('/product-delete/{id}', 'productsDelete'); //Products Delete
            Route::get('/category-list', 'categoriesView')->name('categories_view'); //Categories List
            Route::get('/category-delete/{id}', 'categoriesDelete'); //Categories Delete





            Route::post('/product-add', 'productsAddPost')->name('product_add_post'); //Products Add Post
            Route::post('/product-edit/view', 'productsEditView'); //Products Edit View
            Route::post('/product-edit', 'productsEditPost')->name('productsEditPost'); //Products Edit Post
            Route::post('/category-add', 'categoriesAddPost')->name('categories_add'); //Categories Add
            Route::post('/category-edit/view', 'categoriesEditView'); //Categories Edit View
            Route::post('/category-edit', 'categoriesEditPost')->name('categoriesEditPost'); //Categories Edit Post







        });
    });

    Route::prefix('accounting')->group(function () {
        Route::controller(accountingController::class)->group(function () {
            Route::get('/all', 'all')->name('accountingAll');
            Route::get('/income', 'incomePage')->name('accountingIncomePage');
            Route::get('/expense', 'expensePage')->name('accountingExpensePage');
            Route::get('/add', 'addView')->name('accountingAddView');
            Route::post('/add', 'addPost')->name('accountingAddPost');

            Route::get('/view/{id}/{page?}', 'viewPayment')->name('accountingViewPayment');
            Route::post('/view/{id}/{page?}', 'editPost')->name('accountingEditPost');


            Route::get('/filtr', 'filtrView')->name('accountingFiltrView');

            Route::get('/delete/{id}', 'deletePayment');
            Route::post('/filtr', 'search');
        });
    });
});




Route::middleware([isLogin::class])->group(function () {
    Route::controller(loginController::class)->group(function () {
        Route::get('/login', 'loginView')->name('login_page_view'); //Login View
        Route::post('/login', 'loginPost')->name('login_page_post'); //Login Post
    });
});
