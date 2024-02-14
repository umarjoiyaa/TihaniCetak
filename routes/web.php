<?php

use App\Http\Controllers\AreaShelfController;
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
use App\Http\Controllers\ProsesLipatController;
use App\Http\Controllers\ProsesPembungkusanController;
use App\Http\Controllers\ProsesPemgumpulangatheringController;
use App\Http\Controllers\ProsesPemotonganKulitBukuController;
use App\Http\Controllers\ProsesPenJilidanPrefectBindController;
use App\Http\Controllers\ProsesPenJilidanSaddlestitchController;
use App\Http\Controllers\ProsesThreeKnifeController;
use App\Http\Controllers\SalesOrderController;
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
Route::get('/Setting/role/index', [RoleController::class,'index'])->name('role');


// Role
Route::get('/Setting/role/index', [RoleController::class,'index'])->name('role');

// UOM
Route::get('/Setting/Uom', [UomController::class, 'Index'])->name('uom');
Route::get('/Setting/Uom/Data', [UomController::class, 'Data'])->name('uom.data');
Route::get('/Setting/Uom/Create', [UomController::class, 'Create'])->name('uom.create');
Route::post('/Setting/Uom/Store', [UomController::class, 'Store'])->name('uom.store');
Route::get('/Setting/Uom/Edit/{id}', [UomController::class, 'Edit'])->name('uom.edit');
Route::get('/Setting/Uom/View/{id}', [UomController::class, 'View'])->name('uom.view');
Route::post('/Setting/Uom/Update/{id}', [UomController::class, 'Update'])->name('uom.update');
Route::get('/Setting/Uom/Delete/{id}', [UomController::class, 'Delete'])->name('uom.delete');

// Department
Route::get('/Setting/Department', [DepartmentController::class, 'index'])->name('department');
Route::get('/Setting/Department/Data', [DepartmentController::class, 'Data'])->name('department.data');
Route::get('/Setting/Department/Create', [DepartmentController::class, 'Create'])->name('department.create');
Route::post('/Setting/Department/Store', [DepartmentController::class, 'Store'])->name('department.store');
Route::get('/Setting/Department/Edit/{id}', [DepartmentController::class, 'Edit'])->name('department.edit');
Route::get('/Setting/Department/View/{id}', [DepartmentController::class, 'View'])->name('department.view');
Route::post('/Setting/Department/Update/{id}', [DepartmentController::class, 'Update'])->name('department.update');
Route::get('/Setting/Department/Delete/{id}', [DepartmentController::class, 'Delete'])->name('department.delete');

// Designation
Route::get('/Setting/Designation', [DesignationController::class, 'index'])->name('designation');
Route::get('/Setting/Designation/Data', [DesignationController::class, 'Data'])->name('designation.data');
Route::get('/Setting/Designation/Create', [DesignationController::class, 'Create'])->name('designation.create');
Route::post('/Setting/Designation/Store', [DesignationController::class, 'Store'])->name('designation.store');
Route::get('/Setting/Designation/Edit/{id}', [DesignationController::class, 'Edit'])->name('designation.edit');
Route::get('/Setting/Designation/View/{id}', [DesignationController::class, 'View'])->name('designation.view');
Route::post('/Setting/Designation/Update/{id}', [DesignationController::class, 'Update'])->name('designation.update');
Route::get('/Setting/Designation/Delete/{id}', [DesignationController::class, 'Delete'])->name('designation.delete');

// User
Route::get('/Setting/User', [UserController::class, 'index'])->name('user');
Route::get('/Setting/User/Data', [UserController::class, 'Data'])->name('user.data');
Route::get('/Setting/User/Create', [UserController::class, 'Create'])->name('user.create');
Route::post('/Setting/User/Store', [UserController::class, 'Store'])->name('user.store');
Route::get('/Setting/User/Edit/{id}', [UserController::class, 'Edit'])->name('user.edit');
Route::get('/Setting/User/View/{id}', [UserController::class, 'View'])->name('user.view');
Route::post('/Setting/User/Update/{id}', [UserController::class, 'Update'])->name('user.update');
Route::get('/Setting/User/Delete/{id}', [UserController::class, 'Delete'])->name('user.delete');

