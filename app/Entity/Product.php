<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //和数据库表绑定
    protected $table = 'product';
    protected $primaryKey = 'id';

}
