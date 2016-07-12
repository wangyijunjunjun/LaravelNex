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
use Illuminate\Http\Request;
use App\Models\M3Result;

class CartController extends Controller
{
    public function addCart(Request $request, $product_id)
    {

        //添加到购物车,这里主要是两个步骤:1)更新界面  2)更新cookie

        $bk_cart = $request->cookie('bk_cart');
//        return $bk_cart;
        //$bk_cart = "1:3,2:2,3:1",所以要将它拆分
        $bk_cart_arr = ($bk_cart != null ? explode(',', $bk_cart) : array());

        //1)更新cookie($bk_cart_arr)
        $count = 1;
        foreach ($bk_cart_arr as &$value) {                         //传引用
            //拿到数组中的每个字符串,并且使用strpos（)来获取:的位置）
            $index = strpos($value, ":");
            if (substr($value, 0, $index) == $product_id) {
                $count = ((int)substr($value, ($index + 1))) + 1;
                $value = $product_id . ':' . $count;
                break;
            }
        }

        //如果经过遍历,$count还是为1的话,说明cookie里面原来没有这个product_id,就要新添加上
        if ($count == 1) {
            array_push($bk_cart_arr, $product_id . ':' . $count);
        }

        //返回更新后的cookie,在js代码中更新UI
        $m3_result = new M3Result();
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return response($m3_result->toJson())->withCookie('bk_cart', implode(',', $bk_cart_arr));
        //implode()重新将['1:3','2:2','3:1']转化为字符串'1:3,2:2,3:1'

    }

}