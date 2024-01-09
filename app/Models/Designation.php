<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Designation extends Model
{
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'department', 'description', 'status',
    ];
    public $translatable = ['title','description'];

    public function members()
    {
        return $this->hasMany(Member::class, 'designation_id', 'id');
    }
}
