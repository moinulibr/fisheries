<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MediaController;
//use App\Http\Controllers\SettingController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\UserRoleController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\LogoutController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\PhotoMessageController;
use App\Http\Controllers\Backend\Auth\RegisterController;
use App\Http\Controllers\Backend\ImportantLinkController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\ScrollingNewsTickerController;
use App\Http\Controllers\Backend\NecessaryOtherServiceController;
use App\Http\Controllers\Frontend\HomeController;

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


Route::get('clear', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('storage:link');
    return 'DONE'; //Return anything
});

Route::group(['as'=>'frontend.','prefix' =>'m'], function() {  
    Route::get('/index', [HomeController::class, 'index'])->name('home.index');
});

Route::get('/', [LoginController::class, 'show']);

Route::group(['middleware' => ['guest']], function() {
    /**
     * Register Routes
     */
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

    /**
     * Login Routes
     */
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::get('/admin/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

    /**
     * Reset Routes
     */
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    /**
     * Social Login Routes
     */
    // Route::get('auth/social', 'Auth\LoginController@show')->name('social.login');
    Route::get('oauth/{driver}', [LoginController::class, 'redirectToProvider'])->name('social.oauth');
    Route::get('oauth/{driver}/callback', [LoginController::class, 'handleProviderCallback'])->name('social.callback');

});

Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Routes
     */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
});

Route::group(['middleware' => ['auth','verified']], function() {  
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    /* Route::get('/news-ticker', [AdminController::class, 'newsTicker'])->name('admin.news_ticker');
    Route::get('/image-message', [AdminController::class, 'imageMessage'])->name('admin.image_message');
    Route::get('/important-links', [AdminController::class, 'importantLink'])->name('admin.important_link');
    Route::get('/other-services', [AdminController::class, 'otherService'])->name('admin.other_service');

    Route::get('/post', [PostController::class, 'index'])->name('admin.post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::get('/post/category', [PostController::class, 'category'])->name('admin.post.category');

    Route::get('/page', [PageController::class, 'index'])->name('admin.page.index');
    Route::get('/page/create', [PageController::class, 'create'])->name('admin.page.create');

    Route::get('/media', [MediaController::class, 'index'])->name('admin.media.index');
    Route::get('/media/create', [MediaController::class, 'create'])->name('admin.media.create');

    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('admin.user.profile');
    Route::get('/user/role', [UserController::class, 'role'])->name('admin.user.role');

    Route::get('/setting', [SettingController::class, 'index'])->name('admin.setting.index'); */

    /*
    |-----------------------------
    | scrolling news tricker
    |
    */
    
});

Route::group(['as'=>'admin.scrolling.news.ticker.','prefix' =>'admin/scrolling/news/ticker','middleware' => ['auth']], function() {  
    Route::get('/list',[ScrollingNewsTickerController::class,'index'])->name('index');
    Route::post('/store',[ScrollingNewsTickerController::class,'store'])->name('store');
    Route::get('/edit/{scrollingNewsTicker}',[ScrollingNewsTickerController::class,'edit'])->name('edit');
    Route::post('/edit/{scrollingNewsTicker}',[ScrollingNewsTickerController::class,'update'])->name('update');
    Route::get('/delete/{scrollingNewsTicker}',[ScrollingNewsTickerController::class,'delete'])->name('delete');
    Route::post('/deleting/{scrollingNewsTicker}',[ScrollingNewsTickerController::class,'destroy'])->name('deleting');
    Route::post('/bulk/deleting',[ScrollingNewsTickerController::class,'bulkDestroy'])->name('bulk.deleting');
    Route::get('/status/change/{scrollingNewsTicker}',[ScrollingNewsTickerController::class,'status'])->name('status');
    Route::post('/status/changing/{scrollingNewsTicker}',[ScrollingNewsTickerController::class,'statusChanging'])->name('status.changing');
});

Route::group(['as'=>'admin.photo.message.','prefix' =>'admin/image/mess','middleware' => ['auth']], function() {  
    Route::get('/list',[PhotoMessageController::class,'index'])->name('index');
    Route::post('/store',[PhotoMessageController::class,'store'])->name('store');
    Route::get('/edit/{photoMessage}',[PhotoMessageController::class,'edit'])->name('edit');
    Route::post('/edit/{photoMessage}',[PhotoMessageController::class,'update'])->name('update');
    Route::get('/delete/{photoMessage}',[PhotoMessageController::class,'delete'])->name('delete');
    Route::post('/deleting/{photoMessage}',[PhotoMessageController::class,'destroy'])->name('deleting');
    Route::post('/bulk/deleting',[PhotoMessageController::class,'bulkDestroy'])->name('bulk.deleting');
    Route::get('/status/change/{photoMessage}',[PhotoMessageController::class,'status'])->name('status');
    Route::post('/status/changing/{photoMessage}',[PhotoMessageController::class,'statusChanging'])->name('status.changing');
});

