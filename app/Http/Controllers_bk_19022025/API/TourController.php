<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\TourBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'type' => 'required',
            'property_id' => 'required',
            'message' => 'required|string',
        ]);
        if ($validator->fails()) {
            $missing_fields = [];
            foreach ($validator->errors()->messages() as $key => $value) {
                $missing_fields[] = $key;
            }
            return back()->with('error', 'The following fields are required: ' . implode(', ', $missing_fields));
        }

        $data = $request->all();
        $property = Property::where('id', $data['property_id'])->first();
        if (!$property) {
            return response()->json(['message' => 'Property not found.'], 404);
        }

        $tourbooking = new TourBooking();
        $tourbooking->name = $data['name'];
        $tourbooking->email = $data['email'];
        $tourbooking->phone = $data['phone'];
        $tourbooking->date = $data['date'];
        $tourbooking->time = $data['time'];
        $tourbooking->type = $data['type'];
        $tourbooking->property_id = $data['property_id'];
        $tourbooking->message = $data['message'];
        $tourbooking->save();
        

        // $headers = "From: webmaster@example.com\r\n";
        // $headers .= "Reply-To: webmaster@example.com\r\n";
        // $headers .= "Content-Type: text/html\r\n";
        // $subject = 'New Tour Schedulig Request Received from ' . $data['name'];
        // $emailTemplate = view('emails.tour', compact(['data', 'property']))->render();
        // $sendMail = mail(env('ADMIN_EMAIL'), $subject, $emailTemplate, $headers);
        $sendMail = true;

        if ($sendMail) {
            return response()->json(['status' => 'success', 'message' => 'Tour Request submitted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to submit Tour Request.'], 500);
        }
    }
}