//UOM Conversion
Route::get('/Setting/UomConversion', [UomController::class, 'index_conversion'])->name('uom_conversion');
Route::get('/Setting/UomConversion/Data', [UomController::class, 'Data_conversion'])->name('uom_conversion.data');
Route::get('/Setting/UomConversion/Create', [UomController::class, 'create_conversion'])->name('uom_conversion.create');
Route::post('/Setting/UomConversion/Store', [UomController::class, 'store_conversion'])->name('uom_conversion.store');
Route::get('/Setting/UomConversion/Edit/{id}', [UomController::class, 'edit_conversion'])->name('uom_conversion.edit');
Route::get('/Setting/UomConversion/View/{id}', [UomController::class, 'view_conversion'])->name('uom_conversion.view');
Route::post('/Setting/UomConversion/Update/{id}', [UomController::class, 'update_conversion'])->name('uom_conversion.update');
Route::get('/Setting/UomConversion/Delete/{id}', [UomController::class, 'destroy_conversion'])->name('uom_conversion.delete');

// Machine
Route::get('/Setting/Machine', [MachineController::class, 'index'])->name('machine');
Route::get('/Setting/Machine/Data', [MachineController::class, 'Data'])->name('machine.data');
Route::get('/Setting/Machine/Create', [MachineController::class, 'Create'])->name('machine.create');
Route::post('/Setting/Machine/Store', [MachineController::class, 'Store'])->name('machine.store');
Route::get('/Setting/Machine/Edit/{id}', [MachineController::class, 'Edit'])->name('machine.edit');
Route::get('/Setting/Machine/View/{id}', [MachineController::class, 'View'])->name('machine.view');
Route::post('/Setting/Machine/Update/{id}', [MachineController::class, 'Update'])->name('machine.update');
Route::get('/Setting/Machine/Delete/{id}', [MachineController::class, 'Delete'])->name('machine.delete');

// Area Level
Route::get('/Setting/AreaLevel', [AreaLevelController::class, 'index'])->name('area_level');
Route::get('/Setting/AreaLevel/Data', [AreaLevelController::class, 'Data'])->name('area_level.data');
Route::get('/Setting/AreaLevel/Create', [AreaLevelController::class, 'Create'])->name('area_level.create');
Route::post('/Setting/AreaLevel/Store', [AreaLevelController::class, 'Store'])->name('area_level.store');
Route::get('/Setting/AreaLevel/Edit/{id}', [AreaLevelController::class, 'Edit'])->name('area_level.edit');
Route::get('/Setting/AreaLevel/View/{id}', [AreaLevelController::class, 'View'])->name('area_level.view');
Route::post('/Setting/AreaLevel/Update/{id}', [AreaLevelController::class, 'Update'])->name('area_level.update');
Route::get('/Setting/AreaLevel/Delete/{id}', [AreaLevelController::class, 'Delete'])->name('area_level.delete');

// Area Shelf
Route::get('/Setting/AreaShelf', [AreaShelfController::class, 'index'])->name('area_shelf');
Route::get('/Setting/AreaShelf/Data', [AreaShelfController::class, 'Data'])->name('area_shelf.data');
Route::get('/Setting/AreaShelf/Create', [AreaShelfController::class, 'Create'])->name('area_shelf.create');
Route::post('/Setting/AreaShelf/Store', [AreaShelfController::class, 'Store'])->name('area_shelf.store');
Route::get('/Setting/AreaShelf/Edit/{id}', [AreaShelfController::class, 'Edit'])->name('area_shelf.edit');
Route::get('/Setting/AreaShelf/View/{id}', [AreaShelfController::class, 'View'])->name('area_shelf.view');
Route::post('/Setting/AreaShelf/Update/{id}', [AreaShelfController::class, 'Update'])->name('area_shelf.update');
Route::get('/Setting/AreaShelf/Delete/{id}', [AreaShelfController::class, 'Delete'])->name('area_shelf.delete');

