<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //table name
    protected $table = 'products';

    //Primary key
    public $PrimaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    protected $fillable = ['name', 'description', 'price', 'image'];
}
