<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use Illuminate\Support\Facades\DB;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        $locale = Session::get('locale');
        if( $locale == 'en' ) {
            $breadcrumb_item = array(['name'=>'All categories','link'=>'/category']);
        } else {
            $breadcrumb_item = array(['name'=>'หมวดหมู่ทั้งหมด','link'=>'/category']);
        }
        

        $category_all = [];

        // $other = Category::where('category_name','=','อื่นๆ')->orderBy('category_name','ASC')->get();
        // $category1 = Category::where('category_name','!=','อื่นๆ')->orderBy('category_name','ASC')->get();
        // $category = $category1->push($other[0]);
        $category = Category::orderBy('category_name','asc')->get();

        foreach ($category as $key => $value) {
            $categoryCount = Product::where('category_id',$value->category_id)->where('status_goods','1')->count();
            // if($categoryCount > 0){
                if($value->data_subdets!="[]"){
                    $other = SubCategory::where('category',$value->category_id)->where('sub_category_name','=','อื่นๆ')
                        ->select('sub_category_name as sub_name','sub_category_name_en as sub_name_en','sub_category_id as sub_id')
                        ->selectRaw('(SELECT COUNT(id) FROM product_s WHERE product_s.sub_category_id = sub_category.sub_category_id and product_s.status_goods=1) AS product_count');
                    $sub = SubCategory::where('category',$value->category_id)->where('sub_category_name','!=','อื่นๆ')
                        ->select('sub_category_name as sub_name','sub_category_name_en as sub_name_en','sub_category_id as sub_id')
                        ->selectRaw('(SELECT COUNT(id) FROM product_s WHERE product_s.sub_category_id = sub_category.sub_category_id and product_s.status_goods=1) AS product_count')
                            ->orderBy('sub_category_name','ASC')->union($other)->get();
                    $value['data_subdets'] = $sub;
                }else{
                    $value['data_subdets'] = [['sub_name'=>'','sub_name_en'=>'','sub_id'=>'']];
                }
                $value['productCount'] = $categoryCount;
                array_push($category_all,json_decode($value));
            // }
        }
        // dd($category_all);
        // return $category_all;
        // $category_all=(object)$category_all;
        return view('pages.category', compact('category_all','breadcrumb_item'));
    }
}