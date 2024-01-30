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

class KycController extends Controller
{
    public function __construct(Request $request)
    {
        $this->folder = 'admin.kyc.';
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
        $data['kyc_admin'] = Kyc::join('users', 'users.id', '=', 'kyc_m.user_id')
        ->leftJoin('shops', 'shops.user_id', '=', 'kyc_m.user_id')
        ->select('users.name','users.surname','kyc_m.*','shops.shop_name','shops.bank_code','shops.bank_number','shops.bank_name','shops.bank_category')
            ->where(function ($query) use ($request) {
                if ($request->txtSearch != "") {
                    $query->where('users.name', 'like', '%' . $request->txtSearch . '%');
                    $query->orWhere('users.surname', 'like', '%' . $request->txtSearch . '%');
                }
            })
            ->orderBy('kyc_m.updated_at', 'desc')
            ->paginate(10);
        $data['kyc_admin']->appends('search', $request->txtSearch);
        // dd($kyc_admin);
        return view($this->folder . 'index' , $data, compact(['request']));
    }

    public function create()
    {
        return view('admin.kyc.create');
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
        $kyc = new Kyc();
        $kyc->title = $request->get('title');
        $kyc->detail = $request->get('detail');
        $kyc->url = $request->get('url');
        $kyc->images = $request->file('images')->move('img/kyc', $fileNameToStore);
        $kyc->images = $request->file('images')->move('img/kyc', $fileNameToStore);
        $kyc->images = $request->file('images')->move('img/kyc', $fileNameToStore);
        $kyc->images = $request->file('images')->move('img/kyc', $fileNameToStore);
        $kyc->images = $request->file('images')->move('img/kyc', $fileNameToStore);

        // $kyc->status_first = $request->get('status_first');
        $kyc->status_second = $request->get('status_second');
        // $kyc->status_third = $request->get('status_third');
        // $kyc->status_fourth = $request->get('status_fourth');
        // $kyc->status_fifth = $request->get('status_fifth');
        $kyc->admin_id = Auth::guard('admin')->user()->id;
        $kyc->save();

        return redirect('/dashboard/kyc')->with('success', 'Create Successfully');
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

    public function edit($id)
    {
        $kyc_admin = Kyc::find($id);
        return view('admin.kyc.edit', compact(['kyc_admin']));
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
        $kyc = Kyc::find($request->get('id'));
        // $kyc->status_first = $request->get('status_first');
        $kyc->status_first = $request->get('status_second');
        $kyc->status_second = $request->get('status_second');
        $kyc->status_third = $request->get('status_third');
        $kyc->status_fourth = $request->get('status_fourth');
        $kyc->status_fifth = $request->get('status_fifth');
        $kyc->admin_id = Auth::guard('admin')->user()->id;

        $o_shop = Shops::find($kyc->shop_id);

        $kyc->save();
// echo $kyc->type_kyc.' - '.$kyc->status_first.' - '.$kyc->status_second; exit;
        $s_shop_kyc_status = 'unapprove';
        if( $kyc->type_kyc == '1' ) {
            if( $kyc->status_first == '1' && $kyc->status_second == '1' && $kyc->status_fifth == '1' ) {
                $s_shop_kyc_status = 'approve';
            }
        } elseif( $kyc->type_kyc == '3' ) {
            // if( $kyc->status_first == '1' && $kyc->status_second == '1' ) {
            //     $s_shop_kyc_status = 'approve';
            // }
            if( $kyc->status_second == '1' ) {
                $s_shop_kyc_status = 'approve';
            }
        } elseif( $kyc->type_kyc == '2' ) {
            if( $kyc->status_first == '1' && $kyc->status_second == '1' && $kyc->status_third == '1' && $kyc->status_fourth == '1' && $kyc->status_fifth == '1' ) {
                $s_shop_kyc_status = 'approve';
            }
        }
        $o_shop->kyc_status = $s_shop_kyc_status;
        $o_shop->updated_at = date('Y-m-d H:i:s');
        $o_shop->save();
        
        return redirect('/dashboard/kyc')->with('success', 'Update Successfully');
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
