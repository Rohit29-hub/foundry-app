<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;
use App\Models\Job;
use App\Models\Station; // Import Station model
use Carbon\Carbon; // Import Carbon for date manipulation

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'order_number' => 'required|string',
            'items' => 'required|array',
            'items.*.name' => 'required|string|max:255',
            'items.*.quantity' => 'required|integer',
        ]);

        // Create a new order
        $order = Order::create([
            'order_number' => $request->order_number,
            'client_id' => 1,
            'user_id' => Auth::id() // Assuming client_id is 1
        ]);

        // Fetch the station's time_duration (assuming station_id is 1)
        $station = Station::find(1);
        $timeDuration = $station->time_duration; // Time duration from station

        // Create the associated items and jobs
        foreach ($request->items as $itemData) {
            // Create item
            $item = Item::create([
                'order_id' => $order->id,
                'name' => $itemData['name'],
                'quantity' => $itemData['quantity'],
            ]);

            // Calculate due date based on quantity and time_duration
            $totalDuration = $itemData['quantity']/$timeDuration; // Total time for the job
            $dueDate = Carbon::now()->addHours($totalDuration); // Add the total duration to the current time

            // Create job for each item
            Job::create([
                'order_id' => $order->id,
                'station_id' => $station->id, // Default station_id
                'title' => $request->order_number . ' - ' . $itemData['name'], // Concatenate order name with job title
                'due_date' => $dueDate, // Calculated due date
                'quantity' => $itemData['quantity'], // Include quantity in job
            ]);
        }

        // Redirect back with success message
        return redirect()->route('orders.index')->with('success', 'Order, items, and jobs saved successfully!');
    }

    public function index()
    {
        // Get the logged-in user's ID
        $userId = Auth::id();
    
        // Retrieve orders only for the authenticated user
        $orders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
    
        return view('orders', compact('orders'));
    }
    
}
