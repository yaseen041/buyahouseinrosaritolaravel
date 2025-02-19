<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubs;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsletterSubs::query();
        $search_query = $request->input('search_query');
        if ($request->has('search_query') && !empty($search_query)) {
            $query->where(function ($query) use ($search_query) {
                $query->where('email', 'like', '%' . $search_query . '%');
            });
        }
        $data['subs'] = $query->orderBy('id', 'DESC')->paginate(50);
        $data['searchParams'] = $request->all();
        return view('admin/newsletter/manage_newsletter', $data);
    }

    public function delete(Request $request)
    {
        $sub = NewsletterSubs::find($request->id);
        if (!empty($sub)) {
            $sub->delete();
            return response()->json(['msg' => 'success', 'response' => 'Subscriber deleted successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Subscriber not found.']);
        }
    }

    public function exportJSON(){
        $subs = NewsletterSubs::select('email', 'created_at')->get();

        $jsonData = $subs->toJson(JSON_PRETTY_PRINT);

        $filename = 'newsletter_subs' . now()->format('Y-m-d_H-i-s') . '.json';

        $headers = [
            'Content-type' => 'application/json',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $filename)
        ];

        return response()->make($jsonData, 200, $headers);
    }

    public function exportCSV(){
        
        $subs = NewsletterSubs::select('email', 'created_at')->get();

        $filename = 'newsletter_subs' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $filename)
        ];

        $callback = function() use ($subs) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Email', 'Subscribed At']);
            foreach ($subs as $sub) {
                fputcsv($file, [$sub->email, $sub->created_at]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

    }
}
