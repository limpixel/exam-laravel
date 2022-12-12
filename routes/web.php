<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PortfolioController;

use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\AboutController as BackendAboutController;
use App\Http\Controllers\Backend\CVController as BackendCVController;
use App\Http\Controllers\Backend\ContactController as BackendContactController;
use App\Http\Controllers\Backend\PortfolioController as BackendPortfolioController;
use App\Http\Controllers\Backend\ProfileController as BackendProfileController;

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

Route::get('/', [HomeController::class, 'index'])->name('frontend.home.index');
Route::get('my/portfolio', [PortfolioController::class, 'index'])->name('frontend.portfolio.index');
Route::get('/about', [AboutController::class, 'index'])->name('frontend.about.index');
Route::get('/about/download/cv', [AboutController::class, 'download_cv'])->name('frontend.about.download.my.cv');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact.index');
Route::post('/contact/process', [ContactController::class, 'process'])->name('frontend.contact.process');

Route::get('/backend/manage/home', [BackendHomeController::class, 'index'])->name('backend.manage.home');

Route::get('/backend/manage/portfolio', [BackendPortfolioController::class, 'index'])->name('backend.manage.portfolio');
Route::get('/backend/manage/portfolio', [BackendPortfolioController::class, 'index'])->name('backend.manage.portfolio');
Route::get('/backend/create/portfolio', [BackendPortfolioController::class, 'create'])->name('backend.create.portfolio');
Route::post('/backend/create/process/portfolio', [BackendPortfolioController::class, 'create_process'])->name('backend.create.process.portfolio');
Route::get('/backend/show/portfolio/{portfolio}', [BackendPortfolioController::class, 'show'])->name('backend.show.portfolio');
Route::get('/backend/edit/portfolio/{portfolio}', [BackendPortfolioController::class, 'edit'])->name('backend.edit.portfolio');
Route::post('/backend/edit/process/{portfolio}', [BackendPortfolioController::class, 'edit_process'])->name('backend.edit.process.portfolio');
Route::delete('/backend/delete/{portfolio}', [BackendPortfolioController::class, 'destroy'])->name('backend.delete.portfolio');

Route::get('/backend/manage/about', [BackendAboutController::class, 'index'])->name('backend.manage.about')->middleware('is_admin');
Route::post('/backend/manage/about/process', [BackendAboutController::class, 'process'])->name('backend.manage.about.process')->middleware('is_admin');

Route::get('/backend/manage/cv', [BackendCVController::class, 'index'])->name('backend.manage.cv')->middleware('is_admin');
Route::post('/backend/manage/cv/process', [BackendCVController::class, 'process'])->name('backend.manage.cv.process')->middleware('is_admin');

Route::get('/backend/manage/contact', [BackendContactController::class, 'index'])->name('backend.manage.contact')->middleware('is_admin');

Route::get('/backend/manage/footer', [BackendContactController::class, 'index'])->name('backend.manage.footer');
Route::get('/backend/edit/footer/{id?}', [BackendContactController::class, 'edit'])->name('backend.edit.footer');
Route::post('/backend/edit/process/footer/', [BackendContactController::class, 'edit'])->name('backend.edit.process.footer');

Route::get('/backend/profile/index', [BackendProfileController::class, 'index'])->name('backend.profile.index');
Route::post('/backend/process/profile/', [BackendProfileController::class, 'profile_process'])->name('backend.profile.process');

Route::get('/error-access-admin', function (){
    return view('error-access-admin');
})->name('error.admin.access');

Auth::routes([
    'register' => false,
    'reset' => false,
    'false' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
