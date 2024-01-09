<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{

    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
         public $translatable = ['title','description','mission_title','mission_desc','vision_title','vision_desc'];

    protected $fillable = [
        'title', 'slug', 'description', 'image_path', 'video_id', 'mission_title', 'mission_desc', 'vision_title', 'vision_desc', 'status',
    ];

}

