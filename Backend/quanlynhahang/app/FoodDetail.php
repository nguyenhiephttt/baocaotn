<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodDetail extends Model
{
    //
    protected $table='fooddetail';
    protected $primaryKey = 'FOOD_ID';
    protected $fillable=[
        'FOOD_ID',
        'MATERIAL_ID',
        'FOODDETAIL_QUANTILY'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function Food(){
        return $this->belongsTo('App\Foods','FOOD_ID');
    }

    public function Materials(){
        return $this->belongsTo('App\Materials', 'MATERIAL_ID','MATERIAL_ID');
    }
}
