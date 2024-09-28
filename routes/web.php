<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Station;
use App\Models\Job;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Orders
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    // Main application routes
    Route::get('/', function () {
        
        $stations = Station::with('jobs')->get();
        
        return view('welcome', compact(['stations']));
    })->name('index');

    // Inventory and warehouse views
    Route::view('/inventory', 'inventory');
    Route::view('/warehouse', 'warehouse');

    // Orders index
    Route::get('/order', [OrderController::class, 'index'])->name('orders.index');

    // Job detail route
    Route::get('/jobdetail/{id}', function ($id) {
        $job = Job::where('title', $id)->first();
        return view('jobdetail', compact(['job']));
    });

    // Product detail route
    Route::get('/productdetail/{id}', function ($id) {
        return view('productdetail', compact(['id']));
    });

    // Job edit for manager
    Route::get('/manager/jobedit/{title}', function ($title) {
        $job = Job::where('title', $title)->first();
        $stations = Station::all();

        if (!$job) {
            abort(404, 'Job not found.');
        }

        return view('jobedit', compact('job', 'stations'));
    });

    // Admin actions for managing jobs
    Route::post('/manager/job/{id}/update-progress', [AdminController::class, 'updateProgress'])->name('admin.job.updateProgress');
    Route::post('/manager/job/{id}/update-station', [AdminController::class, 'updateStation'])->name('admin.job.updateStation');
    Route::post('/manager/job/{id}/report-issue', [AdminController::class, 'reportIssue'])->name('admin.job.reportIssue');
    Route::post('/manager/job/{id}/mark-late', [AdminController::class, 'markLate'])->name('admin.job.markLate');
    Route::post('/manager/job/{id}/mark-resolved', [AdminController::class, 'markResolved'])->name('admin.job.markResolved');

    // Manager view based on ID
    Route::get('/manager/{id}', function ($id) {
        $user = Auth::user(); // Get the authenticated user

        // Check if the user is authenticated, has a role of 'manager', and matches the provided ID
        if ($user->role === "manager" . $id) {
            $station = Station::with('jobs')->find($id);

            if (!$station) {
                abort(404, 'Station not found.');
            }

            return view('admin', compact('station'));
        }
    });
});

// Auth routes
require __DIR__ . '/auth.php';
