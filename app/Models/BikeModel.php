<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BikeBrand;

class BikeModel extends Model
{
    use HasFactory;

    

    public function brands(){
        return $this->hasOne(BikeBrand::class, 'id', 'brand_id');
    }

}
