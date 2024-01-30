<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersAdmin;
use App\User;
use App\Shops;

use App\Http\Requests\admin\formAdd;
use App\Http\Requests\admin\formEdit;
use App\Kyc;
use Illuminate\Support\Facades\Auth;

class KycUserController extends Controller
{
    public function __construct(Request $request)
    {
        $this->folder = 'shop.kyc.';
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
        $data['kyc'] = Kyc::where(function ($query) use ($request) {
            if ($request->search != "") {
                $query->where('title', 'like', '%' . $request->search . '%');
                $query->orWhere('detail', 'like', '%' . $request->search . '%');
            }
        })
            ->where('user_id','=',Auth::user()->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
        $data['kyc']->appends('search', $request->search);
        return view($this->folder . 'index', $data);
    }
    public function create()
    {
        return view('shop.kyc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $fileNameWithExt1 = $request->file('image_first')->getClientOriginalName();
        // $fileName1 = pathinfo($fileNameWithExt1, PATHINFO_FILENAME);
        // $extension1 = $request->file('image_first')->getClientOriginalExtension();
        // $fileNameToStore1 = date('YmdHis') . '_' . $fileName1 . '.' . $extension1;

        $fileNameWithExt2 = $request->file('image_second')->getClientOriginalName();
        $fileName2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);
        $extension2 = $request->file('image_second')->getClientOriginalExtension();
        $fileNameToStore2 = date('YmdHis') . '_' . $fileName2 . '.' . $extension2;
        $kyc = new Kyc();
        $kyc->type_kyc = $request->get('type_kyc');
        $kyc->user_id = Auth::user()->id;
        $kyc->shop_id = $request->get('shop_id');

        $kyc->save();
        
        // $kyc->image_first = $request->file('image_first')->move('img/kyc', $fileNameToStore1);
        $kyc->image_second = $request->file('image_second')->move('img/kyc', $fileNameToStore2);

        if ($kyc->type_kyc == 1 ) {
            $fileNameWithExt5 = $request->file('image_fifth')->getClientOriginalName();
            $fileName5 = pathinfo($fileNameWithExt5, PATHINFO_FILENAME);
            $extension5 = $request->file('image_fifth')->getClientOriginalExtension();
            $fileNameToStore5 = date('YmdHis') . '_' . $fileName5 . '.' . $extension5;

            $kyc->image_fifth = $request->file('image_fifth')->move('img/kyc', $fileNameToStore5);
        } elseif ($kyc->type_kyc == 3 ) {

        } else {
            $fileNameWithExt3 = $request->file('image_third')->getClientOriginalName();
            $fileName3 = pathinfo($fileNameWithExt3, PATHINFO_FILENAME);
            $extension3 = $request->file('image_third')->getClientOriginalExtension();
            $fileNameToStore3 = date('YmdHis') . '_' . $fileName3 . '.' . $extension3;

            $fileNameWithExt4 = $request->file('image_fourth')->getClientOriginalName();
            $fileName4 = pathinfo($fileNameWithExt4, PATHINFO_FILENAME);
            $extension4 = $request->file('image_fourth')->getClientOriginalExtension();
            $fileNameToStore4 = date('YmdHis') . '_' . $fileName4 . '.' . $extension4;

            $fileNameWithExt5 = $request->file('image_fifth')->getClientOriginalName();
            $fileName5 = pathinfo($fileNameWithExt5, PATHINFO_FILENAME);
            $extension5 = $request->file('image_fifth')->getClientOriginalExtension();
            $fileNameToStore5 = date('YmdHis') . '_' . $fileName5 . '.' . $extension5;

            $kyc->image_third = $request->file('image_third')->move('img/kyc', $fileNameToStore3);
            $kyc->image_fourth = $request->file('image_fourth')->move('img/kyc', $fileNameToStore4);
            $kyc->image_fifth = $request->file('image_fifth')->move('img/kyc', $fileNameToStore5);
        }

        $kyc->status_first = 2;
        $kyc->status_second = 2;
        $kyc->status_third = 2;
        $kyc->status_fourth = 2;
        $kyc->status_fifth = 2;

        // dd($kyc);
        $kyc->save();
        return redirect('/shop/kyc')->with('success', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kyc =  Kyc::find($id);
        return view('admin.kyc.show', compact(['kyc']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function edit($id)
    // {
    //    $newsCategory = Kyc::find($id);
    //    return view('photo.edit',compact(['photo']));
    // }


    public function edit()
    {
        $kyc_edit = Kyc::where('user_id',Auth::user()->id)->first();
        // dd($kyc_edit);
        return view('shop.kyc.edit', compact(['kyc_edit']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function uploadImage($file)
    {
        $fileNameWithExt = $file->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = date('YmdHis') . '_' . $fileName . '.' . $extension;
        $images = $file->move('img/kyc', $fileNameToStore);
        return $images;
    }
    public function update(Request $request)
    {
        $kyc = Kyc::find($request->get('id'));
        $kyc->type_kyc = $request->get('type_kyc');
        $kyc->shop_id = $request->get('shop_id');
        $kyc->status_second = '2';
        if ($request->hasFile('image_first') && $kyc->status_first != 1) {
            $kyc->image_first = KycUserController::uploadImage($request->file('image_first'));
        }
        if ($request->hasFile('image_second') && $kyc->status_second != 1) {
            $kyc->image_second = KycUserController::uploadImage($request->file('image_second'));
        }
        if ($request->hasFile('image_third') && $kyc->status_third != 1) {
            $kyc->image_third = KycUserController::uploadImage($request->file('image_third'));
        }
        if ($request->hasFile('image_fourth') && $kyc->status_fourth != 1) {
            $kyc->image_fourth = KycUserController::uploadImage($request->file('image_fourth'));
        }
        if ($request->hasFile('image_fifth') && $kyc->status_fifth != 1) {
            $kyc->image_fifth = KycUserController::uploadImage($request->file('image_fifth'));
        }
        $kyc->save();
        return redirect('/shop/kyc')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $kyc = Kyc::find($request->get('id'));
        $kyc->delete();
        return redirect()->back()->with('success', 'Delete Successfully');
    }
}
