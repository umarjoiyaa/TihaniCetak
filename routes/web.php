<?php

use App\Http\Controllers\AreaShelfController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AreaLevelController;
use App\Http\Controllers\BorangeSerahKerja_TeksController;
use App\Http\Controllers\BorangeSerahKerjaController;
use App\Http\Controllers\CallForAssistanceController;
use App\Http\Controllers\Cover_endPaperController;
use App\Http\Controllers\CTPController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PengumpulanGatheringController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DigitalPrintingController;
use App\Http\Controllers\LaporanPemeriksaanKualitiController;
use App\Http\Controllers\Laporan_PemeriksaanController;
use App\Http\Controllers\GoodReceivingController;
use App\Http\Controllers\InventoryReportController;
use App\Http\Controllers\invertory_ShopFloorController;
use App\Http\Controllers\LaporanPemeriksaanKualitiPenjilidanController;
use App\Http\Controllers\KulitBukuController;
use App\Http\Controllers\LaporanProsesPenjilidanController;
use App\Http\Controllers\LaporanProsesPenjilidanSaddleController;
use App\Http\Controllers\LaporanProsesThreeController;
use App\Http\Controllers\LaporanProsesLipatController;
use App\Http\Controllers\LaporanProsesPencetakaniCetakController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MachineDashboardController;
use App\Http\Controllers\ManageTransferController;
use App\Http\Controllers\MaterialRequestController;
use App\Http\Controllers\OEEDashboardController;
use App\Http\Controllers\Pemeriksaan_PenghantaranController;
use App\Http\Controllers\PlateCetakController;
use App\Http\Controllers\PODController;
use App\Http\Controllers\PrintingProcessController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MesinKnifeController;
use App\Http\Controllers\ProductionJobSheet_MesinLipatController;
use App\Http\Controllers\PerfectBindController;
use App\Http\Controllers\StapleBindController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\ProductionReportController;
use App\Http\Controllers\ProductionSchedulingController;
use App\Http\Controllers\ProsesPencetakanController;
use App\Http\Controllers\RekodSerahanPlateController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SenariSemakController;
use App\Http\Controllers\ShopFloorController;
use App\Http\Controllers\Stock_InController;
use App\Http\Controllers\Stock_Transfer_locationController;
use App\Http\Controllers\Stock_TransferController;
use App\Http\Controllers\StockCard_ReportController;
use App\Http\Controllers\Subcon_monitorimg_report_Controller;
use App\Http\Controllers\UomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanPemeriksaanKualitiPenjilidanSaddleController;
use App\Http\Controllers\ProsesPembungkusanController;
use App\Http\Controllers\ProsesThreeKnifeController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\SenariSemakCetakController;
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
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');

    //PROFILE
    // Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    // Route::post('/user/profile', [ProfileController::class, 'update'])->name('user.profile.update');
    // Route::post('/user/profile/password', [ProfileController::class, 'password'])->name('profile.password.update');

    // START SETTINGS //

    // Role
    Route::get('/Setting/role', [RoleController::class,'index'])->name('role');
    Route::get('/Setting/role/data', [RoleController::class,'Data'])->name('role.data');
    Route::get('/Setting/role/create', [RoleController::class,'create'])->name('role.create');
    Route::post('/Setting/role/store', [RoleController::class,'store'])->name('role.store');
    Route::get('/Setting/role/edit/{id}', [RoleController::class,'edit'])->name('role.edit');
    Route::get('/Setting/role/view/{id}', [RoleController::class,'view'])->name('role.view');
    Route::post('/Setting/role/update/{id}', [RoleController::class,'update'])->name('role.update');
    Route::get('/Setting/role/delete/{id}', [RoleController::class,'delete'])->name('role.delete');

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

    // Users
    Route::get('/Setting/User', [UserController::class, 'index'])->name('user');
    Route::get('/Setting/User/Data', [UserController::class, 'Data'])->name('user.data');
    Route::get('/Setting/User/Create', [UserController::class, 'Create'])->name('user.create');
    Route::post('/Setting/User/Store', [UserController::class, 'Store'])->name('user.store');
    Route::get('/Setting/User/Edit/{id}', [UserController::class, 'Edit'])->name('user.edit');
    Route::get('/Setting/User/View/{id}', [UserController::class, 'View'])->name('user.view');
    Route::post('/Setting/User/Update/{id}', [UserController::class, 'Update'])->name('user.update');
    Route::get('/Setting/User/Delete/{id}', [UserController::class, 'Delete'])->name('user.delete');

    // Product
    Route::get('/Setting/Product', [ProductController::class, 'index'])->name('product');
    Route::get('/Setting/Product/Data', [ProductController::class, 'Data'])->name('product.data');
    Route::get('/Setting/Product/View/{id}', [ProductController::class, 'View'])->name('product.view');

    // UOM
    Route::get('/Setting/Uom', [UomController::class, 'Index'])->name('uom');
    Route::get('/Setting/Uom/Data', [UomController::class, 'Data'])->name('uom.data');
    Route::get('/Setting/Uom/Create', [UomController::class, 'Create'])->name('uom.create');
    Route::post('/Setting/Uom/Store', [UomController::class, 'Store'])->name('uom.store');
    Route::get('/Setting/Uom/Edit/{id}', [UomController::class, 'Edit'])->name('uom.edit');
    Route::get('/Setting/Uom/View/{id}', [UomController::class, 'View'])->name('uom.view');
    Route::post('/Setting/Uom/Update/{id}', [UomController::class, 'Update'])->name('uom.update');
    Route::get('/Setting/Uom/Delete/{id}', [UomController::class, 'Delete'])->name('uom.delete');

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

    // Area
    Route::get('/Setting/Area', [AreaController::class, 'index'])->name('area');
    Route::get('/Setting/Area/Data', [AreaController::class, 'Data'])->name('area.data');
    Route::get('/Setting/Area/Create', [AreaController::class, 'Create'])->name('area.create');
    Route::post('/Setting/Area/Store', [AreaController::class, 'Store'])->name('area.store');
    Route::get('/Setting/Area/Edit/{id}', [AreaController::class, 'Edit'])->name('area.edit');
    Route::get('/Setting/Area/View/{id}', [AreaController::class, 'View'])->name('area.view');
    Route::post('/Setting/Area/Update/{id}', [AreaController::class, 'Update'])->name('area.update');
    Route::get('/Setting/Area/Delete/{id}', [AreaController::class, 'Delete'])->name('area.delete');

    // END SETTINGS //

    // START Mes //

    // Sales Order List
    Route::get('/Mes/SalesOrderList', [SalesOrderController::class, 'index'])->name('sale_order');
    Route::get('/Mes/SalesOrderList/data', [SalesOrderController::class, 'data'])->name('sale_order.data');
    Route::get('/Mes/SalesOrderList/view/{id}', [SalesOrderController::class, 'view'])->name('sale_order.view');
    Route::get('/Mes/SalesOrderList/upload/{id}', [SalesOrderController::class, 'upload'])->name('sale_order.upload');
    Route::post('/Mes/SalesOrderList/upload/submit/{id}', [SalesOrderController::class, 'upload_submit'])->name('sale_order.upload.submit');
    Route::get('/Mes/SalesOrderList/approve/{id}', [SalesOrderController::class, 'approve'])->name('sale_order.approve');
    Route::post('/Mes/SalesOrderList/approve/approve/{id}', [SalesOrderController::class, 'approve_approve'])->name('sale_order.approve.approve');
    Route::post('/Mes/SalesOrderList/approve/decline/{id}', [SalesOrderController::class, 'approve_decline'])->name('sale_order.approve.decline');
    Route::get('/Mes/SalesOrderList/publish/{id}', [SalesOrderController::class, 'publish'])->name('sale_order.publish');
    Route::post('/Mes/SalesOrderList/publish/submit/{id}', [SalesOrderController::class, 'publish_submit'])->name('sale_order.publish.submit');

    // Senari Semak
    Route::get('/Mes/SenariSemak', [SenariSemakController::class, 'index'])->name('senari_semak');
    Route::get('/Mes/SenariSemak/data', [SenariSemakController::class, 'Data'])->name('senari_semak.data');
    Route::get('/Mes/SenariSemak/create', [SenariSemakController::class, 'create'])->name('senari_semak.create');
    Route::get('/Mes/SenariSemak/SaleOrder/get', [SenariSemakController::class, 'sale_order'])->name('sale_order.get');
    Route::get('/Mes/SenariSemak/SaleOrder/detail/get', [SenariSemakController::class, 'sale_order_detail'])->name('sale_order.detail.get');
    Route::post('/Mes/SenariSemak/store', [SenariSemakController::class, 'store'])->name('senari_semak.store');
    Route::get('/Mes/SenariSemak/view/{id}', [SenariSemakController::class, 'view'])->name('senari_semak.view');
    Route::get('/Mes/SenariSemak/edit/{id}', [SenariSemakController::class, 'edit'])->name('senari_semak.edit');
    Route::post('/Mes/SenariSemak/update/{id}', [SenariSemakController::class, 'update'])->name('senari_semak.update');
    Route::get('/Mes/SenariSemak/verify/{id}', [SenariSemakController::class, 'verify'])->name('senari_semak.verify');
    Route::post('/Mes/SenariSemak/approve/approve/{id}', [SenariSemakController::class, 'approve_approve'])->name('senari_semak.approve.approve');
    Route::post('/Mes/SenariSemak/approve/decline/{id}', [SenariSemakController::class, 'approve_decline'])->name('senari_semak.approve.decline');
    Route::get('/Mes/SenariSemak/delete/{id}', [SenariSemakController::class, 'delete'])->name('senari_semak.delete');

    // Senari Semak Cetak
    Route::get('/Mes/SenariSemakCetak', [SenariSemakCetakController::class, 'index'])->name('senari_semak_cetak');
    Route::get('/Mes/SenariSemakCetak/data', [SenariSemakCetakController::class, 'Data'])->name('senari_semak_cetak.data');
    Route::get('/Mes/SenariSemakCetak/create', [SenariSemakCetakController::class, 'create'])->name('senari_semak_cetak.create');
    Route::get('/Mes/SenariSemakCetak/SaleOrder/get', [SenariSemakCetakController::class, 'sale_order'])->name('senari_semak_cetak.sale_order.get');
    Route::get('/Mes/SenariSemakCetakEdit/SaleOrder/get', [SenariSemakCetakController::class, 'sale_order_edit'])->name('senari_semak_cetak_edit.sale_order.get');
    Route::post('/Mes/SenariSemakCetak/store', [SenariSemakCetakController::class, 'store'])->name('senari_semak_cetak.store');
    Route::get('/Mes/SenariSemakCetak/view/{id}', [SenariSemakCetakController::class, 'view'])->name('senari_semak_cetak.view');
    Route::get('/Mes/SenariSemakCetak/edit/{id}', [SenariSemakCetakController::class, 'edit'])->name('senari_semak_cetak.edit');
    Route::post('/Mes/SenariSemakCetak/update/{id}', [SenariSemakCetakController::class, 'update'])->name('senari_semak_cetak.update');
    Route::get('/Mes/SenariSemakCetak/verify/{id}', [SenariSemakCetakController::class, 'verify'])->name('senari_semak_cetak.verify');
    Route::post('/Mes/SenariSemakCetak/approve/approve/{id}', [SenariSemakCetakController::class, 'approve_approve'])->name('senari_semak_cetak.approve.approve');
    Route::post('/Mes/SenariSemakCetak/approve/decline/{id}', [SenariSemakCetakController::class, 'approve_decline'])->name('senari_semak_cetak.approve.decline');
    Route::get('/Mes/SenariSemakCetak/delete/{id}', [SenariSemakCetakController::class, 'delete'])->name('senari_semak_cetak.delete');

    // RekodSerahanPlate
    Route::get('/Mes/RekodSerahanPlate', [RekodSerahanPlateController::class, 'index'])->name('rekod_serahan_plate');
    Route::get('/Mes/RekodSerahanPlate/Data', [RekodSerahanPlateController::class, 'Data'])->name('rekod_serahan_plate.data');
    Route::get('/Mes/RekodSerahanPlate/Create', [RekodSerahanPlateController::class, 'Create'])->name('rekod_serahan_plate.create');
    Route::post('/Mes/RekodSerahanPlate/Store', [RekodSerahanPlateController::class, 'Store'])->name('rekod_serahan_plate.store');
    Route::get('/Mes/RekodSerahanPlate/Edit/{id}', [RekodSerahanPlateController::class, 'Edit'])->name('rekod_serahan_plate.edit');
    Route::get('/Mes/RekodSerahanPlate/View/{id}', [RekodSerahanPlateController::class, 'View'])->name('rekod_serahan_plate.view');
    Route::post('/Mes/RekodSerahanPlate/Update/{id}', [RekodSerahanPlateController::class, 'Update'])->name('rekod_serahan_plate.update');
    Route::get('/Mes/RekodSerahanPlate/Delete/{id}', [RekodSerahanPlateController::class, 'Delete'])->name('rekod_serahan_plate.delete');

    // Laporan Proses Pencetakani
    Route::get('/Mes/LaporanProsesPencetakani', [LaporanProsesPencetakaniCetakController::class, 'index'])->name('laporan_proses_pencetakani');
    Route::get('/Mes/LaporanProsesPencetakaniCetak/data', [LaporanProsesPencetakaniCetakController::class, 'Data'])->name('laporan_proses_pencetakani.data');
    Route::get('/Mes/LaporanProsesPencetakaniCetak/create', [LaporanProsesPencetakaniCetakController::class, 'create'])->name('laporan_proses_pencetakani.create');
    Route::post('/Mes/LaporanProsesPencetakaniCetak/store', [LaporanProsesPencetakaniCetakController::class, 'store'])->name('laporan_proses_pencetakani.store');
    Route::get('/Mes/LaporanProsesPencetakaniCetak/view/{id}', [LaporanProsesPencetakaniCetakController::class, 'view'])->name('laporan_proses_pencetakani.view');
    Route::get('/Mes/LaporanProsesPencetakaniCetak/edit/{id}', [LaporanProsesPencetakaniCetakController::class, 'edit'])->name('laporan_proses_pencetakani.edit');
    Route::post('/Mes/LaporanProsesPencetakaniCetak/update/{id}', [LaporanProsesPencetakaniCetakController::class, 'update'])->name('laporan_proses_pencetakani.update');
    Route::get('/Mes/LaporanProsesPencetakaniCetak/verify/{id}', [LaporanProsesPencetakaniCetakController::class, 'verify'])->name('laporan_proses_pencetakani.verify');
    Route::post('/Mes/LaporanProsesPencetakaniCetak/approve/approve/{id}', [LaporanProsesPencetakaniCetakController::class, 'approve_approve'])->name('laporan_proses_pencetakani.approve.approve');
    Route::post('/Mes/LaporanProsesPencetakaniCetak/approve/decline/{id}', [LaporanProsesPencetakaniCetakController::class, 'approve_decline'])->name('laporan_proses_pencetakani.approve.decline');
    Route::get('/Mes/LaporanProsesPencetakaniCetak/delete/{id}', [LaporanProsesPencetakaniCetakController::class, 'delete'])->name('laporan_proses_pencetakani.delete');

    // Laporan Proses Lipat
    Route::get('/Mes/LaporanProsesLipat', [LaporanProsesLipatController::class, 'index'])->name('laporan_proses_lipat');
    Route::get('/Mes/LaporanProsesLipat/data', [LaporanProsesLipatController::class, 'Data'])->name('laporan_proses_lipat.data');
    Route::get('/Mes/LaporanProsesLipat/create', [LaporanProsesLipatController::class, 'create'])->name('laporan_proses_lipat.create');
    Route::post('/Mes/LaporanProsesLipat/store', [LaporanProsesLipatController::class, 'store'])->name('laporan_proses_lipat.store');
    Route::get('/Mes/LaporanProsesLipat/view/{id}', [LaporanProsesLipatController::class, 'view'])->name('laporan_proses_lipat.view');
    Route::get('/Mes/LaporanProsesLipat/edit/{id}', [LaporanProsesLipatController::class, 'edit'])->name('laporan_proses_lipat.edit');
    Route::post('/Mes/LaporanProsesLipat/update/{id}', [LaporanProsesLipatController::class, 'update'])->name('laporan_proses_lipat.update');
    Route::get('/Mes/LaporanProsesLipat/verify/{id}', [LaporanProsesLipatController::class, 'verify'])->name('laporan_proses_lipat.verify');
    Route::post('/Mes/LaporanProsesLipat/approve/approve/{id}', [LaporanProsesLipatController::class, 'approve_approve'])->name('laporan_proses_lipat.approve.approve');
    Route::post('/Mes/LaporanProsesLipat/approve/decline/{id}', [LaporanProsesLipatController::class, 'approve_decline'])->name('laporan_proses_lipat.approve.decline');
    Route::get('/Mes/LaporanProsesLipat/delete/{id}', [LaporanProsesLipatController::class, 'delete'])->name('laporan_proses_lipat.delete');

    // Laporan Proses Penjilidan
    Route::get('/Mes/LaporanProsesPenjilidan', [LaporanProsesPenjilidanController::class, 'index'])->name('laporan_proses_penjilidan');
    Route::get('/Mes/LaporanProsesPenjilidan/data', [LaporanProsesPenjilidanController::class, 'Data'])->name('laporan_proses_penjilidan.data');
    Route::get('/Mes/LaporanProsesPenjilidan/create', [LaporanProsesPenjilidanController::class, 'create'])->name('laporan_proses_penjilidan.create');
    Route::get('/Mes/LaporanProsesPenjilidan/SaleOrder/detail/get', [LaporanProsesPenjilidanController::class, 'sale_order_detail'])->name('sale_order_penjilidan.detail.get');
    Route::post('/Mes/LaporanProsesPenjilidan/store', [LaporanProsesPenjilidanController::class, 'store'])->name('laporan_proses_penjilidan.store');
    Route::get('/Mes/LaporanProsesPenjilidan/view/{id}', [LaporanProsesPenjilidanController::class, 'view'])->name('laporan_proses_penjilidan.view');
    Route::get('/Mes/LaporanProsesPenjilidan/edit/{id}', [LaporanProsesPenjilidanController::class, 'edit'])->name('laporan_proses_penjilidan.edit');
    Route::post('/Mes/LaporanProsesPenjilidan/update/{id}', [LaporanProsesPenjilidanController::class, 'update'])->name('laporan_proses_penjilidan.update');
    Route::get('/Mes/LaporanProsesPenjilidan/verify/{id}', [LaporanProsesPenjilidanController::class, 'verify'])->name('laporan_proses_penjilidan.verify');
    Route::post('/Mes/LaporanProsesPenjilidan/approve/approve/{id}', [LaporanProsesPenjilidanController::class, 'approve_approve'])->name('laporan_proses_penjilidan.approve.approve');
    Route::post('/Mes/LaporanProsesPenjilidan/approve/decline/{id}', [LaporanProsesPenjilidanController::class, 'approve_decline'])->name('laporan_proses_penjilidan.approve.decline');
    Route::get('/Mes/LaporanProsesPenjilidan/delete/{id}', [LaporanProsesPenjilidanController::class, 'delete'])->name('laporan_proses_penjilidan.delete');

    // Laporan Proses Penjilidan Saddle
    Route::get('/Mes/LaporanProsesPenjilidanSaddle', [LaporanProsesPenjilidanSaddleController::class, 'index'])->name('laporan_proses_penjilidan_saddle');
    Route::get('/Mes/LaporanProsesPenjilidanSaddle/data', [LaporanProsesPenjilidanSaddleController::class, 'Data'])->name('laporan_proses_penjilidan_saddle.data');
    Route::get('/Mes/LaporanProsesPenjilidanSaddle/create', [LaporanProsesPenjilidanSaddleController::class, 'create'])->name('laporan_proses_penjilidan_saddle.create');
    Route::post('/Mes/LaporanProsesPenjilidanSaddle/store', [LaporanProsesPenjilidanSaddleController::class, 'store'])->name('laporan_proses_penjilidan_saddle.store');
    Route::get('/Mes/LaporanProsesPenjilidanSaddle/view/{id}', [LaporanProsesPenjilidanSaddleController::class, 'view'])->name('laporan_proses_penjilidan_saddle.view');
    Route::get('/Mes/LaporanProsesPenjilidanSaddle/edit/{id}', [LaporanProsesPenjilidanSaddleController::class, 'edit'])->name('laporan_proses_penjilidan_saddle.edit');
    Route::post('/Mes/LaporanProsesPenjilidanSaddle/update/{id}', [LaporanProsesPenjilidanSaddleController::class, 'update'])->name('laporan_proses_penjilidan_saddle.update');
    Route::get('/Mes/LaporanProsesPenjilidanSaddle/verify/{id}', [LaporanProsesPenjilidanSaddleController::class, 'verify'])->name('laporan_proses_penjilidan_saddle.verify');
    Route::post('/Mes/LaporanProsesPenjilidanSaddle/approve/approve/{id}', [LaporanProsesPenjilidanSaddleController::class, 'approve_approve'])->name('laporan_proses_penjilidan_saddle.approve.approve');
    Route::post('/Mes/LaporanProsesPenjilidanSaddle/approve/decline/{id}', [LaporanProsesPenjilidanSaddleController::class, 'approve_decline'])->name('laporan_proses_penjilidan_saddle.approve.decline');
    Route::get('/Mes/LaporanProsesPenjilidanSaddle/delete/{id}', [LaporanProsesPenjilidanSaddleController::class, 'delete'])->name('laporan_proses_penjilidan_saddle.delete');

    // Laporan Proses Three
    Route::get('/Mes/LaporanProsesThree', [LaporanProsesThreeController::class, 'index'])->name('laporan_proses_three');
    Route::get('/Mes/LaporanProsesThree/data', [LaporanProsesThreeController::class, 'Data'])->name('laporan_proses_three.data');
    Route::get('/Mes/LaporanProsesThree/create', [LaporanProsesThreeController::class, 'create'])->name('laporan_proses_three.create');
    Route::post('/Mes/LaporanProsesThree/store', [LaporanProsesThreeController::class, 'store'])->name('laporan_proses_three.store');
    Route::get('/Mes/LaporanProsesThree/view/{id}', [LaporanProsesThreeController::class, 'view'])->name('laporan_proses_three.view');
    Route::get('/Mes/LaporanProsesThree/edit/{id}', [LaporanProsesThreeController::class, 'edit'])->name('laporan_proses_three.edit');
    Route::post('/Mes/LaporanProsesThree/update/{id}', [LaporanProsesThreeController::class, 'update'])->name('laporan_proses_three.update');
    Route::get('/Mes/LaporanProsesThree/verify/{id}', [LaporanProsesThreeController::class, 'verify'])->name('laporan_proses_three.verify');
    Route::post('/Mes/LaporanProsesThree/approve/approve/{id}', [LaporanProsesThreeController::class, 'approve_approve'])->name('laporan_proses_three.approve.approve');
    Route::post('/Mes/LaporanProsesThree/approve/decline/{id}', [LaporanProsesThreeController::class, 'approve_decline'])->name('laporan_proses_three.approve.decline');
    Route::get('/Mes/LaporanProsesThree/delete/{id}', [LaporanProsesThreeController::class, 'delete'])->name('laporan_proses_three.delete');

    // Proses Pencetakan
    Route::get('/Mes/ProsesPencetakan', [ProsesPencetakanController::class, 'index'])->name('proses_pencetakan');
    Route::get('/Mes/ProsesPencetakan/data', [ProsesPencetakanController::class, 'Data'])->name('proses_pencetakan.data');
    Route::get('/Mes/ProsesPencetakan/create', [ProsesPencetakanController::class, 'create'])->name('proses_pencetakan.create');
    Route::post('/Mes/ProsesPencetakan/store', [ProsesPencetakanController::class, 'store'])->name('proses_pencetakan.store');
    Route::get('/Mes/ProsesPencetakan/view/{id}', [ProsesPencetakanController::class, 'view'])->name('proses_pencetakan.view');
    Route::get('/Mes/ProsesPencetakan/edit/{id}', [ProsesPencetakanController::class, 'edit'])->name('proses_pencetakan.edit');
    Route::post('/Mes/ProsesPencetakan/update/{id}', [ProsesPencetakanController::class, 'update'])->name('proses_pencetakan.update');
    Route::get('/Mes/ProsesPencetakan/verify/{id}', [ProsesPencetakanController::class, 'verify'])->name('proses_pencetakan.verify');
    Route::post('/Mes/ProsesPencetakan/approve/approve/{id}', [ProsesPencetakanController::class, 'approve_approve'])->name('proses_pencetakan.approve.approve');
    Route::post('/Mes/ProsesPencetakan/approve/decline/{id}', [ProsesPencetakanController::class, 'approve_decline'])->name('proses_pencetakan.approve.decline');
    Route::get('/Mes/ProsesPencetakan/delete/{id}', [ProsesPencetakanController::class, 'delete'])->name('proses_pencetakan.delete');

    // Laporan Pemeriksaan Kualiti
    Route::get('/Mes/LaporanPemeriksaanKualiti', [LaporanPemeriksaanKualitiController::class, 'index'])->name('laporan_pemeriksaan_kualiti');
    Route::get('/Mes/LaporanPemeriksaanKualiti/data', [LaporanPemeriksaanKualitiController::class, 'Data'])->name('laporan_pemeriksaan_kualiti.data');
    Route::get('/Mes/LaporanPemeriksaanKualiti/create', [LaporanPemeriksaanKualitiController::class, 'create'])->name('laporan_pemeriksaan_kualiti.create');
    Route::post('/Mes/LaporanPemeriksaanKualiti/store', [LaporanPemeriksaanKualitiController::class, 'store'])->name('laporan_pemeriksaan_kualiti.store');
    Route::get('/Mes/LaporanPemeriksaanKualiti/view/{id}', [LaporanPemeriksaanKualitiController::class, 'view'])->name('laporan_pemeriksaan_kualiti.view');
    Route::get('/Mes/LaporanPemeriksaanKualiti/edit/{id}', [LaporanPemeriksaanKualitiController::class, 'edit'])->name('laporan_pemeriksaan_kualiti.edit');
    Route::post('/Mes/LaporanPemeriksaanKualiti/update/{id}', [LaporanPemeriksaanKualitiController::class, 'update'])->name('laporan_pemeriksaan_kualiti.update');
    Route::get('/Mes/LaporanPemeriksaanKualiti/verify/{id}', [LaporanPemeriksaanKualitiController::class, 'verify'])->name('laporan_pemeriksaan_kualiti.verify');
    Route::post('/Mes/LaporanPemeriksaanKualiti/approve/approve/{id}', [LaporanPemeriksaanKualitiController::class, 'approve_approve'])->name('laporan_pemeriksaan_kualiti.approve.approve');
    Route::post('/Mes/LaporanPemeriksaanKualiti/approve/decline/{id}', [LaporanPemeriksaanKualitiController::class, 'approve_decline'])->name('laporan_pemeriksaan_kualiti.approve.decline');
    Route::get('/Mes/LaporanPemeriksaanKualiti/delete/{id}', [LaporanPemeriksaanKualitiController::class, 'delete'])->name('laporan_pemeriksaan_kualiti.delete');

    // Laporan Pemeriksaan Kualiti Penjilidan
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidan', [LaporanPemeriksaanKualitiPenjilidanController::class, 'index'])->name('laporan_pemeriksaan_kualiti_penjilidan');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidan/data', [LaporanPemeriksaanKualitiPenjilidanController::class, 'Data'])->name('laporan_pemeriksaan_kualiti_penjilidan.data');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidan/create', [LaporanPemeriksaanKualitiPenjilidanController::class, 'create'])->name('laporan_pemeriksaan_kualiti_penjilidan.create');
    Route::post('/Mes/LaporanPemeriksaanKualitiPenjilidan/store', [LaporanPemeriksaanKualitiPenjilidanController::class, 'store'])->name('laporan_pemeriksaan_kualiti_penjilidan.store');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidan/view/{id}', [LaporanPemeriksaanKualitiPenjilidanController::class, 'view'])->name('laporan_pemeriksaan_kualiti_penjilidan.view');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidan/edit/{id}', [LaporanPemeriksaanKualitiPenjilidanController::class, 'edit'])->name('laporan_pemeriksaan_kualiti_penjilidan.edit');
    Route::post('/Mes/LaporanPemeriksaanKualitiPenjilidan/update/{id}', [LaporanPemeriksaanKualitiPenjilidanController::class, 'update'])->name('laporan_pemeriksaan_kualiti_penjilidan.update');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidan/verify/{id}', [LaporanPemeriksaanKualitiPenjilidanController::class, 'verify'])->name('laporan_pemeriksaan_kualiti_penjilidan.verify');
    Route::post('/Mes/LaporanPemeriksaanKualitiPenjilidan/approve/approve/{id}', [LaporanPemeriksaanKualitiPenjilidanController::class, 'approve_approve'])->name('laporan_pemeriksaan_kualiti_penjilidan.approve.approve');
    Route::post('/Mes/LaporanPemeriksaanKualitiPenjilidan/approve/decline/{id}', [LaporanPemeriksaanKualitiPenjilidanController::class, 'approve_decline'])->name('laporan_pemeriksaan_kualiti_penjilidan.approve.decline');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidan/delete/{id}', [LaporanPemeriksaanKualitiPenjilidanController::class, 'delete'])->name('laporan_pemeriksaan_kualiti_penjilidan.delete');

    // Laporan Pemeriksaan Kualiti Penjilidan Saddle
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'index'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle/data', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'Data'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle.data');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle/create', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'create'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle.create');
    Route::post('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle/store', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'store'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle.store');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle/view/{id}', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'view'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle.view');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle/edit/{id}', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'edit'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle.edit');
    Route::post('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle/update/{id}', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'update'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle.update');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle/verify/{id}', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'verify'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle.verify');
    Route::post('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle/approve/approve/{id}', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'approve_approve'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle.approve.approve');
    Route::post('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle/approve/decline/{id}', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'approve_decline'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle.approve.decline');
    Route::get('/Mes/LaporanPemeriksaanKualitiPenjilidanSaddle/delete/{id}', [LaporanPemeriksaanKualitiPenjilidanSaddleController::class, 'delete'])->name('laporan_pemeriksaan_kualiti_penjilidan_saddle.delete');

    // Pengumpulan Gathering
    Route::get('/Mes/PengumpulanGathering', [PengumpulanGatheringController::class, 'index'])->name('pengumpulan_gathering');
    Route::get('/Mes/PengumpulanGathering/data', [PengumpulanGatheringController::class, 'Data'])->name('pengumpulan_gathering.data');
    Route::get('/Mes/PengumpulanGathering/create', [PengumpulanGatheringController::class, 'create'])->name('pengumpulan_gathering.create');
    Route::post('/Mes/PengumpulanGathering/store', [PengumpulanGatheringController::class, 'store'])->name('pengumpulan_gathering.store');
    Route::get('/Mes/PengumpulanGathering/view/{id}', [PengumpulanGatheringController::class, 'view'])->name('pengumpulan_gathering.view');
    Route::get('/Mes/PengumpulanGathering/edit/{id}', [PengumpulanGatheringController::class, 'edit'])->name('pengumpulan_gathering.edit');
    Route::post('/Mes/PengumpulanGathering/update/{id}', [PengumpulanGatheringController::class, 'update'])->name('pengumpulan_gathering.update');
    Route::get('/Mes/PengumpulanGathering/verify/{id}', [PengumpulanGatheringController::class, 'verify'])->name('pengumpulan_gathering.verify');
    Route::post('/Mes/PengumpulanGathering/approve/approve/{id}', [PengumpulanGatheringController::class, 'approve_approve'])->name('pengumpulan_gathering.approve.approve');
    Route::post('/Mes/PengumpulanGathering/approve/decline/{id}', [PengumpulanGatheringController::class, 'approve_decline'])->name('pengumpulan_gathering.approve.decline');
    Route::get('/Mes/PengumpulanGathering/delete/{id}', [PengumpulanGatheringController::class, 'delete'])->name('pengumpulan_gathering.delete');

    // Kulit Buku
    Route::get('/Mes/KulitBuku', [KulitBukuController::class, 'index'])->name('kulit_buku');
    Route::get('/Mes/KulitBuku/data', [KulitBukuController::class, 'Data'])->name('kulit_buku.data');
    Route::get('/Mes/KulitBuku/create', [KulitBukuController::class, 'create'])->name('kulit_buku.create');
    Route::post('/Mes/KulitBuku/store', [KulitBukuController::class, 'store'])->name('kulit_buku.store');
    Route::get('/Mes/KulitBuku/view/{id}', [KulitBukuController::class, 'view'])->name('kulit_buku.view');
    Route::get('/Mes/KulitBuku/edit/{id}', [KulitBukuController::class, 'edit'])->name('kulit_buku.edit');
    Route::post('/Mes/KulitBuku/update/{id}', [KulitBukuController::class, 'update'])->name('kulit_buku.update');
    Route::get('/Mes/KulitBuku/verify/{id}', [KulitBukuController::class, 'verify'])->name('kulit_buku.verify');
    Route::post('/Mes/KulitBuku/approve/approve/{id}', [KulitBukuController::class, 'approve_approve'])->name('kulit_buku.approve.approve');
    Route::post('/Mes/KulitBuku/approve/decline/{id}', [KulitBukuController::class, 'approve_decline'])->name('kulit_buku.approve.decline');
    Route::get('/Mes/KulitBuku/delete/{id}', [KulitBukuController::class, 'delete'])->name('kulit_buku.delete');

    // CTP
    Route::get('/Mes/Ctp', [CtpController::class, 'index'])->name('ctp');
    Route::get('/Mes/Ctp/data', [CtpController::class, 'Data'])->name('ctp.data');
    Route::get('/Mes/Ctp/create', [CtpController::class, 'create'])->name('ctp.create');
    Route::post('/Mes/Ctp/store', [CtpController::class, 'store'])->name('ctp.store');
    Route::get('/Mes/Ctp/view/{id}', [CtpController::class, 'view'])->name('ctp.view');
    Route::get('/Mes/Ctp/edit/{id}', [CtpController::class, 'edit'])->name('ctp.edit');
    Route::post('/Mes/Ctp/update/{id}', [CtpController::class, 'update'])->name('ctp.update');
    Route::get('/Mes/Ctp/verify/{id}', [CtpController::class, 'verify'])->name('ctp.verify');
    Route::post('/Mes/Ctp/approve/approve/{id}', [CtpController::class, 'approve_approve'])->name('ctp.approve.approve');
    Route::post('/Mes/Ctp/approve/decline/{id}', [CtpController::class, 'approve_decline'])->name('ctp.approve.decline');
    Route::get('/Mes/Ctp/delete/{id}', [CtpController::class, 'delete'])->name('ctp.delete');

    // POD
    Route::get('/Mes/Pod', [PodController::class, 'index'])->name('pod');
    Route::get('/Mes/Pod/data', [PodController::class, 'Data'])->name('pod.data');
    Route::get('/Mes/Pod/create', [PodController::class, 'create'])->name('pod.create');
    Route::post('/Mes/Pod/store', [PodController::class, 'store'])->name('pod.store');
    Route::get('/Mes/Pod/view/{id}', [PodController::class, 'view'])->name('pod.view');
    Route::get('/Mes/Pod/edit/{id}', [PodController::class, 'edit'])->name('pod.edit');
    Route::post('/Mes/Pod/update/{id}', [PodController::class, 'update'])->name('pod.update');
    Route::get('/Mes/Pod/verify/{id}', [PodController::class, 'verify'])->name('pod.verify');
    Route::post('/Mes/Pod/approve/approve/{id}', [PodController::class, 'approve_approve'])->name('pod.approve.approve');
    Route::post('/Mes/Pod/approve/decline/{id}', [PodController::class, 'approve_decline'])->name('pod.approve.decline');
    Route::get('/Mes/Pod/delete/{id}', [PodController::class, 'delete'])->name('pod.delete');

    // PlateCetak
    Route::get('/Mes/PlateCetak', [PlateCetakController::class, 'index'])->name('plate_cetak');
    Route::get('/Mes/PlateCetak/data', [PlateCetakController::class, 'Data'])->name('plate_cetak.data');
    Route::get('/Mes/PlateCetak/create', [PlateCetakController::class, 'create'])->name('plate_cetak.create');
    Route::post('/Mes/PlateCetak/store', [PlateCetakController::class, 'store'])->name('plate_cetak.store');
    Route::get('/Mes/PlateCetak/view/{id}', [PlateCetakController::class, 'view'])->name('plate_cetak.view');
    Route::get('/Mes/PlateCetak/edit/{id}', [PlateCetakController::class, 'edit'])->name('plate_cetak.edit');
    Route::post('/Mes/PlateCetak/update/{id}', [PlateCetakController::class, 'update'])->name('plate_cetak.update');
    Route::get('/Mes/PlateCetak/verify/{id}', [PlateCetakController::class, 'verify'])->name('plate_cetak.verify');
    Route::post('/Mes/PlateCetak/approve/approve/{id}', [PlateCetakController::class, 'approve_approve'])->name('plate_cetak.approve.approve');
    Route::post('/Mes/PlateCetak/approve/decline/{id}', [PlateCetakController::class, 'approve_decline'])->name('plate_cetak.approve.decline');
    Route::get('/Mes/PlateCetak/delete/{id}', [PlateCetakController::class, 'delete'])->name('plate_cetak.delete');

    // PlateCetak
    Route::get('/Mes/ProsesThreeKnife', [ProsesThreeKnifeController::class, 'index'])->name('proses_three_knife');
    Route::get('/Mes/ProsesThreeKnife/data', [ProsesThreeKnifeController::class, 'Data'])->name('proses_three_knife.data');
    Route::get('/Mes/ProsesThreeKnife/create', [ProsesThreeKnifeController::class, 'create'])->name('proses_three_knife.create');
    Route::post('/Mes/ProsesThreeKnife/store', [ProsesThreeKnifeController::class, 'store'])->name('proses_three_knife.store');
    Route::get('/Mes/ProsesThreeKnife/view/{id}', [ProsesThreeKnifeController::class, 'view'])->name('proses_three_knife.view');
    Route::get('/Mes/ProsesThreeKnife/edit/{id}', [ProsesThreeKnifeController::class, 'edit'])->name('proses_three_knife.edit');
    Route::post('/Mes/ProsesThreeKnife/update/{id}', [ProsesThreeKnifeController::class, 'update'])->name('proses_three_knife.update');
    Route::get('/Mes/ProsesThreeKnife/verify/{id}', [ProsesThreeKnifeController::class, 'verify'])->name('proses_three_knife.verify');
    Route::post('/Mes/ProsesThreeKnife/approve/approve/{id}', [ProsesThreeKnifeController::class, 'approve_approve'])->name('proses_three_knife.approve.approve');
    Route::post('/Mes/ProsesThreeKnife/approve/decline/{id}', [ProsesThreeKnifeController::class, 'approve_decline'])->name('proses_three_knife.approve.decline');
    Route::get('/Mes/ProsesThreeKnife/delete/{id}', [ProsesThreeKnifeController::class, 'delete'])->name('proses_three_knife.delete');

    // PlateCetak
    Route::get('/Mes/ProsesPembungkusan', [ProsesPembungkusanController::class, 'index'])->name('proses_pembungkusan');
    Route::get('/Mes/ProsesPembungkusan/data', [ProsesPembungkusanController::class, 'Data'])->name('proses_pembungkusan.data');
    Route::get('/Mes/ProsesPembungkusan/create', [ProsesPembungkusanController::class, 'create'])->name('proses_pembungkusan.create');
    Route::post('/Mes/ProsesPembungkusan/store', [ProsesPembungkusanController::class, 'store'])->name('proses_pembungkusan.store');
    Route::get('/Mes/ProsesPembungkusan/view/{id}', [ProsesPembungkusanController::class, 'view'])->name('proses_pembungkusan.view');
    Route::get('/Mes/ProsesPembungkusan/edit/{id}', [ProsesPembungkusanController::class, 'edit'])->name('proses_pembungkusan.edit');
    Route::post('/Mes/ProsesPembungkusan/update/{id}', [ProsesPembungkusanController::class, 'update'])->name('proses_pembungkusan.update');
    Route::get('/Mes/ProsesPembungkusan/verify/{id}', [ProsesPembungkusanController::class, 'verify'])->name('proses_pembungkusan.verify');
    Route::post('/Mes/ProsesPembungkusan/approve/approve/{id}', [ProsesPembungkusanController::class, 'approve_approve'])->name('proses_pembungkusan.approve.approve');
    Route::post('/Mes/ProsesPembungkusan/approve/decline/{id}', [ProsesPembungkusanController::class, 'approve_decline'])->name('proses_pembungkusan.approve.decline');
    Route::get('/Mes/ProsesPembungkusan/delete/{id}', [ProsesPembungkusanController::class, 'delete'])->name('proses_pembungkusan.delete');

    // END Mes //

    // START PRODUCTION

    // Digital Printing
    Route::get('/Production/DigitalPrinting', [DigitalPrintingController::class, 'index'])->name('digital_printing');
    Route::get('/Production/DigitalPrinting/data', [DigitalPrintingController::class, 'Data'])->name('digital_printing.data');
    Route::get('/Production/DigitalPrinting/create', [DigitalPrintingController::class, 'create'])->name('digital_printing.create');
    Route::post('/Production/DigitalPrinting/store', [DigitalPrintingController::class, 'store'])->name('digital_printing.store');
    Route::get('/Production/DigitalPrinting/view/{id}', [DigitalPrintingController::class, 'view'])->name('digital_printing.view');
    Route::get('/Production/DigitalPrinting/print/{id}', [DigitalPrintingController::class, 'print'])->name('digital_printing.print');
    Route::get('/Production/DigitalPrinting/edit/{id}', [DigitalPrintingController::class, 'edit'])->name('digital_printing.edit');
    Route::post('/Production/DigitalPrinting/update/{id}', [DigitalPrintingController::class, 'update'])->name('digital_printing.update');
    Route::get('/Production/DigitalPrinting/proses/{id}', [DigitalPrintingController::class, 'proses'])->name('digital_printing.proses');
    Route::post('/Production/DigitalPrinting/proses_update/{id}', [DigitalPrintingController::class, 'proses_update'])->name('digital_printing.proses.update');
    Route::post('/Production/DigitalPrinting/Machine/Starter', [DigitalPrintingController::class, 'machine_starter'])->name('digital_printing.machine.starter');
    Route::get('/Production/DigitalPrinting/verify/{id}', [DigitalPrintingController::class, 'verify'])->name('digital_printing.verify');
    Route::post('/Production/DigitalPrinting/approve/approve/{id}', [DigitalPrintingController::class, 'approve_approve'])->name('digital_printing.approve.approve');
    Route::post('/Production/DigitalPrinting/approve/decline/{id}', [DigitalPrintingController::class, 'approve_decline'])->name('digital_printing.approve.decline');
    Route::get('/Production/DigitalPrinting/delete/{id}', [DigitalPrintingController::class, 'delete'])->name('digital_printing.delete');

    // Cover_end_paper
    Route::get('/Production/CoverAndEndpaper', [Cover_endPaperController::class, 'index'])->name('cover_end_paper');
    Route::get('/Production/CoverAndEndpaper/data', [Cover_endPaperController::class, 'Data'])->name('cover_end_paper.data');
    Route::get('/Production/CoverAndEndpaper/create', [Cover_endPaperController::class, 'create'])->name('cover_end_paper.create');
    Route::post('/Production/CoverAndEndpaper/store', [Cover_endPaperController::class, 'store'])->name('cover_end_paper.store');
    Route::get('/Production/CoverAndEndpaper/view/{id}', [Cover_endPaperController::class, 'view'])->name('cover_end_paper.view');
    Route::get('/Production/CoverAndEndpaper/edit/{id}', [Cover_endPaperController::class, 'edit'])->name('cover_end_paper.edit');
    Route::post('/Production/CoverAndEndpaper/update/{id}', [Cover_endPaperController::class, 'update'])->name('cover_end_paper.update');
    Route::get('/Production/CoverAndEndpaper/print/{id}', [Cover_endPaperController::class, 'print'])->name('cover_end_paper.print');
    Route::get('/Production/CoverAndEndpaper/proses/{id}', [Cover_endPaperController::class, 'proses'])->name('cover_end_paper.proses');
    Route::post('/Production/CoverAndEndpaper/proses_update/{id}', [Cover_endPaperController::class, 'proses_update'])->name('cover_end_paper.proses.update');
    Route::post('/Production/CoverAndEndpaper/Machine/Starter', [Cover_endPaperController::class, 'machine_starter'])->name('cover_end_paper.machine.starter');
    Route::get('/Production/CoverAndEndpaper/verify/{id}', [Cover_endPaperController::class, 'verify'])->name('cover_end_paper.verify');
    Route::post('/Production/CoverAndEndpaper/approve/approve/{id}', [Cover_endPaperController::class, 'approve_approve'])->name('cover_end_paper.approve.approve');
    Route::post('/Production/CoverAndEndpaper/approve/decline/{id}', [Cover_endPaperController::class, 'approve_decline'])->name('cover_end_paper.approve.decline');
    Route::get('/Production/CoverAndEndpaper/delete/{id}', [Cover_endPaperController::class, 'delete'])->name('cover_end_paper.delete');

    // Text
    Route::get('/Production/Text', [TextController::class, 'index'])->name('text');
    Route::get('/Production/Text/data', [TextController::class, 'Data'])->name('text.data');
    Route::get('/Production/Text/create', [TextController::class, 'create'])->name('text.create');
    Route::post('/Production/Text/store', [TextController::class, 'store'])->name('text.store');
    Route::get('/Production/Text/edit/{id}', [TextController::class, 'edit'])->name('text.edit');
    Route::get('/Production/Text/view/{id}', [TextController::class, 'view'])->name('text.view');
    Route::get('/Production/Text/print/{id}', [TextController::class, 'print'])->name('text.print');
    Route::post('/Production/Text/update/{id}', [TextController::class, 'update'])->name('text.update');
    Route::get('/Production/Text/delete/{id}', [TextController::class, 'delete'])->name('text.delete');

    // ProductionJobSheet_MesinLipat

    // Mesin Lipat
    Route::get('/Production/MesinLipat', [ProductionJobSheet_MesinLipatController::class, 'index'])->name('mesin_lipat');
    Route::get('/Production/MesinLipat/data', [ProductionJobSheet_MesinLipatController::class, 'Data'])->name('mesin_lipat.data');
    Route::get('/Production/MesinLipat/create', [ProductionJobSheet_MesinLipatController::class, 'create'])->name('mesin_lipat.create');
    Route::post('/Production/MesinLipat/store', [ProductionJobSheet_MesinLipatController::class, 'store'])->name('mesin_lipat.store');
    Route::get('/Production/MesinLipat/view/{id}', [ProductionJobSheet_MesinLipatController::class, 'view'])->name('mesin_lipat.view');
    Route::get('/Production/MesinLipat/edit/{id}', [ProductionJobSheet_MesinLipatController::class, 'edit'])->name('mesin_lipat.edit');
    Route::post('/Production/MesinLipat/update/{id}', [ProductionJobSheet_MesinLipatController::class, 'update'])->name('mesin_lipat.update');
    Route::get('/Production/MesinLipat/print/{id}', [ProductionJobSheet_MesinLipatController::class, 'print'])->name('mesin_lipat.print');
    Route::get('/Production/MesinLipat/proses/{id}', [ProductionJobSheet_MesinLipatController::class, 'proses'])->name('mesin_lipat.proses');
    Route::post('/Production/MesinLipat/proses_update/{id}', [ProductionJobSheet_MesinLipatController::class, 'proses_update'])->name('mesin_lipat.proses.update');
    Route::post('/Production/MesinLipat/Machine/Starter', [ProductionJobSheet_MesinLipatController::class, 'machine_starter'])->name('mesin_lipat.machine.starter');
    Route::get('/Production/MesinLipat/verify/{id}', [ProductionJobSheet_MesinLipatController::class, 'verify'])->name('mesin_lipat.verify');
    Route::post('/Production/MesinLipat/approve/approve/{id}', [ProductionJobSheet_MesinLipatController::class, 'approve_approve'])->name('mesin_lipat.approve.approve');
    Route::post('/Production/MesinLipat/approve/decline/{id}', [ProductionJobSheet_MesinLipatController::class, 'approve_decline'])->name('mesin_lipat.approve.decline');
    Route::get('/Production/MesinLipat/delete/{id}', [ProductionJobSheet_MesinLipatController::class, 'delete'])->name('mesin_lipat.delete');

    // Staple Bind
    Route::get('/Production/StapleBind', [StapleBindController::class, 'index'])->name('staple_bind');
    Route::get('/Production/StapleBind/data', [StapleBindController::class, 'Data'])->name('staple_bind.data');
    Route::get('/Production/StapleBind/create', [StapleBindController::class, 'create'])->name('staple_bind.create');
    Route::post('/Production/StapleBind/store', [StapleBindController::class, 'store'])->name('staple_bind.store');
    Route::get('/Production/StapleBind/view/{id}', [StapleBindController::class, 'view'])->name('staple_bind.view');
    Route::get('/Production/StapleBind/edit/{id}', [StapleBindController::class, 'edit'])->name('staple_bind.edit');
    Route::post('/Production/StapleBind/update/{id}', [StapleBindController::class, 'update'])->name('staple_bind.update');
    Route::get('/Production/StapleBind/print/{id}', [StapleBindController::class, 'print'])->name('staple_bind.print');
    Route::get('/Production/StapleBind/proses/{id}', [StapleBindController::class, 'proses'])->name('staple_bind.proses');
    Route::post('/Production/StapleBind/proses_update/{id}', [StapleBindController::class, 'proses_update'])->name('staple_bind.proses.update');
    Route::post('/Production/StapleBind/Machine/Starter', [StapleBindController::class, 'machine_starter'])->name('staple_bind.machine.starter');
    Route::get('/Production/StapleBind/verify/{id}', [StapleBindController::class, 'verify'])->name('staple_bind.verify');
    Route::post('/Production/StapleBind/approve/approve/{id}', [StapleBindController::class, 'approve_approve'])->name('staple_bind.approve.approve');
    Route::post('/Production/StapleBind/approve/decline/{id}', [StapleBindController::class, 'approve_decline'])->name('staple_bind.approve.decline');
    Route::get('/Production/StapleBind/delete/{id}', [StapleBindController::class, 'delete'])->name('staple_bind.delete');

    // Perfect Bind
    Route::get('/Production/PerfectBind', [PerfectBindController::class, 'index'])->name('perfect_bind');
    Route::get('/Production/PerfectBind/data', [PerfectBindController::class, 'Data'])->name('perfect_bind.data');
    Route::get('/Production/PerfectBind/create', [PerfectBindController::class, 'create'])->name('perfect_bind.create');
    Route::post('/Production/PerfectBind/store', [PerfectBindController::class, 'store'])->name('perfect_bind.store');
    Route::get('/Production/PerfectBind/view/{id}', [PerfectBindController::class, 'view'])->name('perfect_bind.view');
    Route::get('/Production/PerfectBind/edit/{id}', [PerfectBindController::class, 'edit'])->name('perfect_bind.edit');
    Route::post('/Production/PerfectBind/update/{id}', [PerfectBindController::class, 'update'])->name('perfect_bind.update');
    Route::get('/Production/PerfectBind/print/{id}', [PerfectBindController::class, 'print'])->name('perfect_bind.print');
    Route::get('/Production/PerfectBind/proses/{id}', [PerfectBindController::class, 'proses'])->name('perfect_bind.proses');
    Route::post('/Production/PerfectBind/proses_update/{id}', [PerfectBindController::class, 'proses_update'])->name('perfect_bind.proses.update');
    Route::post('/Production/PerfectBind/Machine/Starter', [PerfectBindController::class, 'machine_starter'])->name('perfect_bind.machine.starter');
    Route::get('/Production/PerfectBind/verify/{id}', [PerfectBindController::class, 'verify'])->name('perfect_bind.verify');
    Route::post('/Production/PerfectBind/approve/approve/{id}', [PerfectBindController::class, 'approve_approve'])->name('perfect_bind.approve.approve');
    Route::post('/Production/PerfectBind/approve/decline/{id}', [PerfectBindController::class, 'approve_decline'])->name('perfect_bind.approve.decline');
    Route::get('/Production/PerfectBind/delete/{id}', [PerfectBindController::class, 'delete'])->name('perfect_bind.delete');

    // Mesin Knife
    Route::get('/Production/MesinKnife', [MesinKnifeController::class, 'index'])->name('mesin_knife');
    Route::get('/Production/MesinKnife/data', [MesinKnifeController::class, 'Data'])->name('mesin_knife.data');
    Route::get('/Production/MesinKnife/create', [MesinKnifeController::class, 'create'])->name('mesin_knife.create');
    Route::post('/Production/MesinKnife/store', [MesinKnifeController::class, 'store'])->name('mesin_knife.store');
    Route::get('/Production/MesinKnife/view/{id}', [MesinKnifeController::class, 'view'])->name('mesin_knife.view');
    Route::get('/Production/MesinKnife/edit/{id}', [MesinKnifeController::class, 'edit'])->name('mesin_knife.edit');
    Route::post('/Production/MesinKnife/update/{id}', [MesinKnifeController::class, 'update'])->name('mesin_knife.update');
    Route::get('/Production/MesinKnife/print/{id}', [MesinKnifeController::class, 'print'])->name('mesin_knife.print');
    Route::get('/Production/MesinKnife/proses/{id}', [MesinKnifeController::class, 'proses'])->name('mesin_knife.proses');
    Route::post('/Production/MesinKnife/proses_update/{id}', [MesinKnifeController::class, 'proses_update'])->name('mesin_knife.proses.update');
    Route::post('/Production/MesinKnife/Machine/Starter', [MesinKnifeController::class, 'machine_starter'])->name('mesin_knife.machine.starter');
    Route::get('/Production/MesinKnife/verify/{id}', [MesinKnifeController::class, 'verify'])->name('mesin_knife.verify');
    Route::post('/Production/MesinKnife/approve/approve/{id}', [MesinKnifeController::class, 'approve_approve'])->name('mesin_knife.approve.approve');
    Route::post('/Production/MesinKnife/approve/decline/{id}', [MesinKnifeController::class, 'approve_decline'])->name('mesin_knife.approve.decline');
    Route::get('/Production/MesinKnife/delete/{id}', [MesinKnifeController::class, 'delete'])->name('mesin_knife.delete');

    // BorangeSerahKerja
    Route::get('/Production/BorangeSerahKerja', [BorangeSerahKerjaController::class, 'index'])->name('borange_serah_kerja');
    Route::get('/Production/BorangeSerahKerja/data', [BorangeSerahKerjaController::class, 'Data'])->name('borange_serah_kerja.data');
    Route::get('/Production/BorangeSerahKerja/create', [BorangeSerahKerjaController::class, 'create'])->name('borange_serah_kerja.create');
    Route::post('/Production/BorangeSerahKerja/store', [BorangeSerahKerjaController::class, 'store'])->name('borange_serah_kerja.store');
    Route::get('/Production/BorangeSerahKerja/view/{id}', [BorangeSerahKerjaController::class, 'view'])->name('borange_serah_kerja.view');
    Route::get('/Production/BorangeSerahKerja/edit/{id}', [BorangeSerahKerjaController::class, 'edit'])->name('borange_serah_kerja.edit');
    Route::post('/Production/BorangeSerahKerja/update/{id}', [BorangeSerahKerjaController::class, 'update'])->name('borange_serah_kerja.update');
    Route::get('/Production/BorangeSerahKerja/purchasing/{id}', [BorangeSerahKerjaController::class, 'purchasing'])->name('borange_serah_kerja.purchasing');
    Route::post('/Production/BorangeSerahKerja/purchasing/approve/{id}', [BorangeSerahKerjaController::class, 'purchasing_approve'])->name('borange_serah_kerja.purchasing.approve');
    Route::get('/Production/BorangeSerahKerja/transfer/{id}', [BorangeSerahKerjaController::class, 'transfer'])->name('borange_serah_kerja.transfer');
    Route::post('/Production/BorangeSerahKerja/transfer/approve/{id}', [BorangeSerahKerjaController::class, 'transfer_approve'])->name('borange_serah_kerja.transfer.approve');
    Route::get('/Production/BorangeSerahKerja/receive/{id}', [BorangeSerahKerjaController::class, 'receive'])->name('borange_serah_kerja.receive');
    Route::post('/Production/BorangeSerahKerja/receive/approve/{id}', [BorangeSerahKerjaController::class, 'receive_approve'])->name('borange_serah_kerja.receive.approve');
    Route::get('/Production/BorangeSerahKerja/delete/{id}', [BorangeSerahKerjaController::class, 'delete'])->name('borange_serah_kerja.delete');


    //BorangeSerahKerja_Teks
    Route::get('/Production/BorangeSerahKerjaTeks', [BorangeSerahKerja_TeksController::class, 'index'])->name('borange_serah_kerja_teks');
    Route::get('/Production/BorangeSerahKerjaTeks/data', [BorangeSerahKerja_TeksController::class, 'Data'])->name('borange_serah_kerja_teks.data');
    Route::get('/Production/BorangeSerahKerjaTeks/create', [BorangeSerahKerja_TeksController::class, 'create'])->name('borange_serah_kerja_teks.create');
    Route::post('/Production/BorangeSerahKerjaTeks/store', [BorangeSerahKerja_TeksController::class, 'store'])->name('borange_serah_kerja_teks.store');
    Route::get('/Production/BorangeSerahKerjaTeks/view/{id}', [BorangeSerahKerja_TeksController::class, 'view'])->name('borange_serah_kerja_teks.view');
    Route::get('/Production/BorangeSerahKerjaTeks/edit/{id}', [BorangeSerahKerja_TeksController::class, 'edit'])->name('borange_serah_kerja_teks.edit');
    Route::post('/Production/BorangeSerahKerjaTeks/update/{id}', [BorangeSerahKerja_TeksController::class, 'update'])->name('borange_serah_kerja_teks.update');
    Route::get('/Production/BorangeSerahKerjaTeks/purchasing/{id}', [BorangeSerahKerja_TeksController::class, 'purchasing'])->name('borange_serah_kerja_teks.purchasing');
    Route::post('/Production/BorangeSerahKerjaTeks/purchasing/approve/{id}', [BorangeSerahKerja_TeksController::class, 'purchasing_approve'])->name('borange_serah_kerja_teks.purchasing.approve');
    Route::get('/Production/BorangeSerahKerjaTeks/transfer/{id}', [BorangeSerahKerja_TeksController::class, 'transfer'])->name('borange_serah_kerja_teks.transfer');
    Route::post('/Production/BorangeSerahKerjaTeks/transfer/approve/{id}', [BorangeSerahKerja_TeksController::class, 'transfer_approve'])->name('borange_serah_kerja_teks.transfer.approve');
    Route::get('/Production/BorangeSerahKerjaTeks/receive/{id}', [BorangeSerahKerja_TeksController::class, 'receive'])->name('borange_serah_kerja_teks.receive');
    Route::post('/Production/BorangeSerahKerjaTeks/receive/approve/{id}', [BorangeSerahKerja_TeksController::class, 'receive_approve'])->name('borange_serah_kerja_teks.receive.approve');
    Route::get('/Production/BorangeSerahKerjaTeks/delete/{id}', [BorangeSerahKerja_TeksController::class, 'delete'])->name('borange_serah_kerja_teks.delete');

    // Production Scheduling
    Route::get('/Production/ProductionScheduling', [ProductionSchedulingController::class, 'index'])->name('production_scheduling');
    Route::get('/Production/ProductionScheduling/records', [ProductionSchedulingController::class, 'records'])->name('production_scheduling.records');
    Route::get('/Production/ProductionScheduling/detail', [ProductionSchedulingController::class, 'detail'])->name('production_scheduling.detail');

    // Printing Process
    Route::get('/Production/PrintingProcess', [PrintingProcessController::class, 'index'])->name('printing_process');
    Route::get('/Production/PrintingProcess/data', [PrintingProcessController::class, 'Data'])->name('printing_process.data');
    Route::get('/Production/PrintingProcess/view/{id}', [PrintingProcessController::class, 'view'])->name('printing_process.view');
    Route::get('/Production/PrintingProcess/proses/{id}', [PrintingProcessController::class, 'proses'])->name('printing_process.proses');
    Route::post('/Production/PrintingProcess/proses_update/{id}', [PrintingProcessController::class, 'proses_update'])->name('printing_process.proses.update');
    Route::post('/Production/PrintingProcess/Machine/Starter', [PrintingProcessController::class, 'machine_starter'])->name('printing_process.machine.starter');
    Route::get('/Production/PrintingProcess/verify/{id}', [PrintingProcessController::class, 'verify'])->name('printing_process.verify');
    Route::post('/Production/PrintingProcess/approve/approve/{id}', [PrintingProcessController::class, 'approve_approve'])->name('printing_process.approve.approve');
    Route::post('/Production/PrintingProcess/approve/decline/{id}', [PrintingProcessController::class, 'approve_decline'])->name('printing_process.approve.decline');

    // CallForAssistance
    Route::get('/Production/CallForAssistance',[CallForAssistanceController::class, 'index'])->name('CallForAssistance');
    Route::get('/Production/CallForAssistance/edit',[CallForAssistanceController::class, 'edit'])->name('CallForAssistance.edit');
    Route::get('/Production/CallForAssistance/view',[CallForAssistanceController::class, 'view'])->name('CallForAssistance.view');

    // MachineDashboard
    Route::get('/Production/MachineDashboard',[MachineDashboardController::class, 'index'])->name('MachineDashboard');

    // ShoopFloor
    Route::get('/Production/ShoopFloor',[ShopFloorController::class, 'index'])->name('ShopFloor');


    // OEEDashboard
    Route::get('/Production/OEEDashboard',[OEEDashboardController::class, 'index'])->name('OEEDashboard');

    // ProductionReport
    Route::get('/Production/ProductionReport',[ProductionReportController::class, 'index'])->name('ProductionReport');

    // END PRODUCTION

    // START WMS

    //StockCard Report
    Route::get('/WMS/StockCard_report', [StockCard_ReportController::class, 'index'])->name('StockCard_report');
    Route::get('/WMS/StockCard_report/view', [StockCard_ReportController::class, 'view'])->name('StockCard_report.view');
    Route::get('/WMS/StockCard_report/Create', [StockCard_ReportController::class, 'Create'])->name('StockCard_report.create');

    //Invertory Report
    Route::get('/WMS/InvertoryReport', [InventoryReportController::class, 'index'])->name('inventory_report');
    Route::get('/WMS/InvertoryReport/generate', [InventoryReportController::class, 'generate'])->name('inventory_report.generate');

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
    Route::get('/WMS/GoodReceiving', [GoodReceivingController::class, 'index'])->name('good_receiving');
    Route::get('/WMS/GoodReceiving/data', [GoodReceivingController::class, 'Data'])->name('good_receiving.data');
    Route::get('/WMS/GoodReceiving/view/{id}', [GoodReceivingController::class, 'view'])->name('good_receiving.view');
    Route::get('/WMS/GoodReceiving/receive/{id}', [GoodReceivingController::class, 'receive'])->name('good_receiving.receive');
    Route::post('/WMS/GoodReceiving/receive/update/{id}', [GoodReceivingController::class, 'receive_update'])->name('good_receiving.receive.update');

    // Material Requesst
    Route::get('/WMS/material-request', [MaterialRequestController::class, 'index'])->name('material_request');
    Route::get('/WMS/material-request/data', [MaterialRequestController::class, 'Data'])->name('material_request.data');
    Route::get('/WMS/material-request/Create', [MaterialRequestController::class, 'create'])->name('material_request.create');
    Route::post('/WMS/material-request/store', [MaterialRequestController::class, 'store'])->name('material_request.store');
    Route::get('/WMS/material-request/edit/{id}', [MaterialRequestController::class, 'edit'])->name('material_request.edit');
    Route::get('/WMS/material-request/view/{id}', [MaterialRequestController::class, 'view'])->name('material_request.view');
    Route::post('/WMS/material-request/update/{id}', [MaterialRequestController::class, 'update'])->name('material_request.update');
    Route::get('/WMS/material-request/delete/{id}', [MaterialRequestController::class, 'delete'])->name('material_request.delete');

    // Manage Transfer
    Route::get('/WMS/manage-transfer', [ManageTransferController::class, 'index'])->name('manage_transfer');
    Route::get('/WMS/manage-transfer/data', [ManageTransferController::class, 'Data'])->name('manage_transfer.data');
    Route::get('/WMS/manage-transfer/Create', [ManageTransferController::class, 'create'])->name('manage_transfer.create');
    Route::get('/WMS/manage-transfer/Ref', [ManageTransferController::class, 'ref'])->name('ref.get');
    Route::get('/WMS/manage-transfer/AvailableQty', [ManageTransferController::class, 'available_qty'])->name('get.available_qty');
    Route::post('/WMS/manage-transfer/store', [ManageTransferController::class, 'store'])->name('manage_transfer.store');
    Route::get('/WMS/manage-transfer/edit/{id}', [ManageTransferController::class, 'edit'])->name('manage_transfer.edit');
    Route::get('/WMS/manage-transfer/view/{id}', [ManageTransferController::class, 'view'])->name('manage_transfer.view');
    Route::post('/WMS/manage-transfer/update/{id}', [ManageTransferController::class, 'update'])->name('manage_transfer.update');
    Route::get('/WMS/manage-transfer/delete/{id}', [ManageTransferController::class, 'delete'])->name('manage_transfer.delete');

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

    // END WMS
});
