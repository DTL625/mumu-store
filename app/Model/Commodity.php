<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table = 'commodities';

    public function images()
    {
        return $this->hasMany(CommodityImage::class, 'c_id', 'id');
    }

    public function cover()
    {
        return $this->images()->where('is_cover', 1)->first();
    }

    public function category()
    {
        
    }
}
