<?php

use App\Http\Controllers\Backend\CalendarController;
use App\Http\Controllers\Backend\CsvUploadController;
use App\Http\Controllers\Backend\dashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [WelcomeController::class , 'index']);



Route::get('/locale/{language}' , function($language){
    App::setLocale($language);
    Session::put("locale" , $language);
    return redirect()->back();
})->name('locale.language');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [dashboardController::class , 'index'])->name('dashboard');
    Route::post('/dashboard/count', [dashboardController::class , 'dashboardCount'])->name('dashboard.count');
    Route::post('/dashboard/chart', [dashboardController::class , 'chart'])->name('dashboard.chart');
    Route::get('/csv/list', [CsvUploadController::class , 'index'])->name('csvlist.index');
    Route::post('/csv/list/get/datatable', [CsvUploadController::class , 'CsvdataTable'])->name('csvlist.get.datatable');
    Route::post('/csv/Upload', [CsvUploadController::class , 'store'])->name('csv.upload');

    // language
   
    //calendar
    Route::get('/calendar/setting', [CalendarController::class , 'index'])->name('calendar.setting');
    Route::post('/calendar/setting/store', [CalendarController::class , 'store'])->name('calendar.setting.store');
    Route::post('/calendar/setting/get', [CalendarController::class , 'getLists'])->name('calendar.setting.get');

    //News
    Route::get('/news/breaking', [NewsController::class , 'breakingNews'])->name('news.breaking');
    Route::get('/news/hot',      [NewsController::class , 'hotNews'])->name('news.hot');
    Route::get('/news/latest', [NewsController::class , 'latestNews'])->name('news.latest');
    Route::get('/news/upload/{cat_id}', [NewsController::class , 'uploadNews'])->name('news.upload');
    Route::post('/news/upload', [NewsController::class , 'store'])->name('news.store');
    Route::post('/news/update', [NewsController::class , 'update'])->name('news.update');
    Route::get('/news/viewAll/{cat_id}', [NewsController::class , 'viewall'])->name('news.viewall');

    //Photo and videos
    Route::get('/gallery/get', [GalleryController::class , 'index'])->name('gallery.index');
    Route::post('/gallery/store', [GalleryController::class , 'store'])->name('gallery.store');
    Route::post('/gallery/update', [GalleryController::class , 'update'])->name('gallery.update');

   


    //Global route for entire project's delete and edit
    Route::get('/app/delete/{model}/{id}/{default?}', function ($model , $id , $default = null){
        if($default == 'default'){
            $class = $model;
        }else{
            $class = "App\Models\\".$model;
        }
        $class::destroy($id);
        return redirect()->back()->withSuccess('Successfully Deleted.');
    })->name('app.model.delete') ;

    Route::get('/app/edit/{model}/{view}/{id}', function ($model , $view , $id){
        $class = "App\Models\\".$model;
        $data  = $class::find($id);
        return view($view , compact('data'));

    })->name('app.model.edit');

    Route::get('/app/detail/{model}/{view}/{id}', function ($model , $view , $id){
        $class = "App\Models\\".$model;
        $data  = $class::find($id);
        return view($view , compact('data'));

    })->name('app.model.detail');

    Route::get('/app/{view}/{id?}', function ($view){
        return view($view);
    })->name('app.view');

});

Route::middleware([
    'auth:sanctum','adminRole',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
 //roles and permission
 Route::get('/roles' , [RolePermissionController::class , 'index'])->name('role.index');
 Route::post('/roles/add' , [RolePermissionController::class , 'store'])->name('role.store');
 Route::get('/users' , [RolePermissionController::class , 'getUsers'])->name('users.get');
 Route::post('/user/add' , [RolePermissionController::class , 'addUsers'])->name('users.add');
 Route::post('/users/edit' , [RolePermissionController::class , 'update'])->name('users.update');

});


