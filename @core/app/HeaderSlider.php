<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderSlider extends Model
{
    use HasFactory;
    protected $table = 'header_sliders';
protected $fillable = [
    'title',
    'title_en',          
    'subtitle',
    'subtitle_en',       
    'description',
    'description_en',    
    'btn_01_status',
    'btn_01_text',
    'btn_01_url',
    'image',
];


}
