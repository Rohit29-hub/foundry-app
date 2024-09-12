<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Jobcomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class AdminController extends Controller
{
    public function updateProgress(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'progress' => 'required|integer|min:0|max:100',
                'comment' => 'required|string',
            ]);
            
            $job = Job::findOrFail($id); // Use findOrFail to throw an exception if not found
            dd($job);
            // Update job progress
            $job->progress = $request->input('progress');
            $job->station_id = $request->input('station_id');
            $job->save();

            // Store the comment
            Jobcomment::create([
                'job_id' => $job->id,
                'content' => $request->input('comment'),
                'user_id'=>1
            ]);

            return redirect()->back()->with('success', 'Progress updated successfully!');
        } catch (Exception $e) {
            Log::error('Failed to update progress: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update progress.');
        }
    }
    public function updateStation(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'station_id' => 'required|integer|exists:stations,id',
            ]);

            // Find the job or throw a 404 exception
            $job = Job::findOrFail($id);

            // Update the job's station_id
            $job->station_id = $request->input('station_id');
            $job->save();

            return redirect()->back()->with('success', 'Station updated successfully!');
        }  
         catch (\Exception $e) {
            // Handle general exceptions
            Log::error('Failed to update station: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update station.');
        }
    }

    public function reportIssue(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'comment' => 'required|string',
            ]);

            $job = Job::findOrFail($id);
            
            // Store the issue report
            Jobcomment::create([
                'job_id' => $job->id,
                'content' => $request->input('comment'),
                'user_id'=>1
            ]);

            return redirect()->back()->with('success', 'Issue reported successfully!');
        } catch (Exception $e) {
            Log::error('Failed to report issue: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to report issue.');
        }
    }

    // public function markLate(Request $request, $id)
    // {
    //     try {
    //         // Validate the request data
    //         $request->validate([
    //             'comment' => 'required|string',
    //         ]);

    //         $job = Job::findOrFail($id);
            
    //         // Mark job as late
    //         $job->status = 'late'; // Update job status as needed
    //         $job->save();

    //         // Store the comment
    //         JobComment::create([
    //             'job_id' => $job->id,
    //             'comment' => $request->input('comment'),
    //             'type' => 'late'
    //         ]);

    //         return redirect()->back()->with('success', 'Job marked as late!');
    //     } catch (Exception $e) {
    //         Log::error('Failed to mark job as late: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Failed to mark job as late.');
    //     }
    // }

    public function markResolved(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'comment' => 'required|string',
            ]);

            $job = Job::findOrFail($id);

            // Store the comment
            Jobcomment::create([
                'job_id' => $job->id,
                'content' => $request->input('comment'),
                'user_id' => 1
            ]);

            return redirect()->back()->with('success', 'Job marked as resolved!');
        } catch (Exception $e) {
            Log::error('Failed to mark job as resolved: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to mark job as resolved.');
        }
    }
}
