<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class EmailTemplate extends Model
{
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'primary', 'slug', 'description', 'status',
    ];
    public $translatable = ['title','description'];


    // Email Template
    static public function template($slug)
    {
    	$template = EmailTemplate::where('slug', $slug)
    					->where('status', 1)
    					->first();

    	return $template;
    }
}
