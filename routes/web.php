<?php

use App\Http\Controllers\Backend\BoxoptionController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\dashboardController;
use App\Http\Controllers\Backend\ManualcashierController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
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

Route::get('/', function(){
    return view('welcome');
});

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

    //Stocks
    Route::get('/products/index', [StockController::class , 'index'])->name('products.index');
    Route::post('/products/get', [StockController::class , 'show'])->name('products.get');
    Route::get('/products/create', [StockController::class , 'create'])->name('products.create');
    Route::post('/products/create', [StockController::class , 'store'])->name('products.store');
    Route::get('/products/edit/{id}', [StockController::class , 'edit'])->name('products.edit');
    Route::post('/products/update', [StockController::class , 'update'])->name('products.update');

    //Box Option
    Route::get('/box/option/index', [BoxoptionController::class , 'index'])->name('boxOption.index');
    Route::post('/box/option/store', [BoxoptionController::class , 'store'])->name('boxOption.store');
    Route::get('/box/option/edit/{id}', [BoxoptionController::class , 'edit'])->name('boxOption.edit');

    //Brand 
    Route::get('/brand/index', [BrandController::class , 'index'])->name('brand.index');
    Route::post('/brand/store', [BrandController::class , 'store'])->name('brand.store');

    //Brand 
    Route::get('/category/index', [CategoryController::class , 'index'])->name('category.index');
    Route::post('/category/store', [CategoryController::class , 'store'])->name('category.store');

    //Manual Buying Process
    Route::get('/manual/cashier', [ManualcashierController::class , 'index'])->name('manual.cashier.index');
    Route::post('/manual/cashier/get/product', [ManualcashierController::class , 'getProduct'])->name('manual.cashier.get.product');
    Route::post('/manual/cashier/', [ManualcashierController::class , 'cashier'])->name('manual.cashier.cashier');

    //sale History
    Route::get('/sale/history', [ManualcashierController::class , 'history'])->name('sale.history');
    Route::post('/sale/history/get', [ManualcashierController::class , 'show'])->name('sale.history.get');

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

    Route::post('/app/get/images' , function(Request $request) {
        $model = $request->model;
        $column = $request->column;
        $class = "App\Models\\".$model;
        $data = $class::where($column , $request->id)->get();
        return $data;
    });

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


