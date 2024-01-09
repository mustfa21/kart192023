<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PortfolioCategory extends Model
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

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_category');
    }
}
