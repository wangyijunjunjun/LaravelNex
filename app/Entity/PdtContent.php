<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class PdtContent extends Model
{
    //和数据库表绑定
    protected $table = 'pdt_content';
    protected $primaryKey = 'id';

}
