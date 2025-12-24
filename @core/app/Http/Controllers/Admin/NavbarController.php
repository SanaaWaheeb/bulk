<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:appearance-navbar-settings');
    }

    public function navbar_settings(){
        return view('backend.pages.navbar-settings');
    }

   public function update_navbar_settings(Request $request)
{
    // الفاليديشن الأساسي
    $this->validate($request, [
        'home_page_navbar_button_status'        => 'nullable',
        'home_page_navbar_button_url'           => 'nullable',
        'home_page_navbar_button_icon'          => 'nullable',
        'home_page_navbar_search_show_hide'     => 'nullable',
    ]);

    // النصوص (عربي + إنجليزي)
    $this->validate($request, [
        'home_page_navbar_button_subtitle'      => 'nullable|string',
        'home_page_navbar_button_title'         => 'nullable|string',
        'home_page_navbar_button_subtitle_en'   => 'nullable|string',
        'home_page_navbar_button_title_en'      => 'nullable|string',
    ]);

    // حفظ كل الفيلدز في static_option
    $all_fields = [
        'home_page_navbar_button_subtitle',
        'home_page_navbar_button_title',
        'home_page_navbar_button_subtitle_en',
        'home_page_navbar_button_title_en',
        'home_page_navbar_button_url',
        'home_page_navbar_button_status',
        'home_page_navbar_button_icon',
        'home_page_navbar_search_show_hide',
    ];

    foreach ($all_fields as $field) {
        // نستخدم null coalesce عشان لو مش مبعوت ما يبوّظش الدنيا
        if ($request->has($field)) {
            update_static_option($field, $request->$field);
        }
    }

    return redirect()->back()->with(FlashMsg::settings_update());
}

}
