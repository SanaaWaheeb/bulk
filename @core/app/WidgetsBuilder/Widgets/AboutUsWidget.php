<?php

namespace App\WidgetsBuilder\Widgets;


use App\Language;
use App\Widgets;
use App\WidgetsBuilder\WidgetBase;

class AboutUsWidget extends WidgetBase
{
    private function pickLocalized($settings, $baseKey, $locale)
    {
        // Try exact locale as stored in DB (case-sensitive), then lowercase
        $candidates = [];
        $candidates[] = $baseKey . '_' . $locale; // e.g., en_GB, ar_SA, en-us
        $lc = strtolower($locale);
        if ($lc !== $locale) { $candidates[] = $baseKey . '_' . $lc; }
        // base two-letter language
        $two = substr($lc, 0, 2);
        if (!empty($two)) { $candidates[] = $baseKey . '_' . $two; }
        // also try any variant that starts with two-letter base (e.g., description_en_us)
        if (!empty($two)) {
            $prefix = $baseKey . '_' . $two . '_';
            foreach ($settings as $k => $v) {
                if (strpos($k, $prefix) === 0 && $v !== '') {
                    return $v;
                }
            }
        }
        // generic en/ar fallback
        $candidates[] = $baseKey . '_' . ($two === 'ar' ? 'ar' : 'en');
        // old single-language field
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

        $image_val = $widget_saved_values['site_logo'] ?? '';
        $image_preview = '';
        $image_field_label = __('Upload Image');
        if (!empty($widget_saved_values)) {
            $image_markup = render_image_markup_by_attachment_id($widget_saved_values['site_logo']);
            $image_preview = '<div class="attachment-preview"><div class="thumbnail"><div class="centered">' . $image_markup . '</div></div></div>';
            $image_field_label = __('Change Image');
        }

        $output .= '<div class="form-group"><label for="site_logo"><strong>' . __('Logo') . '</strong></label>';
        $output .= '<div class="media-upload-btn-wrapper"><div class="img-wrap">' . $image_preview . '</div><input type="hidden" name="site_logo" value="' . $image_val . '">';
        $output .= '<button type="button" class="btn btn-info btn-xs media_upload_form_btn" data-btntitle="Select Image" data-modaltitle="Upload Image" data-toggle="modal" data-target="#media_upload_modal">';
        $output .= $image_field_label . '</button></div>';
        $output .= '<small class="form-text text-muted">' . __('allowed image format: jpg,jpeg,png. Recommended image size 160x50') . '</small></div>';

        // multilingual fields
        $output .= $this->admin_language_tab();
        $output .= $this->admin_language_tab_start();
        foreach (Language::all() as $key => $lang){
            $id = 'nav-home-' . $lang->slug;
            $class = $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade';
            $output .= $this->admin_language_tab_content_start(['id' => $id, 'class' => $class]);
            $desc_key = 'description_' . $lang->slug;
            $description = $widget_saved_values[$desc_key] ?? ($widget_saved_values['description'] ?? ''); // fallback to old single field
            $placeholder = __('Description') . ' ' . strtoupper($lang->slug);
            $output .= '<div class="form-group"><textarea name="'.$desc_key.'"  class="form-control" cols="30" rows="5" placeholder="' . $placeholder . '">' . $description . '</textarea></div>';
            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $widget_saved_values = $this->get_settings();
        $image_val = $widget_saved_values['site_logo'] ?? '';
        $locale = function_exists('get_user_lang') ? get_user_lang() : app()->getLocale();
        $description = $this->pickLocalized($widget_saved_values, 'description', $locale);

        $output = $this->widget_before(); //render widget before content

        $output .= '<div class="about_us_widget">';
        $output .= render_image_markup_by_attachment_id($image_val, 'footer-logo');
        $output .= '<p>' . purify_html($description) . '</p>';
        $output .= '</div>';

        $output .= $this->widget_after(); // render widget after content

        return $output;
    }

    public function widget_title(){
        return __('About Us');
    }

}