// Product
Route::get('/Setting/Product', [ProductController::class, 'index'])->name('product');
Route::get('/Setting/Product/Data', [ProductController::class, 'Data'])->name('product.data');
Route::get('/Setting/Product/Create', [ProductController::class, 'Create'])->name('product.create');
Route::post('/Setting/Product/Store', [ProductController::class, 'Store'])->name('product.store');
Route::get('/Setting/Product/Edit/{id}', [ProductController::class, 'Edit'])->name('product.edit');
Route::get('/Setting/Product/View/{id}', [ProductController::class, 'View'])->name('product.view');
Route::post('/Setting/Product/Update/{id}', [ProductController::class, 'Update'])->name('product.update');
Route::get('/Setting/Product/Delete/{id}', [ProductController::class, 'Delete'])->name('product.delete');

// Product
Route::get('/Setting/Area', [AreaController::class, 'index'])->name('area');
Route::get('/Setting/Area/Data', [AreaController::class, 'Data'])->name('area.data');
Route::get('/Setting/Area/Create', [AreaController::class, 'Create'])->name('area.create');
Route::post('/Setting/Area/Store', [AreaController::class, 'Store'])->name('area.store');
Route::get('/Setting/Area/Edit/{id}', [AreaController::class, 'Edit'])->name('area.edit');
Route::get('/Setting/Area/View/{id}', [AreaController::class, 'View'])->name('area.view');
Route::post('/Setting/Area/Update/{id}', [AreaController::class, 'Update'])->name('area.update');
Route::get('/Setting/Area/Delete/{id}', [AreaController::class, 'Delete'])->name('area.delete');

//StockCard Report
Route::get('/WMS/StockCard_report', [StockCard_ReportController::class, 'index'])->name('StockCard_report');
Route::get('/WMS/StockCard_report/view', [StockCard_ReportController::class, 'view'])->name('StockCard_report.view');
Route::get('/WMS/StockCard_report/Create', [StockCard_ReportController::class, 'Create'])->name('StockCard_report.create');

//Invertory Report
Route::get('/WMS/Invertory_report', [Inventory_reportController::class, 'index'])->name('Invertory_report');
Route::get('/WMS/Invertory_report/view', [Inventory_reportController::class, 'view'])->name('Invertory_report.view');
Route::get('/WMS/Invertory_report/Create', [Inventory_reportController::class, 'Create'])->name('Invertory_report.create');

//Subcon Monitoring Report
Route::get('/WMS/Subcon_Monitoring_Report', [Subcon_monitorimg_report_Controller::class, 'index'])->name('Sub_monitring_report');
Route::get('/WMS/Subcon_Monitoring_Report/view', [Subcon_monitorimg_report_Controller::class, 'view'])->name('Sub_monitring_report.view');
Route::get('/WMS/Subcon_Monitoring_Report/Create', [Subcon_monitorimg_report_Controller::class, 'Create'])->name('Sub_monitring_report.create');

//invertory_ShopFloor
Route::get('/WMS/invertory_ShopFloor', [invertory_ShopFloorController::class, 'index'])->name('invertory_ShopFloor');
Route::get('/WMS/invertory_ShopFloor/view', [invertory_ShopFloorController::class, 'view'])->name('invertory_ShopFloor.view');
Route::get('/WMS/invertory_ShopFloor/Create', [invertory_ShopFloorController::class, 'Create'])->name('invertory_ShopFloor.create');

//invertory_ShopFloor
Route::get('/WMS/Stock_Transfer_location', [Stock_Transfer_locationController::class, 'index'])->name('stock_Transfer_location');
Route::get('/WMS/Stock_Transfer_location/view', [Stock_Transfer_locationController::class, 'view'])->name('stock_Transfer_location.view');
Route::get('/WMS/Stock_Transfer_location/Create', [Stock_Transfer_locationController::class, 'Create'])->name('stock_Transfer_location.create');
Route::get('/WMS/Stock_Transfer_location/receive', [Stock_Transfer_locationController::class, 'receive'])->name('stock_Transfer_location.receive');

