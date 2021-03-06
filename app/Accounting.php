<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    protected $fillable = [
        'country','zipcode','city','address','phone','name'
    ];
    
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
