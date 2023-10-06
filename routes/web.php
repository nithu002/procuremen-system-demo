<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Financial\DashboardController;
use App\Http\Controllers\Financial\ForgetPasswordController as FinancialForgetPasswordController;
use App\Http\Controllers\Financial\loginController as FinancialLoginController;
use App\Http\Controllers\MailConfigcontroller;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgrameLeadeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SupervoicerController;
use App\Http\Controllers\ForgetPasswordCOntroller;
use App\Http\Controllers\LockScreenController;
use App\Http\Controllers\Procurement\ForgetPasswordController as ProcurementForgetPasswordController;
use App\Http\Controllers\Procurement\loginController as ProcurementLoginController;
use App\Http\Controllers\Procurement\POController;
use App\Http\Controllers\Procurement\Profile;
use App\Http\Controllers\Procurement\QuotationController;
use App\Http\Controllers\Program\ForgetPasswordController as ProgramForgetPasswordController;
use App\Http\Controllers\Program\loginController as ProgramLoginController;
use App\Http\Controllers\Program\POFinal;
use App\Http\Controllers\Program\ProfileController as ProgramProfileController;
use App\Http\Controllers\Program\TimelineController;
use App\Http\Controllers\super\ForgetpasswordController as SuperForgetpasswordController;
use App\Http\Controllers\super\loginController;
use App\Http\Controllers\super\PRApprovelController;
use App\Http\Controllers\super\PRController;
use App\Http\Controllers\super\ProfileController as SuperProfileController;
use App\Http\Controllers\super\QAController;
use App\Http\Controllers\TimelineController as ControllersTimelineController;
use App\Http\Controllers\user\FormController;
use App\Models\finacial;
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
//USER FORM
Route::resource('/',FormController::class);
Route::get('get/{id}',[FormController::class,'getData']);
Route::post('requestForm',[FormController::class,'store']);
Route::resource('lockscreen',LockScreenController::class);
Route::post('admin/lockscreen',[LockScreenController::class,'show'])->middleware('loginAuth');

//ADMIN PANEL
Route::get('/admin',[AdminController::class,'index'])->middleware('dashboardAuth');
Route::get('/reg',[AdminController::class,'create'])->name('create');
Route::post('login',[AdminController::class,'store'])->middleware('dashboardAuth');
// Route::post('register',[AdminController::class,'register'])->name('register');
Route::get('/dashboard',[AdminController::class,'dashboard'])->middleware('loginAuth');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');
//Custom ForgetPassword route
Route::get('forget-password', [ForgetPasswordCOntroller::class, 'showForgetPasswordForm'])->middleware('dashboardAuth');
Route::post('forget-password', [ForgetPasswordCOntroller::class, 'submitForgetPasswordForm'])->middleware('dashboardAuth');
Route::get('reset-password/{token}', [ForgetPasswordCOntroller::class, 'showResetPasswordForm'])->middleware('dashboardAuth');
Route::post('reset-password', [ForgetPasswordCOntroller::class, 'submitResetPasswordForm'])->middleware('dashboardAuth');

Route::resource('staff',StaffController::class)->middleware('loginAuth');
Route::get('staff/super/{id}',[StaffController::class,'super'])->middleware('loginAuth');
Route::post('staff/delete',[StaffController::class,'destroy'])->middleware('loginAuth');
Route::get('filter',[StaffController::class,'filter'])->middleware('loginAuth');

Route::resource('timeline',ControllersTimelineController::class)->middleware('loginAuth');
Route::get('timeline/report/new/{id}',[ControllersTimelineController::class,'new'])->middleware('loginAuth');
Route::get('timeline/report/pr/{id}',[ControllersTimelineController::class,'pr'])->middleware('loginAuth');
Route::get('timeline/report/quotation/{id}',[ControllersTimelineController::class,'quotation'])->middleware('loginAuth');
Route::get('timeline/report/PO/{id}',[ControllersTimelineController::class,'PO'])->middleware('loginAuth');

Route::resource('visor',SupervoicerController::class)->middleware('loginAuth');
Route::post('visor/delete',[SupervoicerController::class,'destroy'])->name('delete')->middleware('loginAuth');
Route::get('visor/mail/{id}',[SupervoicerController::class,'sentmail'])->name('sentmail')->middleware('loginAuth');

Route::resource('procurement',ProcurementController::class)->middleware('loginAuth');
Route::post('procurement/delete',[ProcurementController::class,'destroy'])->name('delete')->middleware('loginAuth');
Route::get('procurement/mail/{id}',[ProcurementController::class,'sentmail'])->middleware('loginAuth');

Route::resource('programme',ProgrameLeadeController::class)->middleware('loginAuth');
Route::post('programme/delete',[ProgrameLeadeController::class,'destroy'])->name('delete')->middleware('loginAuth');
Route::get('programme/mail/{id}',[ProgrameLeadeController::class,'sentmail'])->middleware('loginAuth');
Route ::resource('email',MailConfigcontroller::class)->middleware('loginAuth');