//Good Receiving
Route::get('/WMS/Good_Receiving', [GoodReceivingController::class, 'index'])->name('Good_Receiving');
Route::get('/WMS/Good_Receiving/view', [GoodReceivingController::class, 'view'])->name('Good_Receiving.view');
Route::get('/WMS/Good_Receiving/Create', [GoodReceivingController::class, 'Create'])->name('Good_Receiving.create');
Route::get('/WMS/Good_Receiving/Receive', [GoodReceivingController::class, 'receive'])->name('Good_Receiving.receive');

// Material Requesst
Route::get('/WMS/Material_request', [Material_requestController::class, 'index'])->name('Material_request');
Route::get('/WMS/Material_request/view', [Material_requestController::class, 'view'])->name('Material_request.view');
Route::get('/WMS/Material_request/Create', [Material_requestController::class, 'Create'])->name('Material_request.create');

// Manage Transfer
Route::get('/WMS/Manage_tranfer', [Manage_TransferController::class, 'index'])->name('Manage_tranfer');
Route::get('/WMS/Manage_tranfer/view', [Manage_TransferController::class, 'view'])->name('Manage_tranfer.view');
Route::get('/WMS/Manage_tranfer/Create', [Manage_TransferController::class, 'Create'])->name('Manage_tranfer.create');

// Stock In
Route::get('/WMS/Stock_in', [Stock_InController::class, 'index'])->name('Stock_in');
Route::get('/WMS/Stock_in/view', [Stock_InController::class, 'view'])->name('Stock_in.view');
Route::get('/WMS/Stock_in/Create', [Stock_InController::class, 'Create'])->name('Stock_in.create');

// Stock Transfer
Route::get('/WMS/Stock_Transfer', [Stock_TransferController::class, 'index'])->name('Stock_Transfer');
Route::get('/WMS/Stock_Transfer/view', [Stock_TransferController::class, 'view'])->name('Stock_Transfer.view');
Route::get('/WMS/Stock_Transfer/Create', [Stock_TransferController::class, 'Create'])->name('Stock_Transfer.create');
Route::get('/WMS/Stock_Transfer/Receive', [Stock_TransferController::class, 'receive'])->name('Stock_Transfer.Receive');

// Laporan_Pemeriksaan
Route::get('/WMS/Laporan_Pemeriksaan', [Laporan_PemeriksaanController::class, 'index'])->name('Laporan_Pemeriksaan');
Route::get('/WMS/Laporan_Pemeriksaan/view', [Laporan_PemeriksaanController::class, 'view'])->name('Laporan_Pemeriksaan.view');
Route::get('/WMS/Laporan_Pemeriksaan/Create', [Laporan_PemeriksaanController::class, 'Create'])->name('Laporan_Pemeriksaan.create');
Route::get('/WMS/Laporan_Pemeriksaan/senarai', [Laporan_PemeriksaanController::class, 'senarai'])->name('Laporan_Pemeriksaan.senarai');

// Pemeriksaan_Penghantaran
Route::get('/WMS/Pemeriksaan_Penghantaran', [Pemeriksaan_PenghantaranController::class, 'index'])->name('Pemeriksaan_Penghantaran');
Route::get('/WMS/Pemeriksaan_Penghantaran/view', [Pemeriksaan_PenghantaranController::class, 'view'])->name('Pemeriksaan_Penghantaran.view');
Route::get('/WMS/Pemeriksaan_Penghantaran/Create', [Pemeriksaan_PenghantaranController::class, 'Create'])->name('Pemeriksaan_Penghantaran.create');
Route::get('/WMS/Pemeriksaan_Penghantaran/senarai', [Pemeriksaan_PenghantaranController::class, 'senarai'])->name('Pemeriksaan_Penghantaran.senarai');

