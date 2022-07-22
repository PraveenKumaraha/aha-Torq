<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarBrand;
class CarModel extends Model
{
    use HasFactory;
    public function brands(){
        return $this->hasOne(CarBrand::class, 'id', 'brand_id');
    }
}
