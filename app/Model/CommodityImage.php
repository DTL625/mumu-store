<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommodityImage extends Model
{
    protected $table = 'commodities_image';

    public function commodity()
    {
        return $this->belongsTo(Commodity::class, 'c_id');
    }
}