// Sales Order List
Route::get('/Mes/SalesOrderList', [SalesOrderController::class, 'index'])->name('sale_order');
Route::get('/Mes/SalesOrderList/data', [SalesOrderController::class, 'data'])->name('sale_order.data');
Route::get('/Mes/SalesOrderList/view/{id}', [SalesOrderController::class, 'view'])->name('sale_order.view');
Route::get('/Mes/SalesOrderList/upload/{id}', [SalesOrderController::class, 'upload'])->name('sale_order.upload');
Route::post('/Mes/SalesOrderList/upload/submit/{id}', [SalesOrderController::class, 'upload_submit'])->name('sale_order.upload.submit');
Route::get('/Mes/SalesOrderList/approve/{id}', [SalesOrderController::class, 'approve'])->name('sale_order.approve');
Route::post('/Mes/SalesOrderList/approve/submit/{id}', [SalesOrderController::class, 'approve_submit'])->name('sale_order.approve.submit');
Route::get('/Mes/SalesOrderList/publish/{id}', [SalesOrderController::class, 'publish'])->name('sale_order.publish');
Route::post('/Mes/SalesOrderList/publish/submit/{id}', [SalesOrderController::class, 'publish_submit'])->name('sale_order.publish.submit');

// Sales Order List
Route::get('/Mes/SenariSemak', [Senari_SemakController::class, 'index'])->name('SenariSemak');
Route::get('/Mes/SenariSemak/view', [Senari_SemakController::class, 'view'])->name('SenariSemak.view');
Route::get('/Mes/SenariSemak/create', [Senari_SemakController::class, 'create'])->name('SenariSemak.create');
Route::get('/Mes/SenariSemak/edit', [Senari_SemakController::class, 'edit'])->name('SenariSemak.edit');

// Senari_SemakPra_Cetak
Route::get('/Mes/Senari_SemakPra_Cetak', [Senari_SemakPra_CetakController::class, 'index'])->name('Senari_SemakPra_Cetak');
Route::get('/Mes/Senari_SemakPra_Cetak/view', [Senari_SemakPra_CetakController::class, 'view'])->name('Senari_SemakPra_Cetak.view');
Route::get('/Mes/SenarSenari_SemakPra_CetakiSemak/create', [Senari_SemakPra_CetakController::class, 'create'])->name('Senari_SemakPra_Cetak.create');
Route::get('/Mes/Senari_SemakPra_Cetak/verify', [Senari_SemakPra_CetakController::class, 'verify'])->name('Senari_SemakPra_Cetak.verify');

// REKOD_SERAHANPLATE
Route::get('/Mes/REKOD_SERAHANPLATE', [REKOD_SERAHANPLAteController::class, 'index'])->name('REKOD_SERAHANPLATE');
Route::get('/Mes/REKOD_SERAHANPLATE/view', [REKOD_SERAHANPLAteController::class, 'view'])->name('REKOD_SERAHANPLATE.view');
Route::get('/Mes/REKOD_SERAHANPLATE/create', [REKOD_SERAHANPLAteController::class, 'create'])->name('REKOD_SERAHANPLATE.create');
Route::get('/Mes/REKOD_SERAHANPLATE/verify', [REKOD_SERAHANPLAteController::class, 'verify'])->name('REKOD_SERAHANPLATE.verify');

// LoPoranProsesPencetakan
Route::get('/Mes/LoPoranProsesPencetakan', [LoPoranProsesPencetakanController::class, 'index'])->name('LoPoranProsesPencetakan');
Route::get('/Mes/LoPoranProsesPencetakan/view', [LoPoranProsesPencetakanController::class, 'view'])->name('LoPoranProsesPencetakan.view');
Route::get('/Mes/LoPoranProsesPencetakan/create', [LoPoranProsesPencetakanController::class, 'create'])->name('LoPoranProsesPencetakan.create');
Route::get('/Mes/LoPoranProsesPencetakan/edit', [LoPoranProsesPencetakanController::class, 'edit'])->name('LoPoranProsesPencetakan.edit');
Route::get('/Mes/LoPoranProsesPencetakan/verify', [LoPoranProsesPencetakanController::class, 'verify'])->name('LoPoranProsesPencetakan.verify');

