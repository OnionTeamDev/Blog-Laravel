<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'post';

    public function users()
    {
        return $this->hasOne(User::class);
    }
    public function category()
    {
        return $this->belongsToMany(CategoryModel::class, 'post_has_category');
    }
}