Route::group(['as'=>'admin.important.link.','prefix' =>'admin/important/link','middleware' => ['auth']], function() {  
    Route::get('/list',[ImportantLinkController::class,'index'])->name('index');
    Route::post('/store',[ImportantLinkController::class,'store'])->name('store');
    Route::get('/edit/{importantLink}',[ImportantLinkController::class,'edit'])->name('edit');
    Route::post('/edit/{importantLink}',[ImportantLinkController::class,'update'])->name('update');
    Route::get('/delete/{importantLink}',[ImportantLinkController::class,'delete'])->name('delete');
    Route::post('/deleting/{importantLink}',[ImportantLinkController::class,'destroy'])->name('deleting');
    Route::post('/bulk/deleting',[ImportantLinkController::class,'bulkDestroy'])->name('bulk.deleting');
    Route::get('/status/change/{importantLink}',[ImportantLinkController::class,'status'])->name('status');
    Route::post('/status/changing/{importantLink}',[ImportantLinkController::class,'statusChanging'])->name('status.changing');
});


Route::group(['as'=>'admin.necessary.other.service.','prefix' =>'admin/other/service','middleware' => ['auth']], function() {  
    Route::get('/list',[NecessaryOtherServiceController::class,'index'])->name('index');
    Route::post('/store',[NecessaryOtherServiceController::class,'store'])->name('store');
    Route::get('/edit/{necessaryOtherService}',[NecessaryOtherServiceController::class,'edit'])->name('edit');
    Route::post('/edit/{necessaryOtherService}',[NecessaryOtherServiceController::class,'update'])->name('update');
    Route::get('/delete/{necessaryOtherService}',[NecessaryOtherServiceController::class,'delete'])->name('delete');
    Route::post('/deleting/{necessaryOtherService}',[NecessaryOtherServiceController::class,'destroy'])->name('deleting');
    Route::post('/bulk/deleting',[NecessaryOtherServiceController::class,'bulkDestroy'])->name('bulk.deleting');
    Route::get('/status/change/{necessaryOtherService}',[NecessaryOtherServiceController::class,'status'])->name('status');
    Route::post('/status/changing/{necessaryOtherService}',[NecessaryOtherServiceController::class,'statusChanging'])->name('status.changing');
});


Route::group(['as'=>'admin.category.','prefix' =>'admin/category','middleware' => ['auth']], function() {  
    Route::get('/list',[CategoryController::class,'index'])->name('index');
    Route::get('/make/slug', [CategoryController::class,'slug'])->name('make.slug'); // slug
    Route::post('/store',[CategoryController::class,'store'])->name('store');
    Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('edit');
    Route::post('/edit/{category}',[CategoryController::class,'update'])->name('update');
    Route::get('/delete/{category}',[CategoryController::class,'delete'])->name('delete');
    Route::post('/deleting/{category}',[CategoryController::class,'destroy'])->name('deleting');
    Route::post('/bulk/deleting',[CategoryController::class,'bulkDestroy'])->name('bulk.deleting');
    Route::get('/status/change/{category}',[CategoryController::class,'status'])->name('status');
    Route::post('/status/changing/{category}',[CategoryController::class,'statusChanging'])->name('status.changing');
});


Route::group(['as'=>'admin.post.','prefix' =>'admin/post','middleware' => ['auth']], function() {  
    Route::get('/list/{ptp?}',[PostController::class,'index'])->name('index');
    Route::get('/create',[PostController::class,'create'])->name('create');
    Route::post('/store',[PostController::class,'store'])->name('store');
    Route::get('/edit/{post}',[PostController::class,'edit'])->name('edit');
    Route::post('/edit/{post}',[PostController::class,'update'])->name('update');
    Route::get('/delete/{post}',[PostController::class,'delete'])->name('delete');
    Route::post('/deleting/{post}',[PostController::class,'destroy'])->name('deleting');
    Route::post('/bulk/deleting',[PostController::class,'bulkDestroy'])->name('bulk.deleting');
    Route::get('/status/change/{post}',[PostController::class,'status'])->name('status');
    Route::post('/status/changing/{post}',[PostController::class,'statusChanging'])->name('status.changing');
});


