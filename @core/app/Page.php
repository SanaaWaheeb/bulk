<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = ['title','title_en','page_content','page_content_en','slug','meta_description','meta_title','meta_tags','og_meta_description','og_meta_title','og_meta_image','status','visibility'];
}
