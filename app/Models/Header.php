<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Header extends Model
{
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'meta_title', 'description', 'keywords', 'image_path', 'status',
    ];
    public $translatable = ['title','description'];


    // Page Title
    static public function header($slug)
    {
    	$header = Header::where('slug', $slug)
    					->where('status', 1)
    					->first();

    	return $header;
    }
}
