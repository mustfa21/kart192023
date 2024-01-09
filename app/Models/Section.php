<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'primary', 'slug', 'description', 'icon', 'status',
    ];

    public $translatable = ['title','description'];

    // Section Title
    static public function section($slug)
    {
    	$section = Section::where('slug', $slug)
    					->where('status', 1)
    					->first();

    	return $section;
    }
}
