<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    protected $userId = 1; 

    // Checkin
    public function checkin(Request $request)
    {
        // Validate lat and long
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // Save new attendance
        $attendance = new Attendance;
        $attendance->user_id = $this->userId;
        $attendance->date = date('Y-m-d');
        $attendance->time_in = date('H:i:s');
        $attendance->latlon_in = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response([
            'message' => 'Checkin success',
            'attendance' => $attendance
        ], 200);
    }

    // Checkout
    public function checkout(Request $request)
    {
        // Validate lat and long
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // Get today attendance
        $attendance = Attendance::where('user_id', $this->userId)
            ->where('date', date('Y-m-d'))
            ->first();

        // Check if attendance not found
        if (!$attendance) {
            return response(['message' => 'Checkin first'], 400);
        }

        // Save checkout
        $attendance->time_out = date('H:i:s');
        $attendance->latlon_out = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response([
            'message' => 'Checkout success',
            'attendance' => $attendance
        ], 200);
    }

    // Check is checkedin
    public function isCheckedin(Request $request)
    {
        // Get today attendance
        $attendance = Attendance::where('user_id', $this->userId)
            ->where('date', date('Y-m-d'))
            ->first();

        $isCheckout = $attendance ? $attendance->time_out : false;

        return response([
            'checkedin' => $attendance ? true : false,
            'checkedout' => $isCheckout ? true : false,
        ], 200);
    }

    // Index
    public function index(Request $request)
    {
        $date = $request->input('date');

        $query = Attendance::where('user_id', $this->userId);

        if ($date) {
            $query->where('date', $date);
        }

        $attendance = $query->get();

        return response([
            'message' => 'Success',
            'data' => $attendance
        ], 200);
    }
}
