<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    //
    protected $table = 'category';

    protected $fillable = [
        'category_name', 'category_slug', 'category_desc', 'category_status',
    ];

    public function posts()
    {
        return $this->belongsToMany(PostModel::class, 'post_has_category');
    }
}