Route::group(['as'=>'admin.page.','prefix' =>'admin/page','middleware' => ['auth']], function() {  
    Route::get('/list/{ptp?}',[PageController::class,'index'])->name('index');
    Route::get('/create/new',[PageController::class,'create'])->name('create');
    Route::post('/store',[PageController::class,'store'])->name('store');
    Route::get('/edit/{page}',[PageController::class,'edit'])->name('edit');
    Route::post('/edit/{page}',[PageController::class,'update'])->name('update');
    Route::get('/delete/{page}',[PageController::class,'delete'])->name('delete');
    Route::post('/deleting/{page}',[PageController::class,'destroy'])->name('deleting');
    Route::post('/bulk/deleting',[PageController::class,'bulkDestroy'])->name('bulk.deleting');
    Route::get('/status/change/{page}',[PageController::class,'status'])->name('status');
    Route::post('/status/changing/{page}',[PageController::class,'statusChanging'])->name('status.changing');
});


Route::group(['as'=>'admin.media.','prefix' =>'admin/media','middleware' => ['auth']], function() {  
    Route::get('/list',[MediaController::class,'index'])->name('index');
    Route::get('/create',[MediaController::class,'create'])->name('create');
    Route::post('/store',[MediaController::class,'store'])->name('store');
    Route::get('/edit/{media}',[MediaController::class,'edit'])->name('edit');
    Route::post('/edit/{media}',[MediaController::class,'update'])->name('update');
    Route::get('/delete/{media}',[MediaController::class,'delete'])->name('delete');
    Route::post('/deleting/{media}',[MediaController::class,'destroy'])->name('deleting');
    Route::post('/bulk/deleting',[MediaController::class,'bulkDestroy'])->name('bulk.deleting');
    Route::get('/status/change/{media}',[MediaController::class,'status'])->name('status');
    Route::post('/status/changing/{media}',[MediaController::class,'statusChanging'])->name('status.changing');
});

Route::group(['as'=>'admin.user.','prefix' =>'admin/user','middleware' => ['auth']], function() {  
    Route::get('/list/{utp?}',[UserController::class,'index'])->name('index');
    Route::get('/create/new',[UserController::class,'create'])->name('create');
    Route::post('/store',[UserController::class,'store'])->name('store');
    Route::get('/show/{user}',[UserController::class,'show'])->name('show');
    Route::get('/edit/{user}',[UserController::class,'edit'])->name('edit');
    Route::post('/edit/{user}',[UserController::class,'update'])->name('update');
    Route::get('/delete/{user}',[UserController::class,'delete'])->name('delete');
    Route::post('/deleting/{user}',[UserController::class,'destroy'])->name('deleting');
    Route::post('/bulk/deleting',[UserController::class,'bulkDestroy'])->name('bulk.deleting');
});

Route::group(['as'=>'admin.user.role.','prefix' =>'admin/user/role','middleware' => ['auth']], function() {  
    Route::get('/list',[UserRoleController::class,'index'])->name('index');
    Route::post('/store',[UserRoleController::class,'store'])->name('store');
    Route::get('/edit/{user}',[UserRoleController::class,'edit'])->name('edit');
    Route::post('/edit/{user}',[UserRoleController::class,'update'])->name('update');
    Route::get('/delete/{user}',[UserRoleController::class,'delete'])->name('delete');
    Route::post('/deleting/{user}',[UserRoleController::class,'destroy'])->name('deleting');
});

Route::group(['as'=>'admin.user.profile.','prefix' =>'admin/user/profile','middleware' => ['auth']], function() {  
    Route::get('/list',[UserProfileController::class,'index'])->name('index');
    Route::post('/store',[UserProfileController::class,'store'])->name('store');
    Route::get('/edit/{user}',[UserProfileController::class,'edit'])->name('edit');
    Route::post('/edit/{user}',[UserProfileController::class,'update'])->name('update');
    Route::get('/delete/{user}',[UserProfileController::class,'delete'])->name('delete');
    Route::post('/deleting/{user}',[UserProfileController::class,'destroy'])->name('deleting');
});


Route::group(['as'=>'admin.setting.','prefix' =>'admin/setting','middleware' => ['auth']], function() {  
    Route::get('/list',[SettingController::class,'index'])->name('index');
    Route::post('/store',[SettingController::class,'store'])->name('store');
    Route::get('/edit/{setting}',[SettingController::class,'edit'])->name('edit');
    Route::post('/edit/{setting}',[SettingController::class,'update'])->name('update');
    Route::post('/scroll/edit/{setting}',[SettingController::class,'scrollUpdate'])->name('scroll.update');
});

