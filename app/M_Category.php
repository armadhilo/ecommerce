<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['idcategory', 'categoty'];
}
