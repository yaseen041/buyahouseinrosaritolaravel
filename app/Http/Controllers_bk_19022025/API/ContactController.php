<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function inputs()
    {
        $properties = Property::all();
        $result = [];
        foreach ($properties as $property) {
            $result[] = [
                'id' => $property->id,
                'title' => $property->title,
                'code' => $property->code,
            ];
        }
        return response()->json(['message' => 'Properties Options retrieved successfully.', 'data' => $result], 200);
    }

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
            'property_id' => 'required',
        ]);
        if ($validator->fails()) {
            $missing_fields = [];
            foreach ($validator->errors()->messages() as $key => $value) {
                $missing_fields[] = $key;
            }
            return back()->with('error', 'The following fields are required: ' . implode(', ', $missing_fields));
        }

        $data = $request->all();
        $properties_ids = json_decode($request->property_id); //["1", "2", "3"] in this format
        $properties = Property::whereIn('id', $properties_ids)->get();
        if (!$properties) {
            return response()->json(['message' => 'Properties not found.'], 404);
        }

        $contactRequest = new ContactRequest();
        $contactRequest->name = $data['name'];
        $contactRequest->email = $data['email'];
        $contactRequest->phone = $data['phone'];
        $contactRequest->property_ids = $request->property_id;
        $contactRequest->message = $data['message'];
        $contactRequest->save();

        // $headers = "From: webmaster@example.com\r\n";
        // $headers .= "Reply-To: webmaster@example.com\r\n";
        // $headers .= "Content-Type: text/html\r\n";
        // $subject = 'New Contact Submission Received from ' . $data['name'];
        // $emailTemplate = view('emails.contact', compact(['data', 'properties']))->render();
        // $sendMail = mail(env('ADMIN_EMAIL'), $subject, $emailTemplate, $headers);

        $sendMail = true;

        if ($sendMail) {
            return response()->json(['status' => 'success', 'message' => 'Contact request submitted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to submit contact request.'], 500);
        }
    }
}
