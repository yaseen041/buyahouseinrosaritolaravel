<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CMSontroller extends Controller
{
    public function faq(Request $request)
    {
        // $data['properties'] = Property::where('status', 1)->select('id', 'title', 'code')->get();
        return view('cms/faq');
    }
    public function about(Request $request)
    {
        // $data['properties'] = Property::where('status', 1)->select('id', 'title', 'code')->get();
        return view('cms/about');
    }
}
