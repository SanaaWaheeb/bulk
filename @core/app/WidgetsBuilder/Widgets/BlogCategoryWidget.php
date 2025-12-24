<?php


namespace App\WidgetsBuilder\Widgets;


use App\BlogCategory;
use App\EventsCategory;
use App\Language;
use App\WidgetsBuilder\WidgetBase;
use Illuminate\Support\Str;

class BlogCategoryWidget extends WidgetBase
{

    private function pickLocalized($settings, $baseKey, $locale)
    {
        $candidates = [];
        $candidates[] = $baseKey . '_' . $locale;
        $lc = strtolower($locale);
        if ($lc !== $locale) { $candidates[] = $baseKey . '_' . $lc; }
        $two = substr($lc, 0, 2);
        if (!empty($two)) { $candidates[] = $baseKey . '_' . $two; }
        // also try any variant that starts with two-letter base (e.g., widget_title_en_us)
        if (!empty($two)) {
            $prefix = $baseKey . '_' . $two . '_';
            foreach ($settings as $k => $v) {
                if (strpos($k, $prefix) === 0 && $v !== '') {
                    return $v;
                }
            }
        }
        $candidates[] = $baseKey . '_' . ($two === 'ar' ? 'ar' : 'en');
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
        // TODO: Implement admin_render() method.
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        // multilingual widget title
        $output .= $this->admin_language_tab();
        $output .= $this->admin_language_tab_start();
        foreach (Language::all() as $key => $lang){
            $id = 'nav-home-' . $lang->slug;
            $class = $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade';
            $output .= $this->admin_language_tab_content_start(['id' => $id, 'class' => $class]);
            $title_key = 'widget_title_' . $lang->slug;
            $widget_title = $widget_saved_values[$title_key] ?? ($widget_saved_values['widget_title'] ?? '');
            $placeholder = __('Widget Title') . ' ' . strtoupper($lang->slug);
            $output .= '<div class="form-group"><input type="text" name="'.$title_key.'" class="form-control" placeholder="' . $placeholder . '" value="' . e($widget_title) . '"></div>';
            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();

        $post_items = $widget_saved_values['post_items'] ?? '';
        $output .= '<div class="form-group"><input type="text" name="post_items" class="form-control" placeholder="' . __('Post Items') . '" value="' . $post_items . '"></div>';

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
        $post_items = $widget_saved_values['post_items'] ?? '';

        $blog_posts = BlogCategory::where([ 'status' => 'publish'])->orderBy('id', 'DESC')->take($post_items)->get();

        $output = $this->widget_before('widget_archive'); //render widget before content

        if (!empty($widget_title)) {
            $output .= '<h4 class="widget-title">' . purify_html($widget_title) . '</h4>';
        }
        $output .= '<ul>';
        $isEnglish = substr(strtolower($locale), 0, 2) === 'en';
        foreach ($blog_posts as $post) {
            $name = $isEnglish && !empty($post->name_en) ? $post->name_en : $post->name;
            $output .= '<li><a href="' . route('frontend.blog.category', ['id' => $post->id,'any' => Str::slug($name)]) . '"><i class="fas fa-chevron-right"></i> ' . purify_html($name) . '</a></li>'; 
        }
        $output .= '</ul>';

        $output .= $this->widget_after(); // render widget after content

        return $output;
    }

    public function widget_title()
    {
        // TODO: Implement widget_title() method.
        return __('Blog Category');
    }
}