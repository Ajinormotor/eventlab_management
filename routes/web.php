<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventUserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $event =  Event::with('user')
    ->latest()
    ->paginate(8);
    return Inertia::render('Home',[
        'events' => $event
    ]);
})->name('home');




//EVent User Dashboard1


Route::middleware(['auth', 'verified'])->group( function(){

    Route::get('/dashboard/user',[UserController::class, 'index'] )
    ->name('dashboard.user');

// Profile Section
Route::get('dashboard/user/profile', [ProfileController::class, 'index'])
->name('dashboard.user.profile');

Route::get('dashboard/user/info', [ProfileController::class, 'showProfile'])
->name('dashboard.user.show');

Route::patch('dashboard/user/info', [ProfileController::class, 'updateProfile'])
->name('dashboard.user.update');

Route::delete('dashboard/user/profile', [ProfileController::class, 'destroyProfile'])
->name('dashboard.user.destroy');

//Event

// Route::get('dashboard/user/event', [EventsController::class, 'index'])
// ->name('dashboard.user.event');

Route::resource('dashboard/user/event', EventController::class);

// Admin
Route::get('dashboard/admin', [AdminController::class, 'index'])
->name('admin.index');

Route::get('admin/profile', [AdminController::class, 'indexProfile'])
->name('admin.profile');

Route::get('dashboard/admin/info', [AdminController::class, 'showProfile'])
->name('dashboard.admin.show');

//Admin Event

Route::get('admin/event', [AdminEventController::class, 'index'])
->name('admin.event');


Route::get('admin/event/{user}', [AdminEventController::class, 'showUser'])
->name('admin.user.show');

Route::put('admin/role/{user}', [AdminEventController::class, 'updateRole'])
->name('admin.user.update');

Route::put('admin/approved/{event}', [AdminEventController::class, 'approvedEvent'])
->name('admin.event.approved');

});


Route::resource('/event/user', EventUserController::class);



require  __DIR__."/auth.php";