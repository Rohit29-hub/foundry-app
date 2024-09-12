<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Station;
use App\Models\Job;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');



    //e routes
    Route::get('/', function(){
        $stations = Station::with('jobs')->get();
        return view('welcome',compact(['stations']));
    });
    Route::view('/inventory', 'inventory');
    Route::view('/warehouse', 'warehouse');
    Route::get('/order', [OrderController::class, 'index'])->name('orders.index');
    
    
    Route::get('/jobdetail/{id}', function ($id) {
        $job = Job::where('title',$id)->first();
        return view('jobdetail',compact(['job']));
    });
    Route::get('/productdetail/{id}', function ($id) {
        return view('productdetail',compact(['id']));
    });
    
    // Route::get('/admin', function() {
    //     // Fetch the specific station by ID (e.g., station_id 1)
    //     $station = Station::with('jobs')->find(1); // Replace 1 with dynamic ID if needed
    
    //     if (!$station) {
    //         abort(404, 'Station not found.');
    //     }
    
    //     // Return the view with the station data
    //     return view('admin', compact('station'));
    // });
    
    Route::get('/manager/jobedit/{title}', function ($title) {
        $job = Job::where('title', $title)->first();
        $stations=Station::all();
    
            if (!$job) {
                abort(404, 'Job not found.');
            }
    
        return view('jobedit', compact('job','stations'));
    });
    
    
    Route::post('/manager/job/{id}/update-progress', [AdminController::class, 'updateProgress'])->name('admin.job.updateProgress');
    Route::post('/manager/job/{id}/update-station', [AdminController::class, 'updateStation'])->name('admin.job.updateStation');
    Route::post('/manager/job/{id}/report-issue', [AdminController::class, 'reportIssue'])->name('admin.job.reportIssue');
    Route::post('/manager/job/{id}/mark-late', [AdminController::class, 'markLate'])->name('admin.job.markLate');
    Route::post('/manager/job/{id}/mark-resolved', [AdminController::class, 'markResolved'])->name('admin.job.markResolved');
    
    Route::get('/manager', function () {
        $station = Station::with('jobs')->find(1);
    
        if (!$station) {
            abort(404, 'Station not found.');
        }
    
        return view('admin', compact('station'));
    });
});

require __DIR__.'/auth.php';
