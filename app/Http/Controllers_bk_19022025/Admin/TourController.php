<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\TourBooking;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $query = TourBooking::query();
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
        return view('admin/tour/manage_reqs', $data);
    }

    public function show(Request $request)
    {
        $req = TourBooking::where('id', $request->id)->first();
        $property = Property::where('id', $req->property_id)->first();
        if (!empty($req)) {
            $htmlresult = view('admin/tour/reqs_ajax', compact(['req', 'property']))->render();
            $finalResult = response()->json(['msg' => 'success', 'response' => $htmlresult]);
            return $finalResult;
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Request not found.']);
        }
    }

    public function delete(Request $request)
    {
        $req = TourBooking::find($request->id);
        if (!empty($req)) {
            $req->delete();
            return response()->json(['msg' => 'success', 'response' => 'Request deleted successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Request not found.']);
        }
    }
}