Route::get('financialadd',[ProgrameLeadeController::class,'financialaddINDEX'])->middleware('loginAuth');
Route::post('financialadd/update/{id}',[ProgrameLeadeController::class,'financialadd'])->middleware('loginAuth');
Route::get('financialadd/mail/{id}',[ProgrameLeadeController::class,'financialmail'])->middleware('loginAuth');

Route::resource('profile',ProfileController::class)->middleware('loginAuth');
Route::post('/profile/update',[ProfileController::class,'update'])->middleware('loginAuth');
Route::post('/profile/update/any',[ProfileController::class,'any'])->middleware('loginAuth');
Route::post('/profile/password',[ProfileController::class,'password'])->middleware('loginAuth');
Route::post('/profile/delete',[ProfileController::class,'destroy'])->middleware('loginAuth');
Route::post('/profile/img',[ProfileController::class,'img'])->middleware('loginAuth');
Route::post('/profile/about',[ProfileController::class,'about'])->middleware('loginAuth');


//SUPERVISOR PANEL
Route::get('/supervisor',[loginController::class,'index'])->middleware('Superlogin');
Route::post('viocer/login',[loginController::class,'store'])->middleware('Superlogin');

Route::get('/viocerlock',[loginController::class,'index'])->middleware('Superlogin');
Route::get('voiser/lock',[loginController::class,'lock'])->middleware('Superdashboard');
Route::post('voiser/lockscreen',[loginController::class,'lockscreen'])->middleware('Superdashboard');

Route::get('viocer/dashboard',[loginController::class,'dashboard'])->middleware('Superdashboard');
Route::get('viocer/logout',[loginController::class,'logout'])->name('logout');

Route::get('viocer/forget-password', [SuperForgetpasswordController::class, 'showForgetPasswordForm'])->middleware('Superlogin');
Route::post('viocer/forget-password', [SuperForgetpasswordController::class, 'submitForgetPasswordForm'])->middleware('Superlogin');
Route::get('viocer/reset-password/{token}', [SuperForgetpasswordController::class, 'showResetPasswordForm'])->middleware('Superlogin');
Route::post('viocer/reset-password', [SuperForgetpasswordController::class, 'submitResetPasswordForm'])->middleware('Superlogin');

Route::resource('viocer/request',PRApprovelController::class)->middleware('Superdashboard');
Route::get('viocer/details/{id}',[PRApprovelController::class,'viewDetails'])->middleware('Superdashboard');
Route::get('viocer/details/download1/{id}',[PRApprovelController::class,'downloadTOR'])->middleware('Superdashboard');
Route::get('viocer/details/download2/{id}',[PRApprovelController::class,'downloadCN'])->middleware('Superdashboard');
Route::get('viocer/details/filder/{id}',[PRApprovelController::class,'filder'])->middleware('Superdashboard');
Route::post('viocer/details/update',[PRApprovelController::class,'update'])->middleware('Superdashboard');
Route::post('viocer/details/report/update',[PRApprovelController::class,'report'])->middleware('Superdashboard');

Route::resource('viocer/quotation',QAController::class)->middleware('Superdashboard');
Route::get('viocer/new/quotation/{id}',[QAController::class,'viewDetails'])->middleware('Superdashboard');
Route::get('viocer/quotation/download1/{id}',[QAController::class,'downloadTOR'])->middleware('Superdashboard');
Route::get('viocer/quotation/download2/{id}',[QAController::class,'downloadCN'])->middleware('Superdashboard');
Route::get('viocer/quotation/download3/{id}',[QAController::class,'download3'])->middleware('Superdashboard');
Route::get('viocer/quotation/download4/{id}',[QAController::class,'download4'])->middleware('Superdashboard');
Route::get('viocer/quotation/download5/{id}',[QAController::class,'download5'])->middleware('Superdashboard');
Route::get('viocer/quotation/download6/{id}',[QAController::class,'download6'])->middleware('Superdashboard');
Route::get('viocer/quotation/filder/{id}',[QAController::class,'filder'])->middleware('Superdashboard');
Route::post('viocer/quotation/update',[QAController::class,'update'])->middleware('Superdashboard');

