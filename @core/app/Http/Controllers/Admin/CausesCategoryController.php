<?php

namespace App\Http\Controllers\Admin;

use App\CauseCategory;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class CausesCategoryController extends Controller
{
    private const BASE_PATH = 'backend.donations.';

    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:donation-category-list|donation-category-create|donation-category-edit|donation-category-delete',['only' => ['all_donation_category']]);
        $this->middleware('permission:donation-category-create',['only' => ['store_donation_category']]);
        $this->middleware('permission:donation-category-edit',['only' => ['update_donation_category']]);
        $this->middleware('permission:donation-category-delete',['only' => ['delete_donation_category','bulk_action']]);
    }

    public function all_donation_category(){
        $all_category = CauseCategory::latest()->get();
        return view(self::BASE_PATH.'donations-category')->with(['all_category' => $all_category]);
    }

    public function store_donation_category(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'title_en' => 'nullable|string',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
            'description_en'=> 'nullable|string',
            'status' => 'required|string'
        ],[
            'title.required' => __('title is required'),
            'status.required' => __('status is required'),
        ]);

        CauseCategory::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'image' => $request->image,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'status' => $request->status
        ]);

        return redirect()->back()->with(['msg' => __('New item added'),'type' => 'success']);
    }

    public function update_donation_category(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'title_en'      => 'nullable|string',      // English title
            'image' => 'nullable|string',
            'description' => 'nullable|string',
            'description_en'=> 'nullable|string',      // English description
            'category_id' => 'required',
            'status' => 'required|string'
        ],[
            'title.required' => __('title is required'),
            'status.required' => __('status is required'),
        ]);

        CauseCategory::findOrFail($request->category_id)->update([
            'title' => $request->title,
            'title_en'=> $request->title_en,
            'image' => $request->image,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'status' => $request->status
        ]);

        return redirect()->back()->with(['msg' => __('Update success'),'type' => 'success']);
    }

    public function delete_donation_category(Request $request,$id){
        CauseCategory::findOrFail($id)->delete();
        return redirect()->back()->with(['msg' => __('item deleted'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        $all = CauseCategory::findOrFail($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

}
