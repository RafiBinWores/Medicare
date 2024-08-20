<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    // get booking page
    public function index($id, Request $request)
    {
        $doctor = doctor::with('specialization')->findOrFail($id);
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'appointment_date' => 'required',
        ]);
        session()->put('appointment_date', $request->input('appointment_date'));
        $appointment_date = Carbon::parse(session('appointment_date'));

        return view('frontend.booking', compact('doctor', 'user', 'appointment_date'));
    }

    // store booking data
    public function processAppointment(Request $request)
    {
        $user_id = Auth::id();

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'doctor_id' => 'required',
            'note' => 'nullable',
        ]);

        if ($validator->passes()) {

            $appointment = new Appointment();
            $appointment->user_id = $user_id;
            $appointment->doctor_id = $request->doctor_id;
            $appointment->name = $request->name;
            $appointment->email = $request->email;
            $appointment->phone = $request->full_phone;
            $appointment->age = $request->age;
            $appointment->gender = $request->gender;
            $appointment->note = $request->note;
            $appointment->appointment_date = session('appointment_date');
            $appointment->save();

            session()->flash('success', 'Successful.');
            return response()->json([
                'status' => true,
                'message' => 'Successful.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // view all appointment
    public function userAppointments()
    {
        // Get current authenticated user's ID
        $user = Auth::user();

        // Get current date
        $today = Carbon::now()->toDateString();

        // Fetch upcoming appointments (appointments after today)
        $upcomingAppointments = Appointment::where('user_id', $user->id)
            ->with('doctor')
            ->whereDate('appointment_date', '>=', $today)
            ->orderBy('appointment_date', 'asc')
            ->get();

        // Fetch expired appointments (appointments before today)
        $expiredAppointments = Appointment::where('user_id', $user->id)
            ->with('doctor')
            ->whereDate('appointment_date', '<', $today)
            ->orderBy('appointment_date', 'desc')
            ->get();

        // Return appointments to a view or process further
        return view('frontend.account.appointment', compact('upcomingAppointments', 'expiredAppointments', 'user'));
    }

    public function doctorAppointments()
    {
        // Get the current authenticated user
        $user = Auth::user();

        // Check if the user is a doctor
        if ($user->role === 'doctor') {
            // Fetch the doctor's info using the user's ID
            $doctor = Doctor::where('user_id', $user->id)->first();

            if ($doctor) {
                // Get the current date
                $currentDate = Carbon::now();

                // Fetch all appointments for the logged-in doctor
                $appointments = Appointment::where('doctor_id', $doctor->id)->with('user')->get();

                // Categorize appointments
                $upcomingAppointments = $appointments->filter(function ($appointment) use ($currentDate) {
                    return $appointment->appointment_date >= $currentDate;
                });

                $expiredAppointments = $appointments->filter(function ($appointment) use ($currentDate) {
                    return $appointment->appointment_date < $currentDate;
                });

                return view('frontend.account.doctor-appointment', compact('doctor', 'upcomingAppointments', 'expiredAppointments', 'user'));
            } else {
                return redirect()->route('account.profile')->with('error', 'Doctor not found.');
            }
        } else {
            return redirect()->route('frontend.home')->with('error', 'You are not authorized to view this page.');
        }
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);

        $appointment->delete();
        return response()->json([
            'status' => true,
            'message' => 'City deleted successfully.'
        ]);
    }
}
