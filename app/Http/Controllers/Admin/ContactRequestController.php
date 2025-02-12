<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactRequest::query();
        $search_query = $request->input('search_query');
        if ($request->has('search_query') && !empty($search_query)) {
            $query->where(function ($query) use ($search_query) {
                $query->where('name', 'like', '%' . $search_query . '%')
                    ->orWhere('email', 'like', '%' . $search_query . '%')
                    ->orWhere('phone', 'like', '%' . $search_query . '%')
                    ->orWhere('message', 'like', '%' . $search_query . '%');
            });
        }
        $data['reqs'] = $query->orderBy('id', 'DESC')->paginate(50);
        $data['searchParams'] = $request->all();
        return view('admin/contact/manage_reqs', $data);
    }
    
    public function show(Request $request)
    {
        $req = ContactRequest::where('id', $request->id)->first();
        $property_ids = json_decode($req->property_ids);
        // i want an array containing property title and url
        $properties = [];
        if (!empty($property_ids)) {
            foreach ($property_ids as $property_id) {
                $property = Property::where('id', $property_id)->first();
                if (!empty($property)) {
                    $properties[] = [
                        'title' => $property->title,
                        'url' => url('admin/property-listings/details/' . $property->id)
                    ];
                }
            }
        }
        if (!empty($req)) {
            $htmlresult = view('admin/contact/reqs_ajax', compact(['req', 'properties']))->render();
            $finalResult = response()->json(['msg' => 'success', 'response' => $htmlresult]);
            return $finalResult;
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Request not found.']);
        }
    }

    public function delete(Request $request)
    {
        $req = ContactRequest::find($request->id);
        if (!empty($req)) {
            $req->delete();
            return response()->json(['msg' => 'success', 'response' => 'Request deleted successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Request not found.']);
        }
    }
}
