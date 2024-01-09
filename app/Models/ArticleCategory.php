<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ArticleCategory extends Model
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
    public $translatable = ['title','description'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}
