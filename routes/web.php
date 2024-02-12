<?php

use App\Http\Controllers\Area_ShelfController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AreaLevelController;
use App\Http\Controllers\CTPController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\GoodReceivingController;
use App\Http\Controllers\Inventory_reportController;
use App\Http\Controllers\invertory_ShopFloorController;
use App\Http\Controllers\Laporan_PemeriksaanController;
use App\Http\Controllers\LaporanProsesPenjilidanController;
use App\Http\Controllers\LaporanProsesPenjilidanSaddleStitchController;
use App\Http\Controllers\LaporanProsesThreeKnifeController;
use App\Http\Controllers\LoPoranProsesLipatController;
use App\Http\Controllers\LoPoranProsesPencetakanController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\Manage_TransferController;
use App\Http\Controllers\Material_requestController;
use App\Http\Controllers\Pemeriksaan_PenghantaranController;
use App\Http\Controllers\PlateCetakController;
use App\Http\Controllers\PODController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProsespencetakanController;
use App\Http\Controllers\REKOD_SERAHANPLAteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesOrder_listController;
use App\Http\Controllers\Senari_SemakController;
use App\Http\Controllers\Senari_SemakPra_CetakController;
use App\Http\Controllers\Stock_InController;
use App\Http\Controllers\Stock_Transfer_locationController;
use App\Http\Controllers\Stock_TransferController;
use App\Http\Controllers\StockCard_ReportController;
use App\Http\Controllers\Subcon_monitorimg_report_Controller;
use App\Http\Controllers\UomController;
use App\Http\Controllers\UOMConverisonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => true
]);

Route::middleware('auth')->group(function () {
    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //PROFILE
    // Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    // Route::post('/user/profile', [ProfileController::class, 'update'])->name('user.profile.update');
    // Route::post('/user/profile/password', [ProfileController::class, 'password'])->name('profile.password.update');

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

//Subcon Monitoring Report
Route::get('/WHM/Subcon_Monitoring_Report', [Subcon_monitorimg_report_Controller::class, 'index'])->name('Sub_monitring_report.index');
Route::get('/WHM/Subcon_Monitoring_Report/view', [Subcon_monitorimg_report_Controller::class, 'view'])->name('Sub_monitring_report.view');
Route::get('/WHM/Subcon_Monitoring_Report/Create', [Subcon_monitorimg_report_Controller::class, 'Create'])->name('Sub_monitring_report.create');

//invertory_ShopFloor
Route::get('/WHM/invertory_ShopFloor', [invertory_ShopFloorController::class, 'index'])->name('invertory_ShopFloor.index');
Route::get('/WHM/invertory_ShopFloor/view', [invertory_ShopFloorController::class, 'view'])->name('invertory_ShopFloor.view');
Route::get('/WHM/invertory_ShopFloor/Create', [invertory_ShopFloorController::class, 'Create'])->name('invertory_ShopFloor.create');

//invertory_ShopFloor
Route::get('/WHM/Stock_Transfer_location', [Stock_Transfer_locationController::class, 'index'])->name('stock_Transfer_location.index');
Route::get('/WHM/Stock_Transfer_location/view', [Stock_Transfer_locationController::class, 'view'])->name('stock_Transfer_location.view');
Route::get('/WHM/Stock_Transfer_location/Create', [Stock_Transfer_locationController::class, 'Create'])->name('stock_Transfer_location.create');
Route::get('/WHM/Stock_Transfer_location/receive', [Stock_Transfer_locationController::class, 'receive'])->name('stock_Transfer_location.receive');

//Good Receiving
Route::get('/WHM/Good_Receiving', [GoodReceivingController::class, 'index'])->name('Good_Receiving.index');
Route::get('/WHM/Good_Receiving/view', [GoodReceivingController::class, 'view'])->name('Good_Receiving.view');
Route::get('/WHM/Good_Receiving/Create', [GoodReceivingController::class, 'Create'])->name('Good_Receiving.create');
Route::get('/WHM/Good_Receiving/Receive', [GoodReceivingController::class, 'receive'])->name('Good_Receiving.receive');

// Material Requesst
Route::get('/WHM/Material_request', [Material_requestController::class, 'index'])->name('Material_request.index');
Route::get('/WHM/Material_request/view', [Material_requestController::class, 'view'])->name('Material_request.view');
Route::get('/WHM/Material_request/Create', [Material_requestController::class, 'Create'])->name('Material_request.create');

// Manage Transfer
Route::get('/WHM/Manage_tranfer', [Manage_TransferController::class, 'index'])->name('Manage_tranfer.index');
Route::get('/WHM/Manage_tranfer/view', [Manage_TransferController::class, 'view'])->name('Manage_tranfer.view');
Route::get('/WHM/Manage_tranfer/Create', [Manage_TransferController::class, 'Create'])->name('Manage_tranfer.create');

// Stock In
Route::get('/WHM/Stock_in', [Stock_InController::class, 'index'])->name('Stock_in.index');
Route::get('/WHM/Stock_in/view', [Stock_InController::class, 'view'])->name('Stock_in.view');
Route::get('/WHM/Stock_in/Create', [Stock_InController::class, 'Create'])->name('Stock_in.create');

// Stock Transfer
Route::get('/WHM/Stock_Transfer', [Stock_TransferController::class, 'index'])->name('Stock_Transfer.index');
Route::get('/WHM/Stock_Transfer/view', [Stock_TransferController::class, 'view'])->name('Stock_Transfer.view');
Route::get('/WHM/Stock_Transfer/Create', [Stock_TransferController::class, 'Create'])->name('Stock_Transfer.create');
Route::get('/WHM/Stock_Transfer/Receive', [Stock_TransferController::class, 'receive'])->name('Stock_Transfer.Receive');

// Laporan_Pemeriksaan
Route::get('/WHM/Laporan_Pemeriksaan', [Laporan_PemeriksaanController::class, 'index'])->name('Laporan_Pemeriksaan.index');
Route::get('/WHM/Laporan_Pemeriksaan/view', [Laporan_PemeriksaanController::class, 'view'])->name('Laporan_Pemeriksaan.view');
Route::get('/WHM/Laporan_Pemeriksaan/Create', [Laporan_PemeriksaanController::class, 'Create'])->name('Laporan_Pemeriksaan.create');
Route::get('/WHM/Laporan_Pemeriksaan/senarai', [Laporan_PemeriksaanController::class, 'senarai'])->name('Laporan_Pemeriksaan.senarai');

// Pemeriksaan_Penghantaran
Route::get('/WHM/Pemeriksaan_Penghantaran', [Pemeriksaan_PenghantaranController::class, 'index'])->name('Pemeriksaan_Penghantaran.index');
Route::get('/WHM/Pemeriksaan_Penghantaran/view', [Pemeriksaan_PenghantaranController::class, 'view'])->name('Pemeriksaan_Penghantaran.view');
Route::get('/WHM/Pemeriksaan_Penghantaran/Create', [Pemeriksaan_PenghantaranController::class, 'Create'])->name('Pemeriksaan_Penghantaran.create');
Route::get('/WHM/Pemeriksaan_Penghantaran/senarai', [Pemeriksaan_PenghantaranController::class, 'senarai'])->name('Pemeriksaan_Penghantaran.senarai');

});
