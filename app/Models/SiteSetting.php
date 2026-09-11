<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'site_tagline',

        'footer_description',
        'footer_navigate_title',
        'footer_visit_title',

        'address',
        'email',
        'phone',

        'copyright_text',

        'facebook_url',
        'instagram_url',
        'twitter_url',
    ];
}
