<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;
use App\rating;
use App\flash;
use Carbon\Carbon;

class WelcomeControllerNew extends Controller
{
    public $request;

    public function index()
    {
        $category_all = [];
        $category =  Category::orderBy('category_name', 'ASC')->get();
        // $product_all = Product::orderBy('created_at','DESC')->take(18)->get();
        $product_all = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')->inRandomOrder()->paginate(30);

        $s_product_type = $this->request->product_type;
        $s_sort_by = $this->request->sort_by;
        // echo $s_product_type; exit;
        $product_neww = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)
                        ->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')
                        ->when($s_product_type, function ($query, $s_product_type) {
                            if( $s_product_type == 'best_sale' ) {
                                return $query->orderBy('sold_amt', 'desc');
                            } else {
                                return $query->orderBy('created_at', 'desc');
                                // return $query->where(DB::raw("DATEDIFF(now(), created_at) < 8"));
                            }
                        })
                        ->when($s_sort_by, function ($query, $s_product_type) {
                            if( $s_product_type == 'price_asc' ) {
                                return $query->orderBy(DB::raw("CAST(TRIM(BOTH '\"' FROM (JSON_EXTRACT(product_option, '$.price[0]')) ) AS DECIMAL(10,2))"), 'asc');
                            } elseif( $s_product_type == 'price_desc' ) {
                                return $query->orderBy(DB::raw("CAST(TRIM(BOTH '\"' FROM (JSON_EXTRACT(product_option, '$.price[0]')) ) AS DECIMAL(10,2))"), 'desc');
                            }
                        })
                        // ->toSql();
                        // echo $product_neww; exit;
                        ->paginate(120);
        foreach ($category as $key => $value) {
            $categoryCount = Product::where('category_id',$value->category_id)->count();
            if($categoryCount > 0){
                if ($value->data_subdets != "[]") {
                    $value['data_subdets'] = json_decode($value->data_subdets);
                } else {
                    $value['data_subdets'] = [['sub_name' => 'no', 'sub_id' => 'no']];
                }
                array_push($category_all, json_decode($value));
            }
        }

