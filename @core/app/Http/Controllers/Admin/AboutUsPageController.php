<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class AboutUsPageController extends Controller
{
    private $base_path = 'backend.pages.about-page.';
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:page-settings-about-page-manage');
    }

    public function about_page_about_section(){
        return view($this->base_path.'about-section');
    }
  public function about_page_update_about_section(Request $request)
{
    $this->validate($request, [
        // AR
        'about_page_about_section_title'        => 'nullable|string',
        'about_page_about_section_subtitle'     => 'nullable|string',
        'about_page_about_section_description'  => 'nullable|string',

        // EN
        'about_page_about_section_title_en'        => 'nullable|string',
        'about_page_about_section_subtitle_en'     => 'nullable|string',
        'about_page_about_section_description_en'  => 'nullable|string',
    ]);

    $fields = [
        // AR
        'about_page_about_section_title',
        'about_page_about_section_subtitle',
        'about_page_about_section_description',

        // EN
        'about_page_about_section_title_en',
        'about_page_about_section_subtitle_en',
        'about_page_about_section_description_en',
    ];

    foreach ($fields as $field) {
        if ($request->has($field)) {
            update_static_option($field, $request->$field);
        }
    }

    return redirect()->back()->with([
        'msg'  => __('Settings Updated ...'),
        'type' => 'success'
    ]);
}


    public function about_page_our_section(){
        return view($this->base_path.'our-mission-section');
    }

  public function about_page_update_our_section(Request $request)
{
    // صورة اليسار
    $this->validate($request, [
        'about_page_our_mission_left_image_image' => 'nullable|string',
    ]);

    // النصوص عربي / إنجليزي + الليست
    $this->validate($request, [
        'about_page_our_mission_title'            => 'nullable|string',
        'about_page_our_mission_title_en'         => 'nullable|string',

        'about_page_our_mission_description'      => 'nullable|string',
        'about_page_our_mission_description_en'   => 'nullable|string',

        'about_page_our_mission_list_section_title'      => 'required|array',
        'about_page_our_mission_list_section_title.*'    => 'nullable|string',

        'about_page_our_mission_list_section_title_en'   => 'nullable|array',
        'about_page_our_mission_list_section_title_en.*' => 'nullable|string',

        'about_page_our_mission_list_section_icon'       => 'required|array',
        'about_page_our_mission_list_section_icon.*'     => 'required|string',
    ]);

    // الحقول النصية العادية (title / description) عربي وإنجليزي
    $single_fields = [
        'about_page_our_mission_title',
        'about_page_our_mission_title_en',
        'about_page_our_mission_description',
        'about_page_our_mission_description_en',
    ];

    foreach ($single_fields as $field) {
        if ($request->has($field)) {
            update_static_option($field, $request->$field);
        }
    }

    // الحقول الليست (مصفوفات) - عناوين النقاط + الأيقونات
    $array_fields = [
        'about_page_our_mission_list_section_title',
        'about_page_our_mission_list_section_title_en',
        'about_page_our_mission_list_section_icon',
    ];

    foreach ($array_fields as $field) {
        $value = $request->$field ?? [];
        update_static_option($field, serialize($value));
    }

    // الصورة
    update_static_option(
        'about_page_our_mission_left_image_image',
        $request->about_page_our_mission_left_image_image
    );

    return redirect()->back()->with([
        'msg'  => __('Settings Updated ...'),
        'type' => 'success',
    ]);
}

    public function about_page_counterup_section(){
        return view($this->base_path.'counterup-section');
    }

    public function about_page_update_counterup_section(Request $request){
        $this->validate($request,[
            'about_page_counterup_background_image' => 'nullable|string',
        ]);
        update_static_option('about_page_counterup_background_image',$request->about_page_counterup_background_image);

        return redirect()->back()->with([
            'msg' => __('Settings Updated ...'),
            'type' => 'success'
        ]);
    }

    public function about_page_testimonial_section(){
        return view($this->base_path.'testimonial-section');
    }

    public function about_page_update_testimonial_section(Request $request){

        $this->validate($request,[
            'about_page_testimonial_item' => 'nullable|string',
        ]);

            $this->validate($request ,[
                'about_page_testimonial_title' => 'nullable|string',
                'about_page_testimonial_subtitle' => 'nullable|string',
            ]);

            $fields = [
                'about_page_testimonial_title',
                'about_page_testimonial_subtitle',
            ];
            foreach ($fields as $field){
                update_static_option($field,$request->$field);
            }


        update_static_option('about_page_testimonial_item',$request->about_page_testimonial_item);

        return redirect()->back()->with([
            'msg' =>  __('Settings Updated ...'),
            'type' => 'success'
        ]);
    }
    public function about_page_team_member_section(){
        return view($this->base_path.'team-section');
    }

    public function about_page_update_team_member_section (Request $request){
        $this->validate($request,[
            'about_page_team_member_item' => 'nullable|string',
        ]);

            $this->validate($request ,[
                'about_page_team_member_section_title' => 'nullable|string',
                'about_page_team_member_section_subtitle' => 'nullable|string',
            ]);

            $fields = [
                'about_page_team_member_section_title',
                'about_page_team_member_section_subtitle'
            ];
            foreach ($fields as $field){
                update_static_option($field,$request->$field);
            }

        update_static_option('about_page_team_member_item',$request->about_page_team_member_item);

        return redirect()->back()->with([
            'msg' =>  __('Settings Updated ...'),
            'type' => 'success'
        ]);
    }

    public function about_page_section_manage(){
        return view($this->base_path.'section-manage');
    }

    public function about_page_update_section_manage(Request $request){

        $section_list = [
            'about_us','our_mission','counterup','what_we_do','testimonial','team_member'
        ];

        foreach ($section_list as $section){
            $this->validate($request,[
                'about_page_'.$section.'_section_status' => 'nullable|string',
            ]);
            $field = 'about_page_'.$section.'_section_status';
            update_static_option($field,$request->$field);
        }

        return redirect()->back()->with([
            'msg' =>  __('Settings Updated ...'),
            'type' => 'success'
        ]);

    }

    public function about_page_what_we_do_section(){
        return view($this->base_path.'what-we-do-area');
    }

