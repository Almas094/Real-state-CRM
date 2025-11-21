<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

/* SuperCRM */
use App\Http\Controllers\SuperCRMDashboardController;
use App\Http\Controllers\SuperCRMClientController;
use App\Http\Controllers\SuperCRMAlertController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserPlanController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\SubFeaturesController;
use App\Http\Controllers\AddOnsController;
use App\Http\Controllers\OrderController;


use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ClientMasterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientLeadsController;




Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
})->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {     
        Route::get('/dashboard', [SuperCRMDashboardController::class, 'index'])->name('dashboard');
       

        Route::prefix('alert')->group(function () {
            Route::get('/templates', [SuperCRMAlertController::class, 'alertTemplates'])->name('alert.templates');
            Route::get('/send-notification', [SuperCRMAlertController::class, 'sendNotification'])->name('send.notification');
        });
        
        
        
         Route::prefix('master')->group(function ($masterRoute) {

            $masterRoute->prefix('roles')->group(function () {
                Route::get('', [RolesController::class, 'index'])->name('master.roles.index');
                Route::get('/list', [RolesController::class, 'list'])->name('master.roles.list');
                Route::post('/store', [RolesController::class, 'store'])->name('master.roles.store');
                Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('master.roles.edit');
                Route::put('/update/{id}', [RolesController::class, 'update'])->name('master.roles.update');
                Route::delete('/delete/{id}', [RolesController::class, 'delete'])->name('master.roles.delete');
                Route::post('/update-status', [RolesController::class, 'updateStatus'])->name('master.roles.updateStatus');
            });
            
            $masterRoute->prefix('coupon')->group(function () {
                Route::get('', [CouponController::class, 'index'])->name('master.coupon.index');
                Route::get('/list', [CouponController::class, 'list'])->name('master.coupon.list');
                Route::post('/store', [CouponController::class, 'store'])->name('master.coupon.store');
                Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('master.coupon.edit');
                Route::put('/update/{id}', [CouponController::class, 'update'])->name('master.coupon.update');
                Route::delete('/delete/{id}', [CouponController::class, 'delete'])->name('master.coupon.delete');
                Route::post('/update-status', [CouponController::class, 'updateStatus'])->name('master.coupon.updateStatus');
                Route::post('/validate-status', [CouponController::class, 'validateCoupon'])->name('master.coupon.validate');
            });
            
             $masterRoute->prefix('userplan')->group(function () {
                Route::get('', [UserPlanController::class, 'index'])->name('master.userplan.index');
                Route::get('/list', [UserPlanController::class, 'list'])->name('master.userplan.list');
                Route::post('/store', [UserPlanController::class, 'store'])->name('master.userplan.store');
                Route::get('/edit/{id}', [UserPlanController::class, 'edit'])->name('master.userplan.edit');
                Route::put('/update/{id}', [UserPlanController::class, 'update'])->name('master.userplan.update');
                Route::delete('/delete/{id}', [UserPlanController::class, 'delete'])->name('master.userplan.delete');
                Route::post('/update-status', [UserPlanController::class, 'updateStatus'])->name('master.userplan.update.status');
            });
         
             $masterRoute->prefix('project-type')->group(function () {
                Route::get('', [ProjectTypeController::class, 'index'])->name('master.project.type.index');
                Route::get('/list', [ProjectTypeController::class, 'list'])->name('master.project.type.list');
                Route::post('/store', [ProjectTypeController::class, 'store'])->name('master.project.type.store');
                Route::get('/edit/{id}', [ProjectTypeController::class, 'edit'])->name('master.project.type.edit');
                Route::put('/update/{id}', [ProjectTypeController::class, 'update'])->name('master.project.type.update');
                Route::delete('/delete/{id}', [ProjectTypeController::class, 'delete'])->name('master.project.type.delete');
                Route::post('/update-status', [ProjectTypeController::class, 'updateStatus'])->name('master.project.type.update.status');
            });
         
            $masterRoute->prefix('features')->group(function () {
                Route::get('', [FeaturesController::class, 'index'])->name('master.features.index');
                Route::get('/list', [FeaturesController::class, 'list'])->name('master.features.list');
                Route::post('/store', [FeaturesController::class, 'store'])->name('master.features.store');
                Route::get('/edit/{id}', [FeaturesController::class, 'edit'])->name('master.features.edit');
                Route::put('/update/{id}', [FeaturesController::class, 'update'])->name('master.features.update');
                Route::delete('/delete/{id}', [FeaturesController::class, 'delete'])->name('master.features.delete');
                Route::post('/update-status', [FeaturesController::class, 'updateStatus'])->name('master.features.update.status');
            });

             $masterRoute->prefix('sub-features')->group(function () {
                Route::get('', [SubFeaturesController::class, 'index'])->name('master.sub-features.index');
                Route::get('/list', [SubFeaturesController::class, 'list'])->name('master.sub-features.list');
                Route::post('/store', [SubFeaturesController::class, 'store'])->name('master.sub-features.store');
                Route::get('/edit/{id}', [SubFeaturesController::class, 'edit'])->name('master.sub-features.edit');
                Route::put('/update/{id}', [SubFeaturesController::class, 'update'])->name('master.sub-features.update');
                Route::delete('/delete/{id}', [SubFeaturesController::class, 'delete'])->name('master.sub-features.delete');
                Route::post('/update-status', [SubFeaturesController::class, 'updateStatus'])->name('master.sub-features.update.status');
            });

            $masterRoute->prefix('Add-Ons')->group(function () {
                Route::get('', [AddOnsController::class, 'index'])->name('master.add-ons.index');
                Route::get('/list', [AddOnsController::class, 'list'])->name('master.add-ons.list');
                Route::post('/store', [AddOnsController::class, 'store'])->name('master.add-ons.store');
                Route::get('/edit/{id}', [AddOnsController::class, 'edit'])->name('master.add-ons.edit');
                Route::post('/update', [AddOnsController::class, 'update'])->name('master.add-ons.update');
                Route::delete('/delete/{id}', [AddOnsController::class, 'delete'])->name('master.add-ons.delete');
                Route::post('/update-status', [AddOnsController::class, 'updateStatus'])->name('master.add-ons.update.status');
            });
         
            
        });

        Route::prefix('permission')->group(function () {
            Route::get('/menu', [PermissionController::class, 'menuView'])->name('permission.menu');
            Route::post('/menu-list', [PermissionController::class, 'menuList'])->name('permission.menu.list');
            Route::post('/menu-store', [PermissionController::class, 'menuStore'])->name('permission.menu.store');
            Route::get('/menu-edit/{id}', [PermissionController::class, 'menuEdit'])->name('permission.menu.edit');
            Route::post('/menu-update', [PermissionController::class, 'menuUpdate'])->name('permission.menu.update');
            Route::post('/submenu-delete', [PermissionController::class, 'submenuDelete'])->name('permission.submenu.delete');
        });

        Route::prefix('client')->group(function () {
            Route::get('', [ClientController::class, 'index'])->name('client.index');
            Route::get('/add-client', [ClientController::class, 'addClient'])->name('client.add');
            Route::post('/list', [ClientController::class, 'clientList'])->name('client.list');
            Route::post('/store', [ClientController::class, 'store'])->name('client.store');
            Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
            Route::get('/view/{id}', [ClientController::class, 'view'])->name('client.view');
            Route::post('/update', [ClientController::class, 'update'])->name('client.update');
            Route::post('/update-status', [ClientController::class, 'updateStatus'])->name('client.update.status');
            Route::post('/delete', [ClientController::class, 'Delete'])->name('client.delete');
            Route::get('/create-subscription/{id}', [ClientController::class, 'createSubscription'])->name('client.create.subscription');
        }); 
        
        
        Route::prefix('order')->group(function () {
            Route::get('', [OrderController::class, 'index'])->name('order.index');
            Route::post('/list', [OrderController::class, 'list'])->name('order.list');
            Route::post('/store', [OrderController::class, 'store'])->name('order.store');
            Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
            Route::get('/view/{id}', [OrderController::class, 'view'])->name('order.view');
            Route::post('/update-status', [OrderController::class, 'updateStatus'])->name('order.update.status');
            Route::post('/detail', [OrderController::class, 'getOrderDetail'])->name('order.detail');
            
        }); 
        
        Route::prefix('users')->group(function (){
            Route::get('', [UsersController::class, 'index'])->name('users.index');
            Route::get('/list', [UsersController::class, 'list'])->name('users.list');
            Route::post('/store', [UsersController::class, 'store'])->name('users.store');
            Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
            Route::put('/update/{id}', [UsersController::class, 'update'])->name('users.update');
            Route::post('/update-status', [UsersController::class, 'update'])->name('users.update.status');
            Route::post('/delete', [UsersController::class, 'delete'])->name('users.delete');
        }); 
    });


    /* Route::prefix('client')->group(function () {     

        Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');

        Route::prefix('master')->group(function () {

            Route::get('/configuration-list', [ClientMasterController::class, 'configurationList'])->name('master.configuration.list');
            Route::get('/location-list', [ClientMasterController::class, 'locationList'])->name('master.location.list');
            Route::get('/source-list', [ClientMasterController::class, 'sourceList'])->name('master.source.list');
            Route::get('/disposition-list', [ClientMasterController::class, 'dispositionList'])->name('master.disposition.list');
            Route::get('/subdisposition-list', [ClientMasterController::class, 'subdispositionList'])->name('master.subdisposition.list');
            
        });

        Route::prefix('leads')->group(function () {

            Route::get('/add-leads', [ClientLeadsController::class, 'addLeads'])->name('master.add.leads');
            Route::get('/all-leads', [ClientLeadsController::class, 'allLeads'])->name('master.all.leads');

            
        });

    }); */

    

});






