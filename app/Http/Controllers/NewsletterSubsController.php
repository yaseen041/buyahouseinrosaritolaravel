<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\NewsletterSubs;

class NewsletterSubsController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        $newletter = NewsletterSubs::where('email', $request->email)->first();

        if($newletter){
            return response()->json([
                'message' => 'You have successfully subscribed to our newsletter'
            ]);
        }

        $newsletter = new NewsletterSubs();
        $newsletter->email = $request->email;
        $newsletter->save();

        return response()->json([
            'message' => 'You have successfully subscribed to our newsletter'
        ]);
    }
}
