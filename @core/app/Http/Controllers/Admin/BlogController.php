<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\BlogCategory;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class BlogController extends Controller
{
    private $base_path = 'backend.blog.';
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:blog-list|blog-edit|blog-delete',['only' => ['index']]);
        $this->middleware('permission:blog-edit',['only' => ['clone_blog','edit_blog','update_blog']]);
        $this->middleware('permission:blog-delete',['only' => ['delete_blog','bulk_action']]);
        $this->middleware('permission:blog-create',['only' => ['new_blog','store_new_blog']]);
        $this->middleware('permission:blog-category-list|blog-category-create|blog-category-edit|blog-category-delete',['only' => ['category']]);
        $this->middleware('permission:blog-category-create',['only' => ['new_category']]);
        $this->middleware('permission:blog-category-edit',['only' => ['update_category']]);
        $this->middleware('permission:blog-category-delete',['only' => ['delete_category','category_bulk_action']]);
        $this->middleware('permission:blog-page-settings',['only' => ['update_blog_page_settings','blog_page_settings']]);
        $this->middleware('permission:blog-single-page-settings',['only' => ['update_blog_single_page_settings','blog_single_page_settings']]);
    }
    public function index(){
        $all_blog = Blog::all();
        return view($this->base_path.'index')->with([
            'all_blog' => $all_blog
        ]);
    }
    public function new_blog(){
        $all_category = BlogCategory::all();
        return view($this->base_path.'new')->with([
            'all_category' => $all_category,
        ]);
    }
  public function store_new_blog(Request $request){
    $this->validate($request,[
        'category' => 'required',
        'blog_content' => 'required',
        'tags' => 'required',
        'excerpt' => 'required',
        'title' => 'required',
        'status' => 'required',
        'author' => 'required',
        'slug' => 'nullable',
        'meta_tags' => 'nullable|string',
        'meta_title' => 'nullable|string',
        'meta_description' => 'nullable|string',
        'og_meta_title' => 'nullable|string',
        'og_meta_description' => 'nullable|string',
        'og_meta_image' => 'nullable|string',
        'image' => 'nullable|string|max:191',

        // ✅ English fields
        'title_en'        => 'nullable|string',
        'blog_content_en' => 'nullable',
        'author_en'       => 'nullable|string',
        'excerpt_en'      => 'nullable|string',
    ]);

    $slug = !empty($request->slug) ? Str::slug($request->slug ) : Str::slug($request->title);
    $slug_check = Blog::where(['slug' => $slug])->count();
    $blog_slug = $slug_check >= 1 ? $slug.'-2' : $slug;

    Blog::create([
        'blog_categories_id' => $request->category,
        'slug'               => $blog_slug,

        // AR
        'blog_content'       => purify_html_raw($request->blog_content),
        'tags'               => purify_html($request->tags),
        'title'              => purify_html($request->title),
        'excerpt'            => purify_html($request->excerpt),
        'author'             => $request->author,

        // EN
        'title_en'           => purify_html($request->title_en),
        'blog_content_en'    => purify_html_raw($request->blog_content_en),
        'excerpt_en'         => purify_html($request->excerpt_en),
        'author_en'          => $request->author_en,

        'status'             => $request->status,
        'meta_tags'          => purify_html($request->meta_tags),
        'meta_title'         => purify_html($request->meta_title),
        'meta_description'   => purify_html($request->meta_description),
        'image'              => $request->image,
        'user_id'            => Auth::user()->id,
        'og_meta_title'      => purify_html($request->og_meta_title),
        'og_meta_description'=> purify_html($request->og_meta_description),
        'og_meta_image'      => $request->og_meta_image,
    ]);

    return redirect()->back()->with([
        'msg'  => __('New Item Added...'),
        'type' => 'success'
    ]);
}

   public function clone_blog(Request $request)
{
    $blog_details = Blog::findOrFail($request->item_id);

    // base slug from existing slug or title (Arabic)
    $baseSlug = !empty($blog_details->slug)
        ? \Str::slug($blog_details->slug)
        : \Str::slug($blog_details->title);

    // make sure cloned slug is unique
    $slug   = $baseSlug;
    $count  = 2;
    while (Blog::where('slug', $slug)->exists()) {
        $slug = $baseSlug . '-' . $count;
        $count++;
    }

    Blog::create([
        'blog_categories_id' => $blog_details->blog_categories_id,
        'slug'               => $slug,

        // 🔹 content (AR + EN)
        'blog_content'       => $blog_details->blog_content,
        'blog_content_en'    => $blog_details->blog_content_en,

        // 🔹 title (AR + EN)
        'title'              => $blog_details->title,
        'title_en'           => $blog_details->title_en,

        // 🔹 author (AR + EN)
        'author'             => $blog_details->author,
        'author_en'          => $blog_details->author_en,

        // 🔹 excerpt (AR + EN)
        'excerpt'            => $blog_details->excerpt,
        'excerpt_en'         => $blog_details->excerpt_en,

        // باقي الحقول كما هي
        'tags'               => $blog_details->tags,
        'status'             => 'draft',
        'meta_tags'          => $blog_details->meta_tags,
        'meta_description'   => $blog_details->meta_description,
        'meta_title'         => $blog_details->meta_title,
        'image'              => $blog_details->image,
        'user_id'            => null,
        'og_meta_title'      => $blog_details->og_meta_title,
        'og_meta_description'=> $blog_details->og_meta_description,
        'og_meta_image'      => $blog_details->og_meta_image,
    ]);

    return redirect()->back()->with([
        'msg'  => __('Blog Post cloned success...'),
        'type' => 'success'
    ]);
}


    public function edit_blog($id){
        $blog_post = Blog::findOrFail($id);
        $all_category = BlogCategory::all();
        return view($this->base_path.'edit')->with([
            'all_category' => $all_category,
            'blog_post' => $blog_post,
        ]);
    }
   public function update_blog(Request $request, $id){
    $this->validate($request,[
        'category' => 'required',
        'blog_content' => 'required',
        'tags' => 'required',
        'excerpt' => 'required',
        'title' => 'required',
        'status' => 'required',
        'author' => 'required',
        'slug' => 'nullable',
        'meta_tags' => 'nullable|string',
        'meta_description' => 'nullable|string',
        'meta_title' => 'nullable|string',
        'og_meta_title' => 'nullable|string',
        'og_meta_description' => 'nullable|string',
        'og_meta_image' => 'nullable|string',
        'image' => 'nullable|string|max:191',

        // ✅ English fields
        'title_en'        => 'nullable|string',
        'blog_content_en' => 'nullable',
        'author_en'       => 'nullable|string',
        'excerpt_en'      => 'nullable|string',
    ]);

    $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
    $slug_check = Blog::where(['slug' => $slug])->count();
    $blog_slug = $slug_check > 1 ? $slug.'-3' : $slug;

    Blog::where('id',$id)->update([
        'blog_categories_id' => $request->category,
        'slug'               => $blog_slug,

        // AR
        'blog_content'       => $request->blog_content,
        'tags'               => $request->tags,
        'title'              => $request->title,
        'excerpt'            => $request->excerpt,
        'author'             => $request->author,

        // EN
        'title_en'           => $request->title_en,
        'blog_content_en'    => $request->blog_content_en,
        'excerpt_en'         => $request->excerpt_en,
        'author_en'          => $request->author_en,

        'status'             => $request->status,
        'meta_tags'          => $request->meta_tags,
        'meta_description'   => $request->meta_description,
        'image'              => $request->image,
        'user_id'            => Auth::user()->id,
        'meta_title'         => $request->meta_title,
        'og_meta_title'      => $request->og_meta_title,
        'og_meta_description'=> $request->og_meta_description,
        'og_meta_image'      => $request->og_meta_image,
    ]);

    return redirect()->back()->with([
        'msg'  => __('Item updated...'),
        'type' => 'success'
    ]);
}

    public function delete_blog(Request $request,$id){
        Blog::findOrFail($id)->delete();

        return redirect()->back()->with([
            'msg' => __('Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function category(){
        $all_category = BlogCategory::all();
        return view($this->base_path.'category')->with([
            'all_category' => $all_category
        ]);
    }
    public function new_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:blog_categories',
            'name_en' => 'nullable|string|max:191',
            'status' => 'required|string|max:191'
        ]);

       BlogCategory::create([
        'name'    => $request->name,
        'name_en' => $request->name_en,
        'status'  => $request->status,
    ]);

        return redirect()->back()->with([
            'msg' => __('New Category Added...'),
            'type' => 'success'
        ]);
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
             'name_en' => 'nullable|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        BlogCategory::findOrFail($request->id)->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'status' => $request->status,
        ]);

        return redirect()->back()->with([
            'msg' => __('Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request,$id){
        if (Blog::where('blog_categories_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Post...'),
                'type' => 'danger'
            ]);
        }
        BlogCategory::findOrFail($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function blog_page_settings(){
        $all_languages =  Language::orderBy('default','desc')->get();
        return view($this->base_path.'page-settings.blog')->with(['all_languages' => $all_languages]);
    }
    public function blog_single_page_settings(){
        $all_languages =  Language::orderBy('default','desc')->get();
        return view($this->base_path.'page-settings.blog-single')->with(['all_languages' => $all_languages]);
    }

   public function update_blog_single_page_settings(Request $request)
{
    $this->validate($request, [
        'blog_single_page_recent_post_item'          => 'nullable|string|max:191',

        'blog_single_page_related_post_title'        => 'nullable|string',
        'blog_single_page_related_post_title_en'     => 'nullable|string',

        'blog_single_page_share_title'               => 'nullable|string',
        'blog_single_page_share_title_en'            => 'nullable|string',

        'blog_single_page_category_title'            => 'nullable|string',
        'blog_single_page_category_title_en'         => 'nullable|string',

        'blog_single_page_recent_post_title'         => 'nullable|string',
        'blog_single_page_recent_post_title_en'      => 'nullable|string',

        'blog_single_page_tags_title'                => 'nullable|string',
        'blog_single_page_tags_title_en'             => 'nullable|string',
    ]);

    $keys = [
        'blog_single_page_related_post_title',
        'blog_single_page_related_post_title_en',

        'blog_single_page_share_title',
        'blog_single_page_share_title_en',

        'blog_single_page_category_title',
        'blog_single_page_category_title_en',

        'blog_single_page_recent_post_title',
        'blog_single_page_recent_post_title_en',

        'blog_single_page_tags_title',
        'blog_single_page_tags_title_en',
    ];

    foreach ($keys as $key) {
        if ($request->has($key)) {
            update_static_option($key, $request->$key);
        }
    }

    update_static_option('blog_single_page_recent_post_item', $request->blog_single_page_recent_post_item);

    return redirect()->back()->with([
        'msg'  => __('Settings Update Success...'),
        'type' => 'success',
    ]);
}


public function update_blog_page_settings(Request $request)
{
    $this->validate($request, [
        'blog_page_recent_post_widget_items'   => 'nullable|string|max:191',
        'blog_page_item'                       => 'nullable|string|max:191',

        'blog_page_read_more_btn_text'         => 'nullable|string',
        'blog_page_read_more_btn_text_en'      => 'nullable|string',
    ]);

    // نص زر "اقرأ المزيد" (عربي + إنجليزي)
    $keys = [
        'blog_page_read_more_btn_text',
        'blog_page_read_more_btn_text_en',
    ];

    foreach ($keys as $key) {
        if ($request->has($key)) {
            update_static_option($key, $request->$key);
        }
    }

    // باقي الإعدادات كما هي
    update_static_option('blog_page_item', $request->blog_page_item);
    update_static_option('blog_page_recent_post_widget_items', $request->blog_page_recent_post_widget_items);

    return redirect()->back()->with([
        'msg'  => __('Settings Update Success...'),
        'type' => 'success',
    ]);
}

    public function bulk_action(Request $request){
        $all = Blog::findOrFail($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function category_bulk_action(Request $request){
        $all = BlogCategory::findOrFail($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

}
