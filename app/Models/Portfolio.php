<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Portfolio extends Model
{
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'image_path', 'video_id', 'link', 'client', 'address', 'status',
    ];
    public $translatable = ['title','description'];

    public function categories()
    {
        return $this->belongsToMany(PortfolioCategory::class, 'portfolio_category');
    }
}
