<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\City;
use App\Models\Htaccess;
use App\Models\Neighborhood;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HtaccessController extends Controller
{
    public function index(Request $request)
    {
        $query = Htaccess::query();
        $search_query = $request->input('search_query');
        if ($request->has('search_query') && !empty($search_query)) {
            $query->where(function ($query) use ($search_query) {
                $query->where('content', 'like', '%' . $search_query . '%');
            });
        }
        $data['htaccesses'] = $query->orderBy('id', 'DESC')->paginate(50);
        $data['searchParams'] = $request->all();
        return view('admin/htaccess/manage_htaccess', $data);
    }

    public function genSitemap()
    {
        // we will generate a sitemap xml file here
        $baseUrl = "https://buyahouseinrosarito.com/";
        $Pages = [
            [
                'loc' => 'https://buyahouseinrosarito.com',
                'lastmod' => '2025-02-10',
                'priority' => '0.9',
                'changefreq' => 'monthly'
            ],
            [
                'loc' => $baseUrl . "about",
                'lastmod' => '2025-02-10',
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            [
                'loc' => $baseUrl . "property",
                'lastmod' => '2025-02-10',
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            [
                'loc' => $baseUrl . "blog",
                'lastmod' => '2025-02-10',
                'priority' => '0.8',
                'changefreq' => 'daily'
            ],
            [
                'loc' => $baseUrl . "faq",
                'lastmod' => '2025-02-10',
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ],
            [
                'loc' => $baseUrl . "contact",
                'lastmod' => '2025-02-10',
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ]
        ];
        $properties = Property::where('status', '1')->get();
        foreach ($properties as $property) {
            $Pages[] = [
                'loc' => $baseUrl . "property/" . $property->slug,
                'lastmod' => '2025-02-10',
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ];
        }
        $communities = Neighborhood::where('status', '1')->get();
        foreach ($communities as $community) {
            $Pages[] = [
                'loc' => $baseUrl . "community/" . $community->slug,
                'lastmod' => '2025-02-10',
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ];
        }
        $cities = City::all();
        foreach ($cities as $city) {
            $Pages[] = [
                'loc' => $baseUrl . "city/" . $city->slug,
                'lastmod' => '2025-02-10',
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ];
        }
        $blogs = Blogs::where('status', '1')->where('disable_crawl', '0')->get();
        foreach ($blogs as $blog) {
            $Pages[] = [
                'loc' => $baseUrl . $blog->post_url,
                'lastmod' => '2025-02-10',
                'priority' => '0.8',
                'changefreq' => 'monthly'
            ];
        }

        // return download sitemap xml file
        $xml = new \DOMDocument('1.0', 'UTF-8');
        $xml->formatOutput = true;
        // sitemapindex
        $sitemapindex = $xml->createElement('urlset');
        $sitemapindex->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $xml->appendChild($sitemapindex);
        // Add sitemap entry itself
        $sitemapUrl = $xml->createElement('url');
        $sitemapindex->appendChild($sitemapUrl);

        $loc = $xml->createElement('loc', $baseUrl . 'sitemap');
        $sitemapUrl->appendChild($loc);

        $lastmod = $xml->createElement('lastmod', date('Y-m-d'));
        $sitemapUrl->appendChild($lastmod);

        $changefreq = $xml->createElement('changefreq', 'daily');
        $sitemapUrl->appendChild($changefreq);

        $priority = $xml->createElement('priority', '1.0');
        $sitemapUrl->appendChild($priority);
        foreach ($Pages as $page) {
            $url = $xml->createElement('url');
            $sitemapindex->appendChild($url);
            $loc = $xml->createElement('loc', $page['loc']);
            $url->appendChild($loc);
            $lastmod = $xml->createElement('lastmod', $page['lastmod']);
            $url->appendChild($lastmod);
            $priority = $xml->createElement('priority', $page['priority']);
            $url->appendChild($priority);
            $changefreq = $xml->createElement('changefreq', $page['changefreq']);
            $url->appendChild($changefreq);
        }

        $xml->save('sitemap.xml');
        return response()->download('sitemap.xml');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'error', 'response' => 'Content is required.']);
        }

        $htaccess = new Htaccess();
        $htaccess->content = $request->content;
        $htaccess->save();

        if ($htaccess->id > 0) {
            $finalResult = response()->json(['msg' => 'success', 'response' => 'Htaccess added successfully.']);
            return $finalResult;
        } else {
            $finalResult = response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
            return $finalResult;
        }
    }

    public function show(Request $request)
    {
        $htaccess = Htaccess::where('id', $request->id)->first();
        if (!empty($htaccess)) {
            $htmlresult = view('admin/htaccess/htaccess_ajax', compact('htaccess'))->render();
            $finalResult = response()->json(['msg' => 'success', 'response' => $htmlresult]);
            return $finalResult;
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Htaccess not found.']);
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'error', 'response' => 'Content is required.']);
        }
        $htaccess = Htaccess::where('id', $request->id)->first();
        if (!empty($htaccess)) {
            $htaccess->content = $request->content;
            $htaccess->save();
            return response()->json(['msg' => 'success', 'response' => 'Htaccess updated successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Htaccess not found.']);
        }
    }
    public function delete(Request $request)
    {
        $htaccess = Htaccess::find($request->id);
        if (!empty($htaccess)) {
            $htaccess->delete();
            return response()->json(['msg' => 'success', 'response' => 'Htaccess deleted successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Htaccess not found.']);
        }
    }
}
