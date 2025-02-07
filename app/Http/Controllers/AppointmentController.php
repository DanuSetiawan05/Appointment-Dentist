<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'doctor' => 'required|string|max:255',
            'services' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        try {
            // Create a new appointment record
            $appointment = new Appointment();
            $appointment->name = $validatedData['name'];
            $appointment->email = $validatedData['email'];
            $appointment->phone = $validatedData['phone'];
            $appointment->appointment_date = $validatedData['date'];
            $appointment->doctor = $validatedData['doctor'];
            $appointment->services = $validatedData['services'];
            $appointment->message = $validatedData['message'] ?? null;
            $appointment->save();
            
            // Return success response for AJAX
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            // Return error response for AJAX
            return response()->json(['status' => 'error', 'message' => 'Failed to save appointment. Please try again later.']);
        }
    }

    public function create()
    {
        return view('templates.appointment_template'); 
    }
}
