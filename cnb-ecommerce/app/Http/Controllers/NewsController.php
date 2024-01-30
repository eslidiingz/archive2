<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Product;
use App\User;
use App\Shops;
use App\rating;
use App\flash;
use App\Http\Controllers\tools\PseudoCryptController;
use Auth;
use Image;
use Session;
use File;
use Hash;
use App\invs;
use App\News;
use App\NewsCategory;
use App\PreOrder;
use App\Referal_users;
use App\shipping;
use App\SubCategory;
use Carbon\Traits\Timestamp;
use DateTime;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $data['news'] = News::where(function ($query) use ($request) {
            if ($request->search != "") {
                $query->where('title', 'like', '%' . $request->search . '%');
                $query->orWhere('detail', 'like', '%' . $request->search . '%');
            }
        })
            ->orderBy('updated_at', 'desc')
            ->orderBy('title')
            ->paginate(9);
        $data['news']->appends('search', $request->search);

        $dataCategory['newsCategory'] = NewsCategory::all();
        return view('pages.news.news', $data, $dataCategory);
    }

    public function indexDetail($id)
    {
        $news =  News::find($id);
        $newsRecommend = News::where('id', 'not like', $id)
        ->orderBy('updated_at', 'desc')
        ->paginate(4);
        return view('pages.news.news-detail', compact(['news', 'newsRecommend']));
    }

    public function indexCategories($id)
    {
        $newsCategory = NewsCategory::find($id);
        $news = News::where('news_category_id', 'like', $id)
        ->orderBy('updated_at', 'desc')
        ->paginate(5);
        return view('pages.news.news-categories', compact(['news', 'newsCategory']));
    }
}
