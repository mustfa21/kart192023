<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'slug', 'description', 'image_path', 'video_id', 'status',
    ];
    public $translatable = ['title','description'];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }
}