Route::resource('viocer/all',PRController::class)->middleware('Superdashboard');
Route::get('viocer/all/details/{id}',[PRController::class,'viewDetails'])->middleware('Superdashboard');
Route::get('viocer/all/details/download1/{id}',[PRController::class,'downloadTOR'])->middleware('Superdashboard');
Route::get('viocer/all/details/download2/{id}',[PRController::class,'downloadCN'])->middleware('Superdashboard');
Route::get('viocer/all/details/download3/{id}',[QAController::class,'download3'])->middleware('Superdashboard');
Route::get('viocer/all/details/download4/{id}',[QAController::class,'download4'])->middleware('Superdashboard');
Route::get('viocer/all/details/download5/{id}',[QAController::class,'download5'])->middleware('Superdashboard');
Route::get('viocer/all/details/download6/{id}',[QAController::class,'download6'])->middleware('Superdashboard');
Route::get('viocer/all/details/download7/{id}',[QAController::class,'download7'])->middleware('Superdashboard');
Route::get('viocer/all/details/filder/{id}',[PRController::class,'filder'])->middleware('Superdashboard');
Route::post('viocer/all/details/update',[PRController::class,'update'])->middleware('Superdashboard');
Route::get('viocer/filter',[PRController::class,'filderID'])->middleware('Superdashboard');

Route::resource('viocer/profile',SuperProfileController::class)->middleware('Superdashboard');
Route::post('viocer/profile/update',[SuperProfileController::class,'update'])->middleware('Superdashboard');
Route::post('viocer/profile/update/any',[SuperProfileController::class,'any'])->middleware('Superdashboard');
Route::post('viocer/profile/password',[SuperProfileController::class,'password'])->middleware('Superdashboard');
Route::post('viocer/profile/delete',[SuperProfileController::class,'destroy'])->middleware('Superdashboard');
Route::post('viocer/profile/img',[SuperProfileController::class,'img'])->middleware('Superdashboard');
Route::post('viocer/profile/about',[SuperProfileController::class,'about'])->middleware('Superdashboard');




//OPERATION LEAD PANEL
Route::get('/lead',[ProgramLoginController::class,'index'])->middleware('Programlogin');
Route::post('program/login',[ProgramLoginController::class,'store'])->middleware('Programlogin');
Route::get('program/dashboard',[ProgramLoginController::class,'dashboard'])->middleware('Programdashboard');
Route::get('program/logout',[ProgramLoginController::class,'logout'])->name('logout');

Route::get('/programlock',[ProgramLoginController::class,'index']);
Route::get('program/lock',[ProgramLoginController::class,'lock'])->middleware('Programdashboard');
Route::post('program/lockscreen',[ProgramLoginController::class,'lockscreen'])->middleware('Programdashboard');

Route::get('program/forget-password', [ProgramForgetPasswordController::class, 'showForgetPasswordForm'])->middleware('Programlogin');
Route::post('program/forget-password', [ProgramForgetPasswordController::class, 'submitForgetPasswordForm'])->middleware('Programlogin');
Route::get('program/reset-password/{token}', [ProgramForgetPasswordController::class, 'showResetPasswordForm'])->middleware('Programlogin');
Route::post('program/reset-password', [ProgramForgetPasswordController::class, 'submitResetPasswordForm'])->middleware('Programlogin');

Route::resource('program/final',POFinal::class)->middleware('Programdashboard');
Route::get('program/final/filder/{id}',[POFinal::class,'file'])->middleware('Programdashboard');
Route::post('program/final/update',[POFinal::class,'update'])->middleware('Programdashboard');

Route::resource('program/report',TimelineController::class)->middleware('Programdashboard');
Route::get('program/report/new/{id}',[TimelineController::class,'new'])->middleware('Programdashboard');
Route::get('program/report/pr/{id}',[TimelineController::class,'pr'])->middleware('Programdashboard');
Route::get('program/report/quotation/{id}',[TimelineController::class,'quotation'])->middleware('Programdashboard');
Route::get('program/report/PO/{id}',[TimelineController::class,'PO'])->middleware('Programdashboard');

Route::resource('program/profile',ProgramProfileController::class)->middleware('Programdashboard');
Route::post('program/profile/update',[ProgramProfileController::class,'update'])->middleware('Programdashboard');
Route::post('program/profile/update/any',[ProgramProfileController::class,'any'])->middleware('Programdashboard');
Route::post('program/profile/password',[ProgramProfileController::class,'password'])->middleware('Programdashboard');
Route::post('program/profile/delete',[ProgramProfileController::class,'destroy'])->middleware('Programdashboard');
Route::post('program/profile/img',[ProgramProfileController::class,'img'])->middleware('Programdashboard');
Route::post('program/profile/about',[ProgramProfileController::class,'about'])->middleware('Programdashboard');




// PROCURMER
Route::get('/procurementPanel',[ProcurementLoginController::class,'index'])->middleware('Procurementlogin');
Route::post('procurementPanel/login',[ProcurementLoginController::class,'store'])->middleware('Procurementlogin');
Route::get('procurementPanel/dashboard',[ProcurementLoginController::class,'dashboard'])->middleware('Procurementdashboard');
Route::get('procurementPanel/logout',[ProcurementLoginController::class,'logout'])->name('logout');

