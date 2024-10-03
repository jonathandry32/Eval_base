<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RoleController;
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



Route::middleware('guest')->group(function () {
    Route::get('/', [UserController::class, 'login'])->name('login');
    Route::get('/register', [UserController::class, 'register'])->name('registration');
    Route::post('/register', [UserController::class, 'handleRegistration'])->name('registration');
    Route::post('/login', [UserController::class, 'handleLogin'])->name('login');
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('rolesPermissions')->group(function () {
        Route::get('/newRole', [RoleController::class, 'newRole'])->name('role.new');
        Route::post('/createRole', [RoleController::class, 'create_role'])->name('role.create');
        Route::get('/listRoles', [RoleController::class, 'getUserRoles'])->name('role.list');
        Route::get('/roleLists', [RoleController::class, 'roleLists'])->name('role.roleLists');
        Route::get('/roleUsers', [RoleController::class, 'roleUsers'])->name('role.roleUsers');
        Route::get('/userRoles/{idUser}', [RoleController::class, 'userRoles'])->name('role.userRoles');
        Route::get('/rolePermissions/{idRole}',[RoleController::class,'rolePermissions'])->name('role.rolePermissions');
        Route::get('/attributPermissionToRole', [RoleController::class, 'attributPermissionToRole'])->name('role.attributPermissionToRole');
        Route::get('/attributRoleUser', [RoleController::class, 'attributRoleUser'])->name('role.attributRoleUser');     
        Route::post('/createPermission', [RoleController::class, 'create_permission'])->name('permission.create');
        Route::post('/attachPermissionToRole', [RoleController::class, 'attach_permission_to_role'])->name('permission.givePermissionToRole');
        Route::post('/attributeRoleToUser', [RoleController::class, 'attribute_role_to_user'])->name('permission.attributeRoleToUser');
        Route::delete('/delete',[RoleController::class,'supprimerPermission'])->name('role.supprimerPermission');
        Route::delete('/deleteRole',[RoleController::class,'supprimerRole'])->name('role.supprimerRole');
    });

    Route::prefix('services')->group(function() {
        Route::get('/liste',[ServiceController::class,'liste'])->name('services.liste');
        Route::get('/insert',[ServiceController::class,'nouveau'])->name('services.nouveau');
        Route::post('/insert',[ServiceController::class,'ajouter'])->name('services.ajouter');
        Route::post('/csv',[ServiceController::class,'csv'])->name('services.csv');
        Route::post('/servicecsvimport',[ServiceController::class,'servicecsvimport'])->name('services.servicecsvimport');
        Route::post('/exportcsv',[ServiceController::class,'exportcsv'])->name('services.exportcsv');
        Route::post('/servicesexport',[ServiceController::class,'servicesexport'])->name('services.servicesexport');
        Route::post('/image',[ServiceController::class,'image'])->name('services.image');
        Route::get('/update/{idService}',[ServiceController::class,'modifier'])->name('services.modifier');
        Route::put('/update',[ServiceController::class,'update'])->name('services.update');
        Route::delete('/delete',[ServiceController::class,'supprimer'])->name('services.supprimer');
        Route::get('/listePDF',[ServiceController::class,'listePDF'])->name('services.listePDF');
    });

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/home', [UserController::class, 'dashboard'])->name('dashboard');
});
