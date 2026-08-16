<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $fillable = [

        'name',
        'status',
        'description',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
        //return $this->hasMany(Product::class,'store_id','id');
    }
    public function users()
    {
        return $this->hasMany(User::class);

    }
}
