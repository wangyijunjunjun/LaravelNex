<?php
/**
 * Created by PhpStorm.
 * User: wangyijun
 * Date: 7/11/16
 * Time: 6:26 AM
 */

namespace App\Http\Controllers\Service;

use App\Entity\Category;
use App\Http\Controllers\Controller;
use App\Models\M3Result;

class BookController extends Controller
{
    public function getCategoryByParentId($category)
    {
        //需要返回产品类别
        $categorys = Category::where('parent_id', $category)->get();
        $m3_result = new M3Result();
        $m3_result->status = 0;
        $m3_result->message = '返回成功';
        $m3_result->categorys = $categorys;

        return $m3_result->toJson();
//        return ($categorys);
    }

}