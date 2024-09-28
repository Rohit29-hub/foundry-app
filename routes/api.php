<?php

use App\Models\Job;
use App\Models\Jobcomment;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// login route
Route::post('/login', function (Request $req) {

    $loginData = $req->validate([
        'email' => 'required|email',
        'password' => 'required|min:7'
    ]);


    $user = User::where('email', $loginData['email'])->first();

    if (!$user) {
        return response()->json([
            'message' => 'User not find'
        ]);
    }

    if (!Hash::check($loginData['password'], $user->password)) {
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
    return response()->json([
        'access_token' => $token
    ]);
});

// get_profile,edit_progress,report_issue,mark_resovled
Route::middleware('auth:sanctum')->group(function () {
    
    // Get profile route
    Route::get('/get_profile', function (Request $req) {
        return $req->user();
    });

    // Edit progress route

    Route::post('/manager/job/{id}/update_progress', function (Request $req, $id) {
        try {
            // Validate the request data
            $editProgressData = $req->validate([
                'progress' => 'required|integer|min:0|max:100',
                'comment' => 'required|string',
            ]);

            // Find the particular job
            $job = Job::findOrFail($id);

            // Update job progress and station
            $job->progress = $editProgressData['progress'];
            if ($job->progress === 100) {
                $job->station_id = min($job->station_id + 1, 4);
                $job->progress = 0;
            }

            // Save the job and add a comment
            $job->save();
            Jobcomment::create([
                'job_id' => $job->id,
                'content' => $editProgressData['comment'],
                'user_id' => 1
            ]);

            return response()->json([
                'message' => "Progress updated successfully.",
                'success' => true
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => "Failed to update progress.",
                'success' => false
            ], 504);
        }
    });

    // Report issue route
    Route::post('/manager/job/{id}/report-issue', function (Request $req, $id) {
        try {
            // Validate the request data
            $req->validate([
                'comment' => 'required|string',
            ]);

            $job = Job::findOrFail($id);

            // Store the issue report
            Jobcomment::create([
                'job_id' => $job->id,
                'content' => $req->input('comment'),
                'user_id' => 1
            ]);

            return response()->json([
                "message" => "Issue reported successfully.",
                "success" => true
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                "message" => "Failed to report the issue.",
                "success" => false,
                "error" => $e->getMessage()
            ], 500);
        }
    });

    // Mark resolved route
    Route::post('/manager/job/{id}/mark-resolved', function (Request $req, $id) {
        try {
            // Validate the request data
            $req->validate([
                'comment' => 'required|string',
            ]);

            $job = Job::findOrFail($id);

            // Store the comment
            Jobcomment::create([
                'job_id' => $job->id,
                'content' => $req->input('comment'),
                'user_id' => 1
            ]);

            return response()->json([
                "message" => "Job marked as resolved!",
                "success" => true
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                "message" => "Failed to mark job as resolved.",
                "success" => false,
                "error" => $e->getMessage()
            ], 500);
        }
    });

    // get the total jobs of the particular station
    Route::get('/manager/{id}', function (Request $request, $id) {
        try {
            // Get the authenticated user from the request
            $user = $request->user();

            // Check if the authenticated user is a manager and the ID matches
            if ($user->role === "manager" . $id) {
                // Find the station with related jobs
                $station = Station::with('jobs')->find($id);

                // If the station is not found, return a 404 response
                if (!$station) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Station not found.',
                        'data' => null
                    ], 404);
                }
    
                // Return success with station data
                return response()->json([
                    'success' => true,
                    'message' => 'Station found.',
                    'data' => $station
                ], 200);
            } else {
                // If user is not authorized
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized access.',
                    'data' => null
                ], 403);
            }
        } catch (Exception $e) {
            // Handle unexpected errors
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage()
            ], 500);
        }
    });
});
