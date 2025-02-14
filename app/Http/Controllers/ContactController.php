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

        $property_ids = $request->input('property', []);
        $ids_array = array_map('strval', $property_ids);
        $properties_ids = json_encode($ids_array);
        $properties = Property::whereIn('id', $ids_array)->select('id', 'title', 'code', 'neighborhood_id')->get();
        if (!$properties) {
            return response()->json(['msg' => 'error', 'response' => 'Properties not found.']);
        }

        $contactRequest = new ContactRequest();
        $contactRequest->name = $data['name'];
        $contactRequest->email = $data['email'];
        $contactRequest->phone = $data['phone'];
        $contactRequest->property_ids = $properties_ids;
        $contactRequest->message = $data['message'];
        $contactRequest->save();

        // $to = env('ADMIN_EMAIL');
        // $noreply_email = env('NOREPLY_EMAIL');
        $to = 'dev1@explorelogicsit.net';
        $noreply_email = 'noreply@explorelogicsit.net';
        $subject = 'New Contact Submission Received From '.$data['name'];
        $body = view('emails.contact', compact(['data', 'properties']))->render();

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= 'From: <' . $noreply_email . '>' . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "Content-Transfer-Encoding: 7bit\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-MSMail-Priority: Normal\r\n";
        $headers .= "Importance: Normal\r\n";
        $sendMail = mail($to, $subject, $body, $headers);

        $sendMail = true;
        if ($sendMail) {
            return response()->json(['msg' => 'success', 'response' => 'Contact request submitted successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Failed to submit contact request.']);
        }
    }
}
