<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'description',

    ];


/*
    public function categoryProducts()
    {
        
        return $this->hasMany(Product::class,'product_cat_id','id');
        return $this->belongsTo(Product::class,'product_cat_id','id');
        return $this->belongsTo('AppModelsCategory', 'ProductCategoryID', 'CategoryID');

    }*/
}
