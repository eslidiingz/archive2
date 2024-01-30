<?php

namespace App\Http\Controllers\admin;

use App\NewsCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersAdmin;
use App\User;
use App\Shops;

use App\Http\Requests\admin\formAdd;
use App\Http\Requests\admin\formEdit;

class NewsCategoryController extends Controller
{
    public function __construct(Request $request)
    {
        $this->folder = 'admin.news_category.';
        $this->arr = [];
        if (isset($request->name)) {
            foreach ($request->all() as $key => $value) {
                if ($key != 'id' && $key != '_token' && $key != 'password') {
                    $this->arr[$key] = $value;
                }
                if ($key == 'password') {
                    $this->arr[$key] = bcrypt($value);
                }
            }
        }
    }
    public function index(Request $request)
    {
        $data['newsCategory'] = NewsCategory::where(function ($query) use ($request) {
            if ($request->txtSearch != "") {
                $query->where('name', 'like', '%' . $request->txtSearch . '%');
            }
        })
            ->orderBy('updated_at')
            ->orderBy('name')
            ->paginate(10);
        $data['newsCategory']->appends('search', $request->txtSearch);
        return view($this->folder . 'index', $data, compact('request'));
    }
    public function create()
    {
        return view('admin.news_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newsCategories = new NewsCategory();
        $newsCategories->name = $request->get('name');
        $newsCategories->save();

        return redirect('/dashboard/news-categories')->with('success', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsCategory =  NewsCategory::find($id);
        return view('admin.news_category.show', compact(['newsCategory']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function edit($id)
    // {
    //    $newsCategory = NewsCategory::find($id);
    //    return view('photo.edit',compact(['photo']));
    // }


    public function edit($id)
    {
        $newsCategory = NewsCategory::find($id);
        return view('admin.news_category.edit', compact(['newsCategory']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $newsCategories = NewsCategory::find($request->get('id'));
        $newsCategories->name = $request->get('name');
        $newsCategories->save();
        return redirect('/dashboard/news-categories')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $newsCategory = NewsCategory::find($request->get('id'));
        // dd($newsCategory->id);
        $newsCategory -> delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
