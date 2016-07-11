<?php
/**
 * Created by PhpStorm.
 * User: wangyijun
 * Date: 7/11/16
 * Time: 6:26 AM
 */

namespace App\Http\Controllers\View;

use App\Entity\Category;
use App\Entity\PdtContent;
use App\Entity\PdtImages;
use App\Entity\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;

class BookController extends Controller
{
    public function toCategory(Request $request)
    {
        //需要返回产品类别

        Log::info('进入书籍类别');

        $categorys = Category::whereNull('parent_id')->get();
        return view('category')->with('categorys', $categorys);
//        return ($categorys);
    }

    //得到类别下面的products
    public function toProduct($category_id)
    {
        $products = Product::where('category_id', $category_id)->get();
        return view('product')->with('products', $products);
//        return $products;
    }

    public function toPdt_content($product_id)
    {
        $product = Product::find($product_id);
        $pdt_content = PdtContent::where('product_id', $product_id)->first();
        $pdt_images = PdtImages::where('product_id', $product_id)->get();
        return view('pdt_content')->with('product', $product)->with('pdt_content', $pdt_content)->with('pdt_images', $pdt_images);

//        return $pdt_images;
    }

}