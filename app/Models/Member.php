<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Member extends Model
{
        use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designation_id', 'title', 'slug', 'description', 'image_path', 'facebook', 'twitter', 'instagram', 'linkedin', 'pinterest', 'email', 'phone', 'whatsapp', 'website', 'status',
    ];
    public $translatable = ['title','description'];


    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
}
