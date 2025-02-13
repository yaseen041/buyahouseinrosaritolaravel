<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $data['properties'] = Property::where('status', 1)->select('id', 'title', 'code')->get();
        return view('cms/contact', $data);
    }

    public function submit_contact(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
            'property' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }

        $properties_ids = json_decode($request->property); //["1", "2", "3"] in this format
        print_r($properties_ids);
        exit;
        $properties_ids = ["1", "2", "3"];
        $properties = Property::whereIn('id', $properties_ids)->get();
        if (!$properties) {
            return response()->json(['msg' => 'error', 'response' => 'Properties not found.']);
        }

        $contactRequest = new ContactRequest();
        $contactRequest->name = $data['name'];
        $contactRequest->email = $data['email'];
        $contactRequest->phone = $data['phone'];
        $contactRequest->property_ids = '["1", "2", "3"]';
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
            return response()->json(['msg' => 'success', 'response' => 'Contact request submitted successfully.'.$properties]);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Failed to submit contact request.']);
        }
    }
}
