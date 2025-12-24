<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfoItem extends Model
{
    protected $table = 'contact_info_items';
 protected $fillable = [
    'title',
    'title_en',
    'icon',
    'description',
    'description_en',
];

}
