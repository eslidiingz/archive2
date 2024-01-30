<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersAdmin;
use App\User;
use App\Shops;

use App\Http\Requests\admin\formAdd;
use App\Http\Requests\admin\formEdit;
use App\Banner;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    public function __construct(Request $request)
    {
        $this->folder = 'admin.banner.';
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
        $data['banner'] = Banner::where(function ($query) use ($request) {
            if ($request->txtSearch != "") {
                $query->where('title', 'like', '%' . $request->txtSearch . '%');
                $query->orWhere('detail', 'like', '%' . $request->txtSearch . '%');
            }
        })
            ->orderBy('status', 'asc')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
        $data['banner']->appends('search', $request->txtSearch);
        return view($this->folder . 'index', $data, compact('request'));
    }
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileNameWithExt = $request->file('images')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('images')->getClientOriginalExtension();
        $fileNameToStore = date('YmdHis') . '_' . $fileName . '.' . $extension;
        $banner = new Banner();
        $banner->title = $request->get('title');
        $banner->detail = $request->get('detail');
        $banner->url = $request->get('url');
        $banner->images = $request->file('images')->move('img/banner',$fileNameToStore);
        // $banner->images = $request->file('images')->move('storage/uploads/banner', $fileNameToStore);
        $banner->status = 99;
        $banner->admin_id = Auth::guard('admin')->user()->id;
        $banner->save();

        return redirect('/dashboard/banner')->with('success', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner =  Banner::find($id);
        return view('admin.banner.show', compact(['banner']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function edit($id)
    // {
    //    $newsCategory = Banner::find($id);
    //    return view('photo.edit',compact(['photo']));
    // }


    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact(['banner']));
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
        $banner = Banner::find($request->id);
        $banner->title = $request->title;
        $banner->detail = $request->detail;
        $banner->url = $request->url;
        $banner->status = $request->status;
        
        // dd($bannerFind);
        $banner->status = $request->get('status');
        $banner->admin_id = Auth::guard('admin')->user()->id;

        if ($request->hasFile('images')) {
            $fileNameWithExt = $request->file('images')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('images')->getClientOriginalExtension();
            $fileNameToStore = date('YmdHis') . '_' . $fileName . '.' . $extension;
            $banner->images = $request->file('images')->move('img/banner',$fileNameToStore);
            // $banner->images = $request->file('images')->move('storage/uploads/banner', $fileNameToStore);
        }
        $banner->save();
        return redirect('/dashboard/banner')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $banner = Banner::find($request->get('id'));
        $banner->delete();
        return redirect()->back()->with('success', 'Delete Successfully');
    }
}