        $user_all = User::where('id', 4)->get();
        // return $category_all;
        // return view('pages.home', compact('category_all','product_all','user_all'));
        // return view('new_ui.product-new', compact('category_all','product_all','user_all'));
        return ['category_all' => $category_all, 'product_all' => $product_all, 'user_all' => $user_all, 'product_neww' => $product_neww, 'product_type' => $s_product_type, 'sort_by' => $s_sort_by];
    }

    public function flashSeller()
    {
        $time_end = flash::select('end_date')
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->orderBy('end_date')->first();
        $flash_all[0] = flash::where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->where('status', '!=', 'unenabled')
            ->orderBy('product_pin', 'desc')
            ->inRandomOrder()->paginate(18);

        $flash_all[1] = flash::where('time_period', 'like', '%1%')
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->where('status', '!=', 'unenabled')
            ->orderBy('product_pin', 'desc')
            ->inRandomOrder()->paginate(18);

        $flash_all[2] = flash::where('time_period', 'like', '%2%')
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->where('status', '!=', 'unenabled')
            ->orderBy('product_pin', 'desc')
            ->inRandomOrder()->paginate(18);

        $flash_all[3] = flash::where('time_period', 'like', '%3%')
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->where('status', '!=', 'unenabled')
            ->orderBy('product_pin', 'desc')
            ->inRandomOrder()->paginate(18);

        foreach ($flash_all as $key => $value) {
            foreach ($value as $key_val => $value_val) {
                $flash_all[$key][$key_val]->price = min($value_val->product_option['price']);
                $flash_all[$key][$key_val]->discount = max($value_val->product_option['discount']);
                $flash_all[$key][$key_val]->sale = array_sum($value_val->product_option['amount']) - array_sum($value_val->product_option['stock']);
                $flash_all[$key][$key_val]->percent = ($flash_all[$key][$key_val]->sale / array_sum($value_val->product_option['amount'])) * 100;
            }
        }
        // dd($time_end);

        return view('pages.flash-sale', compact('flash_all', 'time_end'));
    }

    public function bestSeller()
    {
        $category_all = $this->index()['category_all'];
        $product_all = $this->index()['product_all'];
        $user_all = $this->index()['user_all'];
        $rating_group = rating::all();

        return view('pages.best-seller', compact('category_all', 'product_all', 'user_all', 'rating_group'));
    }
    public function productNew(Request $request)
    {
        $category_all = [];
        $category = Category::get();
        foreach ($category as $key => $value) {
            $categoryCount = Product::where('category_id', $value->category_id)->count();
            if ($value->data_subdets != "[]") {
                $sub = SubCategory::where('category', $value->category_id)->select('sub_category_name as sub_name', 'sub_category_id as sub_id')->get();
                $value['data_subdets'] = $sub;
            } else {
                $value['data_subdets'] = [['sub_name' => 'ไม่พบ', 'sub_id' => 'no']];
            }
            array_push($category_all, json_decode($value));
        }

        $this->request = $request;
        $user_all = $this->index()['user_all'];
        $s_product_type = $this->request->product_type;
        $s_sort_by = $this->request->sort_by;

        $product_neww = Product::where('status_goods', '!=', '2')->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)
                        ->where('status_goods', '!=', '99')->where('status_goods', '!=', '3')
                        ->whereDate('created_at', '>=', Carbon::now()->subDays(7))
                        ->whereDate('created_at', '<=', Carbon::now())
                        ->paginate(120);
                        // dd($product_neww);
                        // dd(Carbon::now()->subDays(7));
        $product_type = $this->index()['product_type'];
        $sort_by = $this->index()['sort_by'];
        $rating_group = rating::all();

        return view('pages.product-new', compact('category_all', 'user_all', 'product_neww', 'rating_group', 'product_type', 'sort_by'));
    }

    public function giftdata()
    {
        $gift = Product::where('status_goods', '!=', '2')
            ->where('status_goods', '!=', '3')
            ->where('status_goods', '!=', '99')
            ->where('sub_category_id', '419')
            ->where(DB::raw("JSON_EXTRACT(product_option, '$.price[0]')"), '>', 0)
            ->orderBy('created_at', 'ASC')
            ->paginate(30);

        foreach ($gift as $key => $value) {
            $gift[$key]->price = min($value->product_option['price']);
        }
        $rating_group = rating::all();
        // dd($gift);
        return view('pages.gift', compact('gift', 'rating_group'));
    }


    //    @if ($product_neww->hasPages())
    //             <ul class="pagination">
    //                 {{-- Previous Page Link --}}

    //                 @if ($product_neww->onFirstPage())
    //                 <li class="disabled align-self-center"><span class="mr-1"> &#60;&#60; </span></li>
    //                 <li class="disabled align-self-center"><span class="mr-1"> &#60; </span></li>
    //                 @else <li class=" align-self-center mr-1"><a href="{{ $product_neww->url(1) }}" rel="prev">
    //                         &#60;&#60; </a>
    //                 <li class=" align-self-center mr-1"><a href="{{ $product_neww->previousPageUrl() }}" rel="prev">
    //                         &#60; </a>
    //                 </li> @endif @foreach(range(1, $product_neww->lastPage()) as $i)
    //                 @if($i >= $product_neww->currentPage() - 2 && $i <= $product_neww->currentPage()+2)
    //                     @if ($i == $product_neww->currentPage())
    //                     <li style="border: solid 1px #dedede;
    //                         width: 30px;
    //                         text-align: center;
    //                         border-radius: 3px;
    //                         background: #42294f;
    //                         color:white;
    //                         font-family: Kanit;
    //                         font-weight: 600;
    //                         font-size: 20px;
    //                         " class="active mr-1 "><span>{{ $i }}</span></li>
    //                     @else
    //                     <li style="border: solid 1px #dedede;
    //                         width: 30px;
    //                         text-align: center;
    //                         border-radius: 3px;
    //                         background: white;
    //                         font-family: Kanit;
    //                         font-weight: 600;
    //                         font-size: 20px;" class="mr-1"><a href="{{ $product_neww->url($i) }}">{{ $i }}</a></li>
    //                     @endif
    //                     @endif
    //                     @endforeach


    //                     {{-- Next Page Link --}}
    //                     @if ($product_neww->hasMorePages())
    //                     <li class="align-self-center ml-1"><a href="{{ $product_neww->nextPageUrl() }}" rel="next"> &#62;
    //                         </a>
    //                     </li>
    //                     <li class="align-self-center ml-1"><a href="{{ $product_neww->url($product_neww->lastPage()) }}"
    //                             rel="next"> &#62;&#62; </a></li>

    //                     @else
    //                     <li class="disabled align-self-center ml-1"><span> &#62; </span></li>
    //                     <li class="disabled align-self-center ml-1"> &#62;&#62; </a></li>

    //                     @endif

    //             </ul>
    //             @endif
}
