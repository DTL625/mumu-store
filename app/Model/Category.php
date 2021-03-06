<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function commodity()
    {
        return $this->belongsToMany(Commodity::class, 'commodities_category', 'cate_id', 'c_id');
    }
}
