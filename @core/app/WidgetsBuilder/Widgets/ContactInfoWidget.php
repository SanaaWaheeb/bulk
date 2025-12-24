<?php

namespace App\WidgetsBuilder\Widgets;
use App\Language;
use App\WidgetsBuilder\WidgetBase;

class ContactInfoWidget extends WidgetBase
{

    private function pickLocalized($settings, $baseKey, $locale)
    {
        $candidates = [];
        // exact locale (case-sensitive), then lowercase variant
        $candidates[] = $baseKey . '_' . $locale;
        $lc = strtolower($locale);
        if ($lc !== $locale) { $candidates[] = $baseKey . '_' . $lc; }
        // two-letter base (en/ar)
        $two = substr($lc, 0, 2);
        if (!empty($two)) { $candidates[] = $baseKey . '_' . $two; }
        // any variant that starts with two-letter base, e.g., widget_title_en_us
        if (!empty($two)) {
            $prefix = $baseKey . '_' . $two . '_';
            foreach ($settings as $k => $v) {
                if (strpos($k, $prefix) === 0 && $v !== '') {
                    return $v;
                }
            }
        }
        // generic fallback to en (non-ar) or ar
        $candidates[] = $baseKey . '_' . ($two === 'ar' ? 'ar' : 'en');
        // legacy single-language field
        $candidates[] = $baseKey;
        foreach ($candidates as $key) {
            if (isset($settings[$key]) && $settings[$key] !== '') {
                return $settings[$key];
            }
        }
        return '';
    }

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        // multilingual title + location
        $output .= $this->admin_language_tab();
        $output .= $this->admin_language_tab_start();
        foreach (Language::all() as $key => $lang){
            $id = 'nav-home-' . $lang->slug;
            $class = $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade';
            $output .= $this->admin_language_tab_content_start(['id' => $id, 'class' => $class]);
            $title_key = 'widget_title_' . $lang->slug;
            $loc_key = 'location_' . $lang->slug;
            $widget_title = $widget_saved_values[$title_key] ?? ($widget_saved_values['widget_title'] ?? '');
            $location = $widget_saved_values[$loc_key] ?? ($widget_saved_values['location'] ?? '');
            $output .= '<div class="form-group"><input type="text" name="'.$title_key.'"  class="form-control" placeholder="' . __('Widget Title') . ' ' . strtoupper($lang->slug) . '" value="'. e($widget_title) .'"></div>';
            $output .= '<div class="form-group"><input type="text" name="'.$loc_key.'" class="form-control" placeholder="' . __('Location') . ' ' . strtoupper($lang->slug) . '" value="'. e($location) .'"></div>';
            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();

        $phone =  $widget_saved_values['phone'] ?? '';
        $email =  $widget_saved_values['email'] ?? '';
        $output .= '<div class="form-group"><input type="text" name="phone"  class="form-control" placeholder="' . __('Phone') . '" value="'. $phone .'"></div>';
        $output .= '<div class="form-group"><input type="email" name="email" class="form-control" placeholder="' . __('Email') . '" value="'. $email .'"></div>';

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        // TODO: Implement frontend_render() method.
        $widget_saved_values = $this->get_settings();
        $locale = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
        $widget_title = $this->pickLocalized($widget_saved_values, 'widget_title', $locale);
        $location = $this->pickLocalized($widget_saved_values, 'location', $locale);
        $phone =  $widget_saved_values['phone'] ?? '';
        $email = $widget_saved_values['email'] ?? '';


        $output = $this->widget_before(); //render widget before content

        if (!empty($widget_title)){
            $output .= '<h4 class="widget-title">'.purify_html($widget_title).'</h4>';
        }
        $output .= '<ul class="contact_info_list">';
        if(!empty($location)){
            $output .= ' <li class="single-info-item">
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="details">
                        '.purify_html($location).'
                    </div>
                </li>';
        }
        if(!empty($phone)){
            $output .= '<li class="single-info-item">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="details">
                       '.purify_html($phone).'
                    </div>
                </li>';
        }
        if(!empty($email)){
            $output .= '<li class="single-info-item">
                    <div class="icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <div class="details">
                       '.purify_html($email).'
                    </div>
                </li>';
        }
        $output .= '</ul>';

        $output .= $this->widget_after(); // render widget after content

        return $output;
    }

    public function widget_title()
    {
        return __('Contact Info');
    }

}