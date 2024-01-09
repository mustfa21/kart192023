<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
        use HasTranslations;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'keywords', 'logo_path', 'favicon_path', 'phone_one', 'phone_two', 'email_one', 'email_two', 'contact_address', 'contact_mail', 'office_hours', 'google_map', 'google_analytics', 'footer_text', 'custom_css', 'status',
    ];
        public $translatable = ['title','description','keywords','contact_address','contact_mail','office_hours','footer_text'];

}
