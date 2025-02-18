<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsletterSubs;
use Illuminate\Support\Facades\Validator;


class NewsletterSubsController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }
        $newletter = NewsletterSubs::where('email', $request->email)->first();
        $newsletter = new NewsletterSubs();
        $newsletter->email = $request->email;
        $newsletter->save();

        return response()->json(['msg' => 'success', 'response' => 'You have successfully subscribed to our newsletter']);
    }
}
