<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteCategories extends Model
{
    //
    protected $casts = [
        'field_name' => 'json'
    ];
}
