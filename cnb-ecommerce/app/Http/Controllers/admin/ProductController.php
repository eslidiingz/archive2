<?php

namespace App\Http\Controllers\admin;

use App\PackType;
use App\DrugType;
use App\DrugTarget;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersAdmin;
use App\User;
use App\Shops;

use App\Http\Requests\admin\formAdd;
use App\Http\Requests\admin\formEdit;

class ProductController extends Controller
{
    public function __construct(Request $request)
    {
        $this->folder = 'admin.pack_type.';
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
    public function pack_type(Request $request)
    {
        $data['packType'] = PackType::where(function ($query) use ($request) {
            if ($request->search != "") {
                $query->where('name', 'like', '%' . $request->search . '%');
            }
        })
            ->orderBy('updated_at')
            ->orderBy('name')
            ->paginate(10);
        $data['packType']->appends('search', $request->search);
        return view($this->folder . 'index', $data);
    }
    public function pack_type_create()
    {
        return view('admin.pack_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pack_type_store(Request $request)
    {
        $packType = new PackType();
        $packType->name = $request->get('name');
        $packType->save();

        return redirect('/dashboard/pack-type')->with('success', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pack_type_show($id)
    {
        $packType =  PackType::find($id);
        return view('admin.pack_type.show', compact(['packType']));
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


    public function pack_type_edit($id)
    {
        $packType = PackType::find($id);
        return view('admin.pack_type.edit', compact(['packType']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pack_type_update(Request $request)
    {
        $packType = PackType::find($request->get('id'));
        $packType->name = $request->get('name');
        $packType->save();
        return redirect('/dashboard/pack-type')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function pack_type_destroy(Request $request)
    {
        $packType = PackType::find($request->get('id'));
        // dd($newsCategory->id);
        $packType -> delete();
        return redirect()->back()->with('success','Delete Successfully');
    }


    /*****************************************************************************************/
    public function drug_type(Request $request)
    {
        $data['drugType'] = DrugType::where(function ($query) use ($request) {
            if ($request->search != "") {
                $query->where('name', 'like', '%' . $request->search . '%');
            }
        })
            ->orderBy('updated_at')
            ->orderBy('name')
            ->paginate(10);
        $data['drugType']->appends('search', $request->search);
        return view('admin.drug_type.index', $data);
    }
    public function drug_type_create()
    {
        return view('admin.drug_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function drug_type_store(Request $request)
    {
        $drugType = new DrugType();
        $drugType->name = $request->get('name');
        $drugType->save();

        return redirect('/dashboard/drug-type')->with('success', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drug_type_show($id)
    {
        $drugType =  DrugType::find($id);
        return view('admin.drug_type.show', compact(['drugType']));
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


    public function drug_type_edit($id)
    {
        $drugType = DrugType::find($id);
        return view('admin.drug_type.edit', compact(['drugType']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drug_type_update(Request $request)
    {
        $drugType = DrugType::find($request->get('id'));
        $drugType->name = $request->get('name');
        $drugType->save();
        return redirect('/dashboard/drug-type')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function drug_type_destroy(Request $request)
    {
        $drugType = DrugType::find($request->get('id'));
        // dd($newsCategory->id);
        $drugType -> delete();
        return redirect()->back()->with('success','Delete Successfully');
    }

    /*****************************************************************************************/
    public function drug_target(Request $request)
    {
        $data['drugTarget'] = DrugTarget::where(function ($query) use ($request) {
            if ($request->search != "") {
                $query->where('name', 'like', '%' . $request->search . '%');
            }
        })
            ->orderBy('updated_at')
            ->orderBy('name')
            ->paginate(10);
        $data['drugTarget']->appends('search', $request->search);
        return view('admin.drug_target.index', $data);
    }
    public function drug_target_create()
    {
        return view('admin.drug_target.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function drug_target_store(Request $request)
    {
        $drugTarget = new DrugTarget();
        $drugTarget->name = $request->get('name');
        $drugTarget->save();

        return redirect('/dashboard/drug-target')->with('success', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drug_target_show($id)
    {
        $drugTarget =  DrugTarget::find($id);
        return view('admin.drug_target.show', compact(['drugTarget']));
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


    public function drug_target_edit($id)
    {
        $drugTarget = DrugTarget::find($id);
        return view('admin.drug_target.edit', compact(['drugTarget']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drug_target_update(Request $request)
    {
        $drugTarget = DrugTarget::find($request->get('id'));
        $drugTarget->name = $request->get('name');
        $drugTarget->save();
        return redirect('/dashboard/drug-target')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function drug_target_destroy(Request $request)
    {
        $drugTarget = DrugTarget::find($request->get('id'));
        // dd($newsCategory->id);
        $drugTarget -> delete();
        return redirect()->back()->with('success','Delete Successfully');
    }

}
