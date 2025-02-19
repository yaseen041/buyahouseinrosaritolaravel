<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SEO;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class SeoController extends Controller {

    public function index(Request $request) {
        $query =SEO::query();
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('meta_title', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('meta_description', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('meta_keywords', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('fb_title', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        $seos = $query->orderBy('id', 'DESC')->paginate(50);
        return view('admin.seos.manage_seos', compact('seos'));
    }

    public function create(Request $request) {
        return view('admin.seos.create_page_seo');
    }

    public function store(Request $request) {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'page_name' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'facebook_meta_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook_meta_title' => 'required',
            'facebook_meta_description' => 'required',
            'twitter_meta_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'twitter_meta_title' => 'required',
            'twitter_meta_description' => 'required',
            'json_ld_code' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }if ($request->hasFile('facebook_meta_image')) {
            $fb_image = $request->file('facebook_meta_image');
            $file_name2 = explode('.', $fb_image->getClientOriginalName())[0];
            $data['facebook_meta_image'] = $file_name2.'-'.time().'.'.$fb_image->getClientOriginalExtension();
            $destinationPath2 = public_path('/assets/images');
            $fb_image->move($destinationPath2, $data['facebook_meta_image']);
        }
        if ($request->hasFile('twitter_meta_image')) {
            $tw_image = $request->file('twitter_meta_image');
            $file_name3 = explode('.', $tw_image->getClientOriginalName())[0];
            $data['twitter_meta_image'] = $file_name3.'-'.time().'.'.$tw_image->getClientOriginalExtension();
            $destinationPath3 = public_path('/assets/images');
            $tw_image->move($destinationPath3, $data['twitter_meta_image']);
        }
        $query =SEO::create([
            'page_name' => $data['page_name'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'fb_image' => $data['facebook_meta_image'],
            'fb_title' => $data['facebook_meta_title'],
            'fb_description' => $data['facebook_meta_description'],
            'twitter_image' => $data['twitter_meta_image'],
            'twitter_title' => $data['twitter_meta_title'],
            'twitter_description' => $data['twitter_meta_description'],
            'json_ld_code' => $data['json_ld_code'],
            'author_id' => Auth()->user()->id,
            'publish_date' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($query->id > 0) {
            return response()->json(['msg' => 'success', 'response' => 'Page Seo saved successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
        }
    }

    public function show(Request $request) {
        $data['page_seo'] =SEO::where('id', $request->id)->first();
        return view('admin.seos.edit_page_seo', $data);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'page_name' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'facebook_meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook_meta_title' => 'required',
            'facebook_meta_description' => 'required',
            'twitter_meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'twitter_meta_title' => 'required',
            'twitter_meta_description' => 'required',
            'json_ld_code' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['msg' => 'lvl_error', 'response' => $validator->errors()->all()]);
        }
        $page_seo =SEO::find($data['id']);
        if ($page_seo) {
            if ($request->hasFile('facebook_meta_image')) {
                $fb_image = $request->file('facebook_meta_image');
                $file_name2 = explode('.', $fb_image->getClientOriginalName())[0];
                $data['facebook_meta_image'] = $file_name2.'-'.time().'.'.$fb_image->getClientOriginalExtension();
                $destinationPath2 = public_path('/assets/images');
                $fb_image->move($destinationPath2, $data['facebook_meta_image']);
                if (file_exists(public_path('/assets/images/'.$page_seo->fb_image))) {
                    @unlink(public_path('/assets/images/'.$page_seo->fb_image));
                }
            } else {
                $data['facebook_meta_image'] = $page_seo->fb_image;
            }
            if ($request->hasFile('twitter_meta_image')) {
                $tw_image = $request->file('twitter_meta_image');
                $file_name3 = explode('.', $tw_image->getClientOriginalName())[0];
                $data['twitter_meta_image'] = $file_name3.'-'.time().'.'.$tw_image->getClientOriginalExtension();
                $destinationPath3 = public_path('/assets/images');
                $tw_image->move($destinationPath3, $data['twitter_meta_image']);
                if (file_exists(public_path('/assets/images/'.$page_seo->twitter_image))) {
                    @unlink(public_path('/assets/images/'.$page_seo->twitter_image));
                }
            } else {
                $data['twitter_meta_image'] = $page_seo->twitter_image;
            }
            $query =SEO::where('id', $data['id'])->update([
                'page_name' => $data['page_name'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keywords' => $data['meta_keywords'],
                'fb_image' => $data['facebook_meta_image'],
                'fb_title' => $data['facebook_meta_title'],
                'fb_description' => $data['facebook_meta_description'],
                'twitter_image' => $data['twitter_meta_image'],
                'twitter_title' => $data['twitter_meta_title'],
                'twitter_description' => $data['twitter_meta_description'],
                'json_ld_code' => $data['json_ld_code'],
                'author_id' => Auth()->user()->id,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            if ($query > 0) {
                return response()->json(['msg' => 'success', 'response' => 'Page Seo updated successfully.']);
            } else {
                return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
            }
        } else {
            return response()->json(['msg' => 'error', 'response' => 'Something went wrong!']);
        }
    }

    public function delete(Request $request) {
        $data = $request->all();
        $status =SEO::find($data['id'])->delete();
        if($status > 0) {
            return response()->json(['msg' => 'success', 'response'=>'Page Seo deleted successfully.']);
        } else {
            return response()->json(['msg' => 'error', 'response'=>'Something went wrong!']);
        }
    }
}