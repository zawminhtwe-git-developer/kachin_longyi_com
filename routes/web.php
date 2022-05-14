<?php

use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Facades\Socialite;

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

Route::get("/", function () {
    return view("welcome");
})->name("welcome");

Auth::routes(['verify'=>true]);



Route::middleware(["isAdmin"])->group(function(){
    Route::get("/home", [App\Http\Controllers\HomeController::class,"index"])->middleware(['auth','verified'])->name("home");
    Route::resource("shareSkill",\App\Http\Controllers\ShareSkillController::class);
    Route::get("/user-manager",[\App\Http\Controllers\UserManagementController::class,"index"])->name("user-manager.index");
    Route::post("/make-admin",[\App\Http\Controllers\UserManagementController::class,"makeAdmin"])->name("user-manager.makeAdmin");
    Route::post("/make-ban",[\App\Http\Controllers\UserManagementController::class,"makeBan"])->name("user-manager.ban");
    Route::resource("postGallery",\App\Http\Controllers\PostGalleryController::class);
});
Route::resource("category",\App\Http\Controllers\CategoryController::class);
Route::resource("post",\App\Http\Controllers\PostController::class);


Route::middleware(["auth"])->group(function(){
    //about-me == AboutZawMinHtweController
    Route::resource("aboutZawMinHtwe",\App\Http\Controllers\AboutZawMinHtweController::class);
    Route::get("profile",[\App\Http\Controllers\AboutZawMinHtweController::class,"profile"])->name("profile");
    Route::get("aboutZawMinHtwe-detail/{slug}",[\App\Http\Controllers\AboutZawMinHtweController::class,"detail"])->name("aboutZawMinHtwe.detail");
    Route::resource("comment",\App\Http\Controllers\CommentController::class);
    Route::resource("gallery",\App\Http\Controllers\GalleryController::class);
    Route::get("/change-profile",[\App\Http\Controllers\UserManagementController::class,"changeProfile"])->name("user-manager.changeProfile");
    Route::post("/profile-change-photo",[\App\Http\Controllers\UserManagementController::class,"changePhoto"])->name("user-manager.changePhoto");
    Route::post("/change-password",[\App\Http\Controllers\UserManagementController::class,"changePassword"])->name("user-manager.changePassword");
    Route::post("/change-name",[\App\Http\Controllers\UserManagementController::class,"changeName"])->name("user-manager.changeName");
    Route::post("/change-email",[\App\Http\Controllers\UserManagementController::class,"changeEmail"])->name("user-manager.changeEmail");
    Route::resource("cart",\App\Http\Controllers\CartController::class);
    Route::resource("order",\App\Http\Controllers\OrderController::class);
    Route::resource("like",\App\Http\Controllers\SkillShareLikeController::class);
});
Route::get("aboutZawMinHtwe-me",[\App\Http\Controllers\AboutZawMinHtweController::class,"me"])->name("aboutZawMinHtwe.me");//me is to all post for blog welcome pages
Route::get("welcome-detail/{id}",[\App\Http\Controllers\WelcomeController::class,"detail"])->name("welcome-detail");
Route::post('welcome-search',[\App\Http\Controllers\WelcomeController::class,"search"])->name('welcome-search');
Route::get("developer",[\App\Http\Controllers\BlogController::class,"shareSkills"])->name('developer');// skill share for blog page
Route::get("social-share",[\App\Http\Controllers\SocialShareController::class,"index"]);

Route::get("auth/google", [GoogleController::class, "redirectToGoogle"]);
Route::get("auth/google/callback", [GoogleController::class, "handleGoogleCallback"]);

Route::get("auth/facebook", [FacebookController::class, "redirectToFacebook"]);
Route::get("auth/facebook/callback", [FacebookController::class, "handleFacebookCallback"]);

Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('auth/social', [\App\Http\Controllers\Auth\LoginController::class,"show"])->name('social.login');
Route::get('oauth/{driver}',  [\App\Http\Controllers\Auth\LoginController::class,"redirectToProvider"])->name('social.oauth');
Route::get('oauth/{driver}/callback',  [\App\Http\Controllers\Auth\LoginController::class,"handleProviderCallback"])->name('social.callback');

Route::resource("skill-share-comment",\App\Http\Controllers\SkillShareCommentController::class);

//Route::get('/cartlist',[\App\Http\Controllers\CartController::class,"cartList"])->name('login.cart-list');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(["prefix"=>"admin","middleware"=>"auth"],function(){
//    Route::get()
});