public function about_page_update_what_we_do_section(Request $request)
{
    // أولاً: التحقق من الأيقونات واللينكات (زي ما هو)
    $this->validate($request, [
        'about_page_what_we_do_section_icon'      => 'required|array',
        'about_page_what_we_do_section_icon.*'    => 'required|string',
        'about_page_what_we_do_section_url'       => 'nullable|array',
        'about_page_what_we_do_section_url.*'     => 'nullable|string',
    ]);

    // ثانياً: التحقق من عنوان / ساب تايتل السيكشن بالعربي والإنجليزي
    $this->validate($request, [
        'about_page_what_we_do_area_subtitle'    => 'nullable|string',
        'about_page_what_we_do_area_subtitle_en' => 'nullable|string',
        'about_page_what_we_do_area_title'       => 'nullable|string',
        'about_page_what_we_do_area_title_en'    => 'nullable|string',
    ]);

    // حفظ عناوين القسم (عربي + إنجليزي)
    $area_fields = [
        'about_page_what_we_do_area_subtitle',
        'about_page_what_we_do_area_subtitle_en',
        'about_page_what_we_do_area_title',
        'about_page_what_we_do_area_title_en',
    ];

    foreach ($area_fields as $field) {
        if ($request->has($field)) {
            update_static_option($field, $request->$field);
        }
    }

    // ثالثاً: الحقول الخاصة بكل عنصر (List Items) عربي + إنجليزي
    $this->validate($request, [
        'about_page_what_we_do_section_title'         => 'nullable|array',
        'about_page_what_we_do_section_title.*'       => 'nullable|string',
        'about_page_what_we_do_section_title_en'      => 'nullable|array',
        'about_page_what_we_do_section_title_en.*'    => 'nullable|string',

        'about_page_what_we_do_section_description'      => 'nullable|array',
        'about_page_what_we_do_section_description.*'    => 'nullable|string',
        'about_page_what_we_do_section_description_en'   => 'nullable|array',
        'about_page_what_we_do_section_description_en.*' => 'nullable|string',
    ]);

    // الحقول اللي هنخزنها كـ serialized array
    $list_fields = [
        'about_page_what_we_do_section_icon',
        'about_page_what_we_do_section_url',

        'about_page_what_we_do_section_title',
        'about_page_what_we_do_section_title_en',

        'about_page_what_we_do_section_description',
        'about_page_what_we_do_section_description_en',
    ];

    foreach ($list_fields as $field) {
        $value = $request->$field ?? [];
        update_static_option($field, serialize($value));
    }

    return redirect()->back()->with([
        'msg'  => __('Settings Updated ...'),
        'type' => 'success'
    ]);
}


}
