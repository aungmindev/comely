<?php

use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ActivityController;
use App\Http\Controllers\Backend\CalendarController;
use App\Http\Controllers\Backend\CsvUploadController;
use App\Http\Controllers\Backend\dashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\LawsController;
use App\Http\Controllers\Backend\parliamentController;
use App\Http\Controllers\Backend\PSessionController;
use App\Http\Controllers\Backend\QandPController;
use App\Http\Controllers\Frontend\activityController as FrontendActivityController;
use App\Http\Controllers\Frontend\LawController;
use App\Http\Controllers\Frontend\QandproposalController;
use App\Http\Controllers\Frontend\ReportController as FrontendReportController;
use App\Http\Controllers\Frontend\SectionController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RolePermissionController;
use App\Models\Psession;
use App\Models\QandProposal;
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
// news
Route::get('/news/viewAll/frontend/{cat_id}', [NewsController::class , 'viewall'])->name('news.frontend.viewall');
//section
Route::get('/session/show/{sessionType}/{pTime?}/{sessionTime?}/{sessiondataType?}', [SectionController::class , 'index'])->name('session.view');
Route::get('/session/detail/{id}', [SectionController::class , 'show'])->name('session.frontend.detail');
Route::post('/session/get/bypid', [SectionController::class , 'getByPid'])->name('session.get.pid');

//Law
Route::get('/law/show/{lawType}/{pTime?}/{sessionTime?}', [LawController::class , 'index'])->name('law.view');
Route::get('/law/detail/{id}', [LawController::class , 'show'])->name('law.frontend.detail');
Route::post('/law/get/bypid', [LawController::class , 'getByPid'])->name('law.get.pid');

//Question and Proposal
Route::get('/qandp/show/{isstar}/{pTime?}/{sessionTime?}/{qandpType?}', [QandproposalController::class , 'index'])->name('qandp.view');
Route::get('/qandp/detail/{id}', [QandproposalController::class , 'show'])->name('qandp.frontend.detail');
Route::post('/qandp/get/bypid', [QandproposalController::class , 'getByPid'])->name('qandp.get.pid');

//Report
Route::get('/report/show/{pTime?}/{sessionTime?}', [FrontendReportController::class , 'index'])->name('report.view');
Route::get('/report/detail/{id}', [FrontendReportController::class , 'show'])->name('report.frontend.detail');
Route::post('/report/get/bypid', [FrontendReportController::class , 'getByPid'])->name('report.get.pid');

// Activity
Route::get('/activity/show', [FrontendActivityController::class , 'index'])->name('activity.frontend.index');

// calendar
Route::post('/calendar/setting/get', [CalendarController::class , 'getLists'])->name('calendar.setting.get');


//Frontend
Route::get('/app/detail/frontend/{model}/{view}/{id}', function ($model , $view , $id){
    $class = "App\Models\\".$model;
    $data  = $class::find($id);
    return view($view , compact('data'));

})->name('app.model.frontend.detail');


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

    //News
    Route::get('/news/breaking', [NewsController::class , 'breakingNews'])->name('news.breaking');
    Route::get('/news/hot',      [NewsController::class , 'hotNews'])->name('news.hot');
    Route::get('/news/latest', [NewsController::class , 'latestNews'])->name('news.latest');
    Route::get('/news/upload/{cat_id}', [NewsController::class , 'uploadNews'])->name('news.upload');
    Route::post('/news/upload', [NewsController::class , 'store'])->name('news.store');
    Route::post('/news/update', [NewsController::class , 'update'])->name('news.update');

    //Photo and videos
    Route::get('/gallery/get', [GalleryController::class , 'index'])->name('gallery.index');
    Route::post('/gallery/store', [GalleryController::class , 'store'])->name('gallery.store');
    Route::post('/gallery/update', [GalleryController::class , 'update'])->name('gallery.update');

    //Parliament Times
    Route::get('/parliament/times', [parliamentController::class , 'index'])->name('parliament.times.index');
    Route::post('/parliament/times/create', [parliamentController::class , 'create'])->name('parliament.times.create');

    //Parliament Session Times
    Route::post('/parliament/session/times/create', [parliamentController::class , 'session_create'])->name('parliament.session.times.create');

    //Session
    Route::get('parliament/session/', [PSessionController::class , 'index'])->name('psession.get');
    Route::post('parliament/session/data/get', [PSessionController::class , 'show'])->name('psession.show');
    Route::post('parliament/session/data/store', [PSessionController::class , 'store'])->name('psession.store');
    Route::post('parliament/session/data/update', [PSessionController::class , 'update'])->name('psession.update');

    // Laws
    Route::get('parliament/laws/', [LawsController::class , 'index'])->name('laws.get');
    Route::post('parliament/laws/data/get', [LawsController::class , 'show'])->name('laws.show');
    Route::post('parliament/laws/data/store', [LawsController::class , 'store'])->name('laws.store');
    Route::post('parliament/laws/data/update', [LawsController::class , 'update'])->name('laws.update');

    // Question and proposal
    Route::get('parliament/qandp/', [QandPController::class , 'index'])->name('qandp.get');
    Route::post('parliament/qandp/data/get', [QandPController::class , 'show'])->name('qandp.show');
    Route::post('parliament/qandp/data/store', [QandPController::class , 'store'])->name('qandp.store');
    Route::post('parliament/qandp/data/update', [QandPController::class , 'update'])->name('qandp.update');

    // Reports
    Route::get('parliament/report/', [ReportController::class , 'index'])->name('report.get');
    Route::post('parliament/report/data/get', [ReportController::class , 'show'])->name('report.show');
    Route::post('parliament/report/data/store', [ReportController::class , 'store'])->name('report.store');
    Route::post('parliament/report/data/update', [ReportController::class , 'update'])->name('report.update');

    // Activities
    Route::get('parliament/activities/', [ActivityController::class , 'index'])->name('activity.index');
    Route::post('parliament/activity/data/get', [ActivityController::class , 'show'])->name('activity.show');
    Route::post('parliament/activity/data/store', [ActivityController::class , 'store'])->name('activity.store');
    Route::post('parliament/activity/data/update', [ActivityController::class , 'update'])->name('activity.update');

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


