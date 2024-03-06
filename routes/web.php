<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\MappingController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DrawnItemController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\information;
use App\Http\Controllers\cornController;
use \Http\Controllers\Auth\AuthenticatedSessionController;
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
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/home',[homeController::class,'indexHome'])->middleware('auth')->name('home');
Route::get('/insurance', [homeController::class, 'print'])->name('print');
// routes/web.php
Route::post('/update-mark/{id}', [HarvestController::class,'updateMark']);

route::get('post',[homecontroller::class,'post'])->middleware(['auth','admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

    Route::get('/mapping', [MarkerController::class, 'index2']);
    // Route to display the registration form
    Route::get('/registration', [RegistrationController::class, 'create'])->name('registration.create');
    // Route to handle the registration form submission
    Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
    
    // Route to display the mapping page
    Route::get('/mapping', [MappingController::class, 'index'])->name('mapping.index');
    
    Route::get('/searchUsers',  [MarkerController::class, 'searchUsers'])->name('searchUsers');
    
    
    Route::get('/profiles', [homeController::class, 'index']); 
    
    Route::get('/markers', [MarkerController::class, 'index'])->name('markers.index');
    Route::get('/home', [MarkerController::class, 'showMapInfo'])->name('mapInfoMarker'); 
    Route::get('/view',  [AccountController::class,'view'])->name('view');
    // web.php or api.php
    
    Route::get('/accounts', [AccountController::class,'index3']);
    Route::post('/save-drawn-item', [DrawnItemController::class,'save'])->name('save.drawn.item');
    
    Route::get('/users', [UserController::class,'userIndex'])->middleware(['auth','admin']);
    Route::get('deleteUser/{id}', [AdminController::class,'destroy']);
   
    Route::get('/profile/{data}',  [UserController::class,'account'])->name('account');
    Route::get('RSBSA/{id}', [RegistrationController::class,'RSBSA']);
    Route::get('DeleteFarmer/{id}', [AccountController::class,'deleteFarmer']);
    Route::get('DeleteRice/{id}', [HarvestController::class,'destroy']);
    Route::get('/rice', [HarvestController::class,'harvestIndex'])->name('rice');
    Route::get('/corn', [HarvestController::class,'cornIndex'])->name('corn');
    Route::post('/cornharvest', [HarvestController::class,'cornstore'])->name('corn');
    Route::get('/coconut', [HarvestController::class,'coconutIndex'])->name('coconut');
    Route::post('/coconut', [HarvestController::class,'coconutstore'])->name('coconutharvest');
    Route::get('/info', [MarkerController::class,'showMapInfo'])->name('mapInfo');
    Route::get('/harvests', [HarvestController::class, 'create'])->name('harvests.create');
    Route::post('/harvests', [HarvestController::class, 'store'])->name('harvests.store');
    
    Route::post('/save-position',  [UserController::class,'store'])->name('store');
    
    Route::get('/insurance', [AccountController::class,'insurance']);
    
    Route::get('/edit-farmer/{id}', [AccountController::class,'editfarmer']);
    Route::post('/update-registration', [AccountController::class,'updatefarmer']);
    
    Route::get('DeleteCorn/{id}', [HarvestController::class,'deleteCorn']);
    Route::get('DeleteCoconut/{id}', [HarvestController::class,'deleteCoconut']);
    Route::get('edit-Rice/{id}', [HarvestController::class,'editRice']);
    Route::get('edit-corn/{id}', [HarvestController::class,'editCorn']);
    Route::get('edit-coconut/{id}', [HarvestController::class,'editCoconut']);
    Route::post('/updateCoconut', [HarvestController::class,'updateCoconut']);
    Route::post('/updateCorn', [HarvestController::class,'updateCorn']);
    Route::post('/updateRice', [HarvestController::class,'updateRice']);
    
    Route::get('/specific-content', [AccountController::class,'getSpecificContent']);

    Route::get('/Registrations', [AdminController::class, 'showForm'])->middleware(['auth','admin']);
Route::post('/post-registration', [AdminController::class, 'postRegistration'])->name('post-registration')->middleware(['auth','admin']);

 Route::get('/log-in',function(){
    return view('auth.log-in');
 });




Route::post('/save-polygon', [DrawnItemController::class, 'savePolygon']);

Route::get('/get-polygon/{id}', [DrawnItemController::class, 'getPolygon']);
