<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Area_ShelfController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AreaLevelController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\Inventory_reportController;
use App\Http\Controllers\invertory_ShopFloorController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StockCard_ReportController;
use App\Http\Controllers\Subcon_monitorimg_report_Controller;
use App\Http\Controllers\UomController;
use App\Http\Controllers\UOMConverisonController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// App Route
Route::get('/', [AppController::class, 'App'])->name('app');


// Setting Route

// Role
Route::get('/Setting/role/index', [RoleController::class,'index'])->name('role.index');

// UOM
Route::get('/Setting/Uom', [UomController::class, 'Index'])->name('uom');
Route::get('/Setting/Uom/Create', [UomController::class, 'Create'])->name('uom.create');


//

// Department
Route::get('/Setting/Department', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/Setting/Department/view', [DepartmentController::class, 'view'])->name('department.view');
Route::get('/Setting/Department/Create', [DepartmentController::class, 'Create'])->name('department.create');

// Desgination
Route::get('/Setting/Desgination', [DesignationController::class, 'index'])->name('desgination.index');
Route::get('/Setting/Desgination/view', [DesignationController::class, 'view'])->name('desgination.view');
Route::get('/Setting/Desgination/Create', [DesignationController::class, 'Create'])->name('desgination.create');

// user
Route::get('/Setting/user', [UserController::class, 'index'])->name('user.index');
Route::get('/Setting/user/view', [UserController::class, 'view'])->name('user.view');
Route::get('/Setting/user/Create', [UserController::class, 'Create'])->name('user.create');

// Product
Route::get('/Setting/Product', [ProductController::class, 'index'])->name('Product.index');
Route::get('/Setting/Product/view', [ProductController::class, 'view'])->name('Product.view');
Route::get('/Setting/product/Create', [ProductController::class, 'Create'])->name('Product.create');

//UOM Conversion
Route::get('/Setting/UOMConversion', [UOMConverisonController::class, 'index'])->name('UOMConversion.index');
Route::get('/Setting/UOMConversion/view', [UOMConverisonController::class, 'view'])->name('UOMConversion.view');
Route::get('/Setting/UOMConversion/Create', [UOMConverisonController::class, 'Create'])->name('UOMConversion.create');

//Machine 
Route::get('/Setting/Machine', [MachineController::class, 'index'])->name('machine.index');
Route::get('/Setting/Machine/view', [MachineController::class, 'view'])->name('machine.view');
Route::get('/Setting/machine/Create', [MachineController::class, 'Create'])->name('machine.create');

//Area Level 
Route::get('/Setting/Area_Level', [AreaLevelController::class, 'index'])->name('area_level.index');
Route::get('/Setting/Area_Level/view', [AreaLevelController::class, 'view'])->name('area_level.view');
Route::get('/Setting/Area_Level/Create', [AreaLevelController::class, 'Create'])->name('area_level.create');

//Area Shelf 
Route::get('/Setting/Area_shelf', [Area_ShelfController::class, 'index'])->name('area_Shelf.index');
Route::get('/Setting/Area_shelf/view', [Area_ShelfController::class, 'view'])->name('area_Shelf.view');
Route::get('/Setting/Area_shelf/Create', [Area_ShelfController::class, 'Create'])->name('area_Shelf.create');

//Area
Route::get('/Setting/Area', [AreaController::class, 'index'])->name('area.index');
Route::get('/Setting/Area/view', [AreaController::class, 'view'])->name('area.view');
Route::get('/Setting/Area/Create', [AreaController::class, 'Create'])->name('area.create');

//StockCard Report
Route::get('/WHM/StockCard_report', [StockCard_ReportController::class, 'index'])->name('StockCard_report.index');
Route::get('/WHM/StockCard_report/view', [StockCard_ReportController::class, 'view'])->name('StockCard_report.view');
Route::get('/WHM/StockCard_report/Create', [StockCard_ReportController::class, 'Create'])->name('StockCard_report.create');

//Invertory Report
Route::get('/WHM/Invertory_report', [Inventory_reportController::class, 'index'])->name('Invertory_report.index');
Route::get('/WHM/Invertory_report/view', [Inventory_reportController::class, 'view'])->name('Invertory_report.view');
Route::get('/WHM/Invertory_report/Create', [Inventory_reportController::class, 'Create'])->name('Invertory_report.create');

//SubInvertory Report
Route::get('/WHM/Sub_monitring_report', [Subcon_monitorimg_report_Controller::class, 'index'])->name('Sub_monitring_report.index');
Route::get('/WHM/Sub_monitring_report/view', [Subcon_monitorimg_report_Controller::class, 'view'])->name('Sub_monitring_report.view');
Route::get('/WHM/Sub_monitring_report/Create', [Subcon_monitorimg_report_Controller::class, 'Create'])->name('Sub_monitring_report.create');

//invertory_ShopFloor
Route::get('/WHM/invertory_ShopFloor', [invertory_ShopFloorController::class, 'index'])->name('invertory_ShopFloor.index');
Route::get('/WHM/invertory_ShopFloor/view', [invertory_ShopFloorController::class, 'view'])->name('invertory_ShopFloor.view');
Route::get('/WHM/invertory_ShopFloor/Create', [invertory_ShopFloorController::class, 'Create'])->name('invertory_ShopFloor.create');

