<?php

use App\Http\Controllers\ComentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExternalServicesController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FavoriteGuestController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\InternalServicesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReservationFacilityController;
use App\Http\Controllers\ResidentPermissionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\SuscruptionController;
use App\Http\Controllers\UserController;
use App\Http\Resources\GuestResource;
use App\Http\Resources\PaymentResource;
use App\Models\Guest;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use PHPUnit\Framework\MockObject\Rule\Parameters;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});

// ---------------------------------- USER ROUTES ---------------------------------------
//Neighborhood routes
Route::resource('neighborhood', PostController::class)->middleware('auth')->parameters(['neighborhood' => 'post']);
Route::post('post/comment', [ComentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::delete('post/comment/destroy/{coment}', [ComentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');
//Guest routes
Route::resource('guest',GuestController::class)->middleware('auth');
Route::put('/guest-entry-guest/{guest}',[GuestController::class,'entryGuest'])->name('guest.entry-guest')->middleware('auth');
Route::get('/guest-events',[GuestController::class,'event'])->name('guest.event')->middleware('auth');

//Payment routes
Route::resource('payments',PaymentController::class)->middleware('auth');
Route::get('/payments-history',[PaymentController::class, 'historyPayment'])->name('payments.history')->middleware('auth');

//Reservation Facilities routes
Route::resource('reservation-facilities',ReservationFacilityController::class)->middleware('auth');

//Facilities routes
Route::resource('facilities',FacilityController::class)->middleware('auth');

//Services routes
Route::resource('internal-services',InternalServicesController::class)->Parameters(['internal-services' => 'internal_service'])->middleware('auth');
Route::put('internal-services-disable/{internal_service}',[InternalServicesController::class, 'disable'])->middleware('auth')->name('internal-service.disable');
Route::put('internal-services-enable/{internal_service}',[InternalServicesController::class, 'enable'])->middleware('auth')->name('internal-service.enable');
Route::resource('external-services',ExternalServicesController::class)->Parameters(['external-services' => 'external_service'])->middleware('auth');
Route::put('external-services-disable/{external_service}',[ExternalServicesController::class, 'disable'])->middleware('auth')->name('external-service.disable');
Route::put('external-services-enable/{external_service}',[ExternalServicesController::class, 'enable'])->middleware('auth')->name('external-service.enable');

//General and intern stuffs routes
Route::resource('general', GeneralController::class)->middleware('auth');
Route::get('/general-documents', [GeneralController::class,'documents'])->name('general.documents')->middleware('auth');
Route::get('/general-documents/create', [GeneralController::class,'documentCreate'])->name('general.documents.create')->middleware('auth');
Route::get('/general-guard-house-chat', [GeneralController::class,'guardHouseChat'])->name('general.guard-house-chat')->middleware('auth');
Route::get('/general-report-incident', [GeneralController::class,'reportIncident'])->name('general.report-incident')->middleware('auth');
Route::put('/general-report-incident/solved/{incident}', [GeneralController::class,'incidentSolved'])->name('general.report-incident.solved')->middleware('auth');
Route::get('/general-surveys', [GeneralController::class,'surveys'])->name('general.surveys')->middleware('auth');
Route::get('/general-permissions', [GeneralController::class,'permissions'])->name('general.permissions')->middleware('auth');
Route::put('/general-permissions/denegated/{resident_permission}', [ResidentPermissionController::class,'denegated'])->name('general.permissions.denegated')->middleware('auth');
Route::put('/general-permissions/accepted/{resident_permission}', [ResidentPermissionController::class,'accepted'])->name('general.permissions.accepted')->middleware('auth');
Route::get('/general-suggestions', [GeneralController::class,'suggestions'])->name('general.suggestions')->middleware('auth');

//Incidents routes
Route::resource('incidents', IncidentController::class)->middleware('auth');

//Resident permissions routes
Route::resource('resident-permissions', ResidentPermissionController::class)->middleware('auth');

//Suggestions routes
Route::resource('suggestions', SuggestionController::class)->middleware('auth');

//Suscriptions routes
Route::resource('suscriptions', SuscruptionController::class)->middleware('auth');

//Users routes
Route::resource('users', UserController::class)->middleware('auth');

//Employees routes
Route::resource('employees', EmployeeController::class)->middleware('auth');

//Settings routes
Route::resource('settings', SettingController::class)->middleware('auth');


//------------------------------------ADMIN ROUTES-----------------------------------------------------------------------


// Route::resource('facilities',FacilityController::class);
