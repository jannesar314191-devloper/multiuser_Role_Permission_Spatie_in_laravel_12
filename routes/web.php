<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified','role:admin'])->name('admin.index');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
});

Route::middleware('auth','role:admin')->group(function(){

    Route::get('roleList',[RoleController::class,'roleList'])->name('roleList');
    Route::get('createRole',[RoleController::class,'createRole'])->name('createRole');
    Route::post('storeRole',[RoleController::class,'storeRole'])->name('storeRole');
    Route::get('roleEdit/{id}',[RoleController::class,'roleEdit'])->name('roleEdit');
    Route::Put('roleEdit/{id}',[RoleController::class,'roleUpdate'])->name('roleUpdate');
    Route::get('roleDelete,{id}',[RoleController::class,'roleDelete'])->name('roleDelete');    
});


Route::middleware('auth','role:admin')->group(function(){

    Route::get('permissionList',[PermissionController::class,'permissionList'])->name('permissionList');
    Route::get('createpermission',[PermissionController::class,'createpermission'])->name('createpermission');
    Route::post('storepermission',[PermissionController::class,'storepermission'])->name('storepermission');
    Route::get('permissionEdit/{id}',[PermissionController::class,'permissionEdit'])->name('permissionEdit');
    Route::Put('permissionUpadte/{id}',[PermissionController::class,'permissionUpdate'])->name('permissionUpdate');
    Route::get('permissionDelete,{id}',[PermissionController::class,'permissionDelete'])->name('permissionDelete');    
});


Route::middleware('auth','role:admin')->group(function(){

    Route::get('userList',[UserController::class,'userList'])->name('userList');
    Route::get('createuser',[UserController::class,'createuser'])->name('createuser');
    Route::post('storeuser',[UserController::class,'storeuser'])->name('storeuser');
    Route::get('userEdit/{id}',[UserController::class,'userEdit'])->name('userEdit');
    Route::Put('userUpate/{id}',[UserController::class,'userUpdate'])->name('userUpdate');
    Route::get('permissionDelete,{id}',[UserController::class,'userDelete'])->name('userDelete');   
    
    //set role for user
    Route::get('usersetrole/{id}',[UserController::class,'usersetrole'])->name('usersetrole');  
    Route::post('storeusersetrole/{id}',[UserController::class,'storeusersetrole'])->name('storeusersetrole');
    
    //usersetpermission
    Route::get('usersetpermission/{id}',[UserController::class,'usersetpermission'])->name('usersetpermission');
    Route::post('storeusersetpermission/{id}',[UserController::class,'storeusersetpermission'])->name('storeusersetpermission'); 
});



require __DIR__.'/auth.php';