// LoPoranProsesLipat
Route::get('/Mes/LoPoranProsesLipat', [LoPoranProsesLipatController::class, 'index'])->name('LoPoranProsesLipat');
Route::get('/Mes/LoPoranProsesLipat/view', [LoPoranProsesLipatController::class, 'view'])->name('LoPoranProsesLipat.view');
Route::get('/Mes/LoPoranProsesLipat/create', [LoPoranProsesLipatController::class, 'create'])->name('LoPoranProsesLipat.create');
Route::get('/Mes/LoPoranProsesLipat/edit', [LoPoranProsesLipatController::class, 'edit'])->name('LoPoranProsesLipat.edit');
Route::get('/Mes/LoPoranProsesLipat/verify', [LoPoranProsesLipatController::class, 'verify'])->name('LoPoranProsesLipat.verify');

// LaporanProsesPenjilidan
Route::get('/Mes/LaporanProsesPenjilidan', [LaporanProsesPenjilidanController::class, 'index'])->name('LaporanProsesPenjilidan');
Route::get('/Mes/LaporanProsesPenjilidan/view', [LaporanProsesPenjilidanController::class, 'view'])->name('LaporanProsesPenjilidan.view');
Route::get('/Mes/LaporanProsesPenjilidan/create', [LaporanProsesPenjilidanController::class, 'create'])->name('LaporanProsesPenjilidan.create');
Route::get('/Mes/LaporanProsesPenjilidan/edit', [LaporanProsesPenjilidanController::class, 'edit'])->name('LaporanProsesPenjilidan.edit');
Route::get('/Mes/LaporanProsesPenjilidan/verify', [LaporanProsesPenjilidanController::class, 'verify'])->name('LaporanProsesPenjilidan.verify');

// LaporanProsesPenjilidanSaddleStitch
Route::get('/Mes/LaporanProsesPenjilidan(SaddleStitch)', [LaporanProsesPenjilidanSaddleStitchController::class, 'index'])->name('LaporanProsesPenjilidan(SaddleStitch)');
Route::get('/Mes/LaporanProsesPenjilidan(SaddleStitch)/view', [LaporanProsesPenjilidanSaddleStitchController::class, 'view'])->name('LaporanProsesPenjilidan(SaddleStitch).view');
Route::get('/Mes/LaporanProsesPenjilidan(SaddleStitch)/create', [LaporanProsesPenjilidanSaddleStitchController::class, 'create'])->name('LaporanProsesPenjilidan(SaddleStitch).create');
Route::get('/Mes/LaporanProsesPenjilidan(SaddleStitch)/edit', [LaporanProsesPenjilidanSaddleStitchController::class, 'edit'])->name('LaporanProsesPenjilidan(SaddleStitch).edit');
Route::get('/Mes/LaporanProsesPenjilidan(SaddleStitch)/verify', [LaporanProsesPenjilidanSaddleStitchController::class, 'verify'])->name('LaporanProsesPenjilidan(SaddleStitch).verify');

// LaporanProsesThreeKnife
Route::get('/Mes/LaporanProsesThreeKnife', [LaporanProsesThreeKnifeController::class, 'index'])->name('LaporanProsesThreeKnife');
Route::get('/Mes/LaporanProsesThreeKnife/view', [LaporanProsesThreeKnifeController::class, 'view'])->name('LaporanProsesThreeKnife.view');
Route::get('/Mes/LaporanProsesThreeKnife/create', [LaporanProsesThreeKnifeController::class, 'create'])->name('LaporanProsesThreeKnife.create');
Route::get('/Mes/LaporanProsesThreeKnife/edit', [LaporanProsesThreeKnifeController::class, 'edit'])->name('LaporanProsesThreeKnife.edit');
Route::get('/Mes/LaporanProsesThreeKnife/verify', [LaporanProsesThreeKnifeController::class, 'verify'])->name('LaporanProsesThreeKnife.verify');

// CTP
Route::get('/Mes/Ctp', [CTPController::class, 'index'])->name('Ctp');
Route::get('/Mes/Ctp/view', [CTPController::class, 'view'])->name('Ctp.view');
Route::get('/Mes/Ctp/create', [CTPController::class, 'create'])->name('Ctp.create');
Route::get('/Mes/Ctp/edit', [CTPController::class, 'edit'])->name('Ctp.edit');
Route::get('/Mes/Ctp/verify', [CTPController::class, 'verify'])->name('Ctp.verify');

