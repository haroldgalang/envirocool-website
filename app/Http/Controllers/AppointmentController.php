<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {

        return view('appointments.index', [
            'appointments' => Appointment::all()
        ]);
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|regex:/^[0-9]{10,15}$/',
            'service_type' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value === 'Select Service') {
                        $fail('Please select a valid service type.');
                    }
                }
            ],
            'location' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value === 'Select Location') {
                        $fail('Please select a valid location.');
                    }
                }
            ],
            'warranty' => 'required|in:With warranty,No warranty',
            'message' => 'nullable|string|max:500',
        ]);

        Appointment::create($request->input());

        // $appointment = new Appointment;
        // $appointment->name = $request->name;
        // $appointment->email = $request->email;
        // $appointment->phone_number = $request->phone_number;
        // $appointment->service_type = $request->service_type;
        // $appointment->location = $request->location;
        // $appointment->warranty = $request->warranty;
        // $appointment->message = $request->message;

        // $appointment->save();

        return redirect()->route('appointments.index');
    }
}
