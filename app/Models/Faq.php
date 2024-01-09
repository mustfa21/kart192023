<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasTranslations;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'slug', 'description', 'status',
    ];
    public $translatable = ['title','description'];
    public function category()
    {
    	return $this->belongsTo(FaqCategory::class, 'category_id');
    }
}