// POD
Route::get('/Mes/POD', [PODController::class, 'index'])->name('POD');
Route::get('/Mes/POD/view', [PODController::class, 'view'])->name('POD.view');
Route::get('/Mes/POD/create', [PODController::class, 'create'])->name('POD.create');
Route::get('/Mes/POD/edit', [PODController::class, 'edit'])->name('POD.edit');
Route::get('/Mes/POD/verify', [PODController::class, 'verify'])->name('POD.verify');

// PlateCetak
Route::get('/Mes/PlateCetak', [PlateCetakController::class, 'index'])->name('PlateCetak');
Route::get('/Mes/PlateCetak/view', [PlateCetakController::class, 'view'])->name('PlateCetak.view');
Route::get('/Mes/PlateCetak/create', [PlateCetakController::class, 'create'])->name('PlateCetak.create');
Route::get('/Mes/PlateCetak/edit', [PlateCetakController::class, 'edit'])->name('PlateCetak.edit');
Route::get('/Mes/PlateCetak/verify', [PlateCetakController::class, 'verify'])->name('PlateCetak.verify');

// Prosespencetakan
Route::get('/Mes/Prosespencetakan', [ProsespencetakanController::class, 'index'])->name('Prosespencetakan');
Route::get('/Mes/Prosespencetakan/view', [ProsespencetakanController::class, 'view'])->name('Prosespencetakan.view');
Route::get('/Mes/Prosespencetakan/create', [ProsespencetakanController::class, 'create'])->name('Prosespencetakan.create');
Route::get('/Mes/Prosespencetakan/edit', [ProsespencetakanController::class, 'edit'])->name('Prosespencetakan.edit');
Route::get('/Mes/Prosespencetakan/verify', [ProsespencetakanController::class, 'verify'])->name('Prosespencetakan.verify');

// ProsesLipat
Route::get('/Mes/ProsesLipat', [ProsesLipatController::class, 'index'])->name('ProsesLipat');
Route::get('/Mes/ProsesLipat/view', [ProsesLipatController::class, 'view'])->name('ProsesLipat.view');
Route::get('/Mes/ProsesLipat/create', [ProsesLipatController::class, 'create'])->name('ProsesLipat.create');
Route::get('/Mes/ProsesLipat/edit', [ProsesLipatController::class, 'edit'])->name('ProsesLipat.edit');
Route::get('/Mes/ProsesLipat/verify', [ProsesLipatController::class, 'verify'])->name('ProsesLipat.verify');

// ProsesPenJilidanPrefectBind
Route::get('/Mes/ProsesPenJilidanPrefectBind', [ProsesPenJilidanPrefectBindController::class, 'index'])->name('ProsesPenJilidanPrefectBind');
Route::get('/Mes/ProsesPenJilidanPrefectBind/view', [ProsesPenJilidanPrefectBindController::class, 'view'])->name('ProsesPenJilidanPrefectBind.view');
Route::get('/Mes/ProsesPenJilidanPrefectBind/create', [ProsesPenJilidanPrefectBindController::class, 'create'])->name('ProsesPenJilidanPrefectBind.create');
Route::get('/Mes/ProsesPenJilidanPrefectBind/edit', [ProsesPenJilidanPrefectBindController::class, 'edit'])->name('ProsesPenJilidanPrefectBind.edit');
Route::get('/Mes/ProsesPenJilidanPrefectBind/verify', [ProsesPenJilidanPrefectBindController::class, 'verify'])->name('ProsesPenJilidanPrefectBind.verify');