Route::get('/procurementPanellock',[ProcurementLoginController::class,'index']);
Route::get('procurementPanel/lock',[ProcurementLoginController::class,'lock'])->middleware('Procurementdashboard');
Route::post('procurementPanel/lockscreen',[ProcurementLoginController::class,'lockscreen'])->middleware('Procurementdashboard');

Route::get('procurementPanel/forget-password', [ProcurementForgetPasswordController::class, 'showForgetPasswordForm'])->middleware('Procurementlogin');
Route::post('procurementPanel/forget-password', [ProcurementForgetPasswordController::class, 'submitForgetPasswordForm'])->middleware('Procurementlogin');
Route::get('procurementPanel/reset-password/{token}', [ProcurementForgetPasswordController::class, 'showResetPasswordForm'])->middleware('Procurementlogin');
Route::post('procurementPanel/reset-password', [ProcurementForgetPasswordController::class, 'submitResetPasswordForm'])->middleware('Procurementlogin');

Route::resource('procurementPanel/quotation',QuotationController::class)->middleware('Procurementdashboard');
// Route::get('procurementPanel/quotation/details/download1/{id}',[QuotationController::class,'downloadTOR']);
// Route::get('procurementPanel/quotation/details/download2/{id}',[QuotationController::class,'downloadCN']);
// Route::get('procurementPanel/quotation/details/filder/{id}',[QuotationController::class,'filder']);
Route::post('procurementPanel/quotation/details/update',[QuotationController::class,'update'])->middleware('Procurementdashboard');

Route::resource('procurementPanel/create',POController::class)->middleware('Procurementdashboard');
Route::post('procurementPanel/insert',[POController::class,'update'])->middleware('Procurementdashboard');
Route::post('procurementPanel/insert/update',[POController::class,'updateall'])->middleware('Procurementdashboard');
Route::get('procurementPanel/details/{id}',[POController::class,'details'])->middleware('Procurementdashboard');

Route::resource('procurementPanel/profile',Profile::class)->middleware('Procurementdashboard');
Route::post('procurementPanel/profile/update',[Profile::class,'update'])->middleware('Procurementdashboard');
Route::post('procurementPanel/profile/update/any',[Profile::class,'any'])->middleware('Procurementdashboard');
Route::post('procurementPanel/profile/password',[Profile::class,'password'])->middleware('Procurementdashboard');
Route::post('procurementPanel/profile/delete',[Profile::class,'destroy'])->middleware('Procurementdashboard');
Route::post('procurementPanel/profile/img',[Profile::class,'img'])->middleware('Procurementdashboard');
Route::post('procurementPanel/profile/about',[Profile::class,'about'])->middleware('Procurementdashboard');




Route::get('/financial',[FinancialLoginController::class,'index'])->middleware('Financiallogin');
Route::post('financial/login',[FinancialLoginController::class,'store'])->middleware('Financiallogin');
Route::get('financial/dashboard',[FinancialLoginController::class,'dashboard'])->middleware('Financialdashboard');
Route::get('financial/logout',[FinancialLoginController::class,'logout'])->name('logout');

Route::get('/financiallock',[FinancialLoginController::class,'index']);
Route::get('financial/lock',[FinancialLoginController::class,'lock'])->middleware('Financialdashboard');
Route::post('financial/lockscreen',[FinancialLoginController::class,'lockscreen'])->middleware('Financialdashboard');

Route::get('financial/forget-password', [FinancialForgetPasswordController::class, 'showForgetPasswordForm'])->middleware('Financialdashboard');
Route::post('financial/forget-password', [FinancialForgetPasswordController::class, 'submitForgetPasswordForm'])->middleware('Financialdashboard');
Route::get('financial/reset-password/{token}', [FinancialForgetPasswordController::class, 'showResetPasswordForm'])->middleware('Financialdashboard');
Route::post('financial/reset-password', [FinancialForgetPasswordController::class, 'submitResetPasswordForm'])->middleware('Financialdashboard');

Route::get('financial/request',[DashboardController::class,'index'])->middleware('Financialdashboard');
Route::get('financial/view/{id}',[DashboardController::class,'view'])->middleware('Financialdashboard');

Route::get('financial/profile',[DashboardController::class,'profile'])->middleware('Financialdashboard');
Route::post('financial/profile/update',[DashboardController::class,'update'])->middleware('Financialdashboard');
Route::post('financial/profile/update/any',[DashboardController::class,'any'])->middleware('Financialdashboard');
Route::post('financial/profile/password',[DashboardController::class,'password'])->middleware('Financialdashboard');
Route::post('financial/profile/delete',[DashboardController::class,'destroy'])->middleware('Financialdashboard');
Route::post('financial/profile/img',[DashboardController::class,'img'])->middleware('Financialdashboard');
Route::post('financial/profile/about',[DashboardController::class,'about'])->middleware('Financialdashboard');