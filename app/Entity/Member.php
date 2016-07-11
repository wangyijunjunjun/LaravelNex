<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //和数据库表绑定
    protected $table = 'member';
    protected $primaryKey = 'id';


}
