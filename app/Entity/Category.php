<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //和数据库表绑定
    protected $table = 'category';
    protected $primaryKey = 'id';

}
