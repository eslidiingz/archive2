<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersAdmin;
use App\User;
use App\Shops;

use App\Http\Requests\admin\formAdd;
use App\Http\Requests\admin\formEdit;
use App\News;
use App\NewsCategory;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
	public function __construct(Request $request){
        $this->folder = 'admin.news.';
    	$this->arr = [];
        if(isset($request->name)){
			foreach ($request->all() as $key => $value) {
				if($key != 'id' && $key != '_token' && $key != 'password'){
					$this->arr[$key] = $value;
				}
				if($key == 'password'){
					$this->arr[$key] = bcrypt($value);
				}
			}
        }
    }
    public function index(Request $request)
    {
        $data['news'] = News::where(function ($query) use ($request) {
            if ($request->txtSearch != "") {
                $query->where('title','like','%'.$request->txtSearch.'%');
                $query->orWhere('detail','like','%'.$request->txtSearch.'%');
            }
        })
            ->orderBy('updated_at', 'desc')
            ->orderBy('title')
            ->paginate(5);
        $data['news']->appends('search', $request->txtSearch);
        return view($this->folder . 'index', $data, compact(['request']));
    }
    public function create()
    {
        $newsCategory = NewsCategory::all();
        return view('admin.news.create', compact(['newsCategory']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News();
        if ($request->hasFile('img_cover')){
            $fileNameWithExt = $request->file('img_cover')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img_cover')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis').'_c_'.$fileName.'.'.$extension;
            $news->img_cover = $request->file('img_cover')->move('img/news',$fileNameToStore);
            // $news->images = $request->file('images')->move('storage/uploads/news',$fileNameToStore);
        }
        if ($request->hasFile('images')){
            $fileNameWithExt = $request->file('images')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('images')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis').'_d_'.$fileName.'.'.$extension;
            $news->images = $request->file('images')->move('img/news',$fileNameToStore);
            // $news->images = $request->file('images')->move('storage/uploads/news',$fileNameToStore);
        }
        
        $news->title = $request->get('title');
        $news->detail = $request->get('detail');
        // $news->images = $request->file('images')->move('storage/uploads/news',$fileNameToStore);
        $news->status = 1;
        $news->news_category_id = $request->get('news_category_id');
        $news->admin_id = Auth::guard('admin')->user()->id;
        $news->save();

        return redirect('/dashboard/news')->with('success', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news =  News::find($id);
        return view('admin.news.show', compact(['news']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function edit($id)
    // {
    //    $newsCategory = News::find($id);
    //    return view('photo.edit',compact(['photo']));
    // }


    public function edit($id)
    {
        $news = News::find($id);
        $newsCategory = NewsCategory::all();
        return view('admin.news.edit', compact(['news','newsCategory']));
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
        $news = News::find($request->get('id'));
        $news->title = $request->get('title');
        $news->detail = $request->get('detail');
        $news->status = $request->get('status');
        $news->news_category_id = $request->get('news_category_id');
        $news->admin_id = Auth::guard('admin')->user()->id;

        if ($request->hasFile('img_cover')){
            $fileNameWithExt = $request->file('img_cover')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img_cover')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis').'_c_'.$fileName.'.'.$extension;
            $news->img_cover = $request->file('img_cover')->move('img/news',$fileNameToStore);
            // $news->images = $request->file('images')->move('storage/uploads/news',$fileNameToStore);
        }
        if ($request->hasFile('images')){
            $fileNameWithExt = $request->file('images')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('images')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis').'_d_'.$fileName.'.'.$extension;
            $news->images = $request->file('images')->move('img/news',$fileNameToStore);
            // $news->images = $request->file('images')->move('storage/uploads/news',$fileNameToStore);
        }
        $news->save();
        return redirect('/dashboard/news')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $news = News::find($request->get('id'));
        if ($news->img_cover != "") {
            // unlink('img/news/' . $news->img_cover);
            @unlink(public_path('/img/news/') . $news->img_cover);
        }
        if ($news->images != "") {
            @unlink(public_path('/img/news/') . $news->images);
        }
        // dd($newsCategory->id);
        $news -> delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
