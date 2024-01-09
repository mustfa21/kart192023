<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FaqCategory extends Model
{
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];
    public $translatable = ['title'];


    public function faqs()
    {
    	return $this->hasMany(Faq::class, 'category_id', 'id');
    }
}
