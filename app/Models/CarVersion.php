<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarVersion extends Model
{
    use HasFactory;
    public function models(){
        return $this->hasOne(CarModel::class, 'id', 'model_id');
    }
}
