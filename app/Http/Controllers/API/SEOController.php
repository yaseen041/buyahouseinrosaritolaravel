<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    public function index($slug){
        $page = SEO::where('page_name', $slug)->first();
        if($page){
            $page->fb_image = asset('assets/images/' . $page->fb_image);
            $page->twitter_image = asset('assets/images/' . $page->twitter_image);
            return response()->json([
                'status' => 'success',
                'data' => $page
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Page not found'
            ]);
        }
    }
}
