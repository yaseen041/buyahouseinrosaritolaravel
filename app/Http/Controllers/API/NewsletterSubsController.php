<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