//  ProsesPenJilidanSaddlestitch
Route::get('/Mes/ProsesPenJilidanSaddlestitch', [ProsesPenJilidanSaddlestitchController::class, 'index'])->name('ProsesPenJilidanSaddlestitch');
Route::get('/Mes/ProsesPenJilidanSaddlestitch/view', [ProsesPenJilidanSaddlestitchController::class, 'view'])->name('ProsesPenJilidanSaddlestitch.view');
Route::get('/Mes/ProsesPenJilidanSaddlestitch/create', [ProsesPenJilidanSaddlestitchController::class, 'create'])->name('ProsesPenJilidanSaddlestitch.create');
Route::get('/Mes/ProsesPenJilidanSaddlestitch/edit', [ProsesPenJilidanSaddlestitchController::class, 'edit'])->name('ProsesPenJilidanSaddlestitch.edit');
Route::get('/Mes/ProsesPenJilidanSaddlestitch/verify', [ProsesPenJilidanSaddlestitchController::class, 'verify'])->name('ProsesPenJilidanSaddlestitch.verify');

// ProsesThreeKnife
Route::get('/Mes/ProsesThreeKnife', [ProsesThreeKnifeController::class, 'index'])->name('ProsesThreeKnife');
Route::get('/Mes/ProsesThreeKnife/view', [ProsesThreeKnifeController::class, 'view'])->name('ProsesThreeKnife.view');
Route::get('/Mes/ProsesThreeKnife/create', [ProsesThreeKnifeController::class, 'create'])->name('ProsesThreeKnife.create');
Route::get('/Mes/ProsesThreeKnife/edit', [ProsesThreeKnifeController::class, 'edit'])->name('ProsesThreeKnife.edit');
Route::get('/Mes/ProsesThreeKnife/verify', [ProsesThreeKnifeController::class, 'verify'])->name('ProsesThreeKnife.verify');

// ProsesPembungkusan
Route::get('/Mes/ProsesPembungkusan', [ProsesPembungkusanController::class, 'index'])->name('ProsesPembungkusan');
Route::get('/Mes/ProsesPembungkusan/view', [ProsesPembungkusanController::class, 'view'])->name('ProsesPembungkusan.view');
Route::get('/Mes/ProsesPembungkusan/create', [ProsesPembungkusanController::class, 'create'])->name('ProsesPembungkusan.create');
Route::get('/Mes/ProsesPembungkusan/edit', [ProsesPembungkusanController::class, 'edit'])->name('ProsesPembungkusan.edit');
Route::get('/Mes/ProsesPembungkusan/verify', [ProsesPembungkusanController::class, 'verify'])->name('ProsesPembungkusan.verify');

// ProsesPemgumpulangathering
Route::get('/Mes/ProsesPemgumpulangathering', [ProsesPemgumpulangatheringController::class, 'index'])->name('ProsesPemgumpulangathering');
Route::get('/Mes/ProsesPemgumpulangathering/view', [ProsesPemgumpulangatheringController::class, 'view'])->name('ProsesPemgumpulangathering.view');
Route::get('/Mes/ProsesPemgumpulangathering/create', [ProsesPemgumpulangatheringController::class, 'create'])->name('ProsesPemgumpulangathering.create');
Route::get('/Mes/ProsesPemgumpulangathering/edit', [ProsesPemgumpulangatheringController::class, 'edit'])->name('ProsesPemgumpulangathering.edit');
Route::get('/Mes/ProsesPemgumpulangathering/verify', [ProsesPemgumpulangatheringController::class, 'verify'])->name('ProsesPemgumpulangathering.verify');

// ProsesPemotonganKulitBuku
Route::get('/Mes/ProsesPemotonganKulitBuku', [ProsesPemotonganKulitBukuController::class, 'index'])->name('ProsesPemotonganKulitBuku');
Route::get('/Mes/ProsesPemotonganKulitBuku/view', [ProsesPemotonganKulitBukuController::class, 'view'])->name('ProsesPemotonganKulitBuku.view');
Route::get('/Mes/ProsesPemotonganKulitBuku/create', [ProsesPemotonganKulitBukuController::class, 'create'])->name('ProsesPemotonganKulitBuku.create');
Route::get('/Mes/ProsesPemotonganKulitBuku/edit', [ProsesPemotonganKulitBukuController::class, 'edit'])->name('ProsesPemotonganKulitBuku.edit');
Route::get('/Mes/ProsesPemotonganKulitBuku/verify', [ProsesPemotonganKulitBukuController::class, 'verify'])->name('ProsesPemotonganKulitBuku.verify');

});
