<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendee;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $haldiCount = Attendee::forEvent('haldi')->count();
        $onamCount = Attendee::forEvent('onam')->count();
        
        return view('events.index', compact('haldiCount', 'onamCount'));
    }

    public function show($event)
    {
        if (!in_array($event, ['haldi', 'onam'])) {
            abort(404);
        }

        $attendeesCount = Attendee::forEvent($event)->count();
        
        return view('events.show', compact('event', 'attendeesCount'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'event' => 'required|in:haldi,onam'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill all fields correctly.'
            ], 422);
        }

        // Check if attendee already exists based on phone number
        $existingAttendee = Attendee::where('phone', $request->phone)->first();

        if ($existingAttendee) {
            return response()->json([
                'success' => true,
                'message' => 'You are already on our list, thank you! 🎉',
                'attendee_count' => Attendee::forEvent($request->event)->count()
            ]);
        }

        // Create new attendee
        $attendee = Attendee::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'event' => $request->event
        ]);

        $attendeeCount = Attendee::forEvent($request->event)->count();

        return response()->json([
            'success' => true,
            'message' => "Welcome to our celebration, {$request->name}! 🌟 We're excited to have you join us!",
            'attendee_count' => $attendeeCount
        ]);
    }

    public function admin()
    {
        $haldiAttendees = Attendee::forEvent('haldi')->get();
        $onamAttendees = Attendee::forEvent('onam')->get();
        
        return view('admin.attendees', compact('haldiAttendees', 'onamAttendees'));
    }
}
