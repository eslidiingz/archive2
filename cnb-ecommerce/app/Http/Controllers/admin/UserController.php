<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsersAdmin;
use App\User;
use App\Shops;

use App\Http\Requests\admin\formAdd;
use App\Http\Requests\admin\formEdit;

class UserController extends Controller
{
	public function __construct(Request $request){
        $this->folder = 'admin.users.';
    	$this->arr = [];
        if(isset($request->name)){
			foreach ($request->all() as $key => $value) {
				if($key != 'id' && $key != '_token' && $key != 'password'){
					$this->arr[$key] = $value;
				}
				if($key == 'password' && $value != ''){
					$this->arr[$key] = bcrypt($value);
				}
			}
        }
    }
    public function index(Request $request){
    	// $data['users'] = User::
				 //    	where(function($query) use($request){
				 //    		if($request->search != ""){
				 //    			$query->where('name','like','%'.$request->search.'%');
				 //    			$query->orWhere('surname','like','%'.$request->search.'%');
				 //    			$query->orWhere('email','like','%'.$request->search.'%');
				 //    		}
				 //    	})
				 //    	->orderBy('name')
				 //    	->paginate(20);
    	$data['users'] = UsersAdmin::
    					where(function($query) use($request){
							if($request->search != ""){
				    			$query->where('name','like','%'.$request->search.'%');
				    			$query->orWhere('surname','like','%'.$request->search.'%');
				    			$query->orWhere('email','like','%'.$request->search.'%');
				    		}
    					})
				    	->orderBy('username')
				    	->orderBy('name')
				    	->paginate(10);
		$data['users']->appends('search',$request->search);
    	return view($this->folder.'list',$data,compact('request'));
    }
    public function create(Request $request){
    	return view($this->folder.'form');
    }
    public function store(formAdd $request){
		$insert = UsersAdmin::insert($this->arr);
		if($insert){
			return 'true';
		}
		return 'false';
    }
    public function edit(Request $request,$id){
		$data['status'] = 'true';
		$data['id'] = $id;
    	$data['user'] = UsersAdmin::
    					where('id',$id)
				    	->first();
		if(!$data['user']){
			$data['status'] = 'notfound';
		}
		return view($this->folder.'form',$data);
    }
    public function update(formEdit $request){
		$update = UsersAdmin::where('id',$request->id);
		
		$status_update = $update->update($this->arr);
		if($status_update){
			return 'true';
		}
		return 'false';
    }
    public function delete(Request $request){
		$data = UsersAdmin::where('id',$request->id)->first();
		if($data){
			$delete = UsersAdmin::where('id',$request->id)->delete();
			if($delete){
				return 'true';
			}
		}
		return 'false';
    }

	public function resetPassword(Request $request){
		// dd($request->id);
		if($request->id){
			$data['data'] = User::where('id',$request->id)->first();
			if($data['data']){
				$data['data']->shop = Shops::where('user_id',$data['data']->id)->first();
				return view('admin.resetPasswordUser',$data);
			}
		}
		return 'user not found';
    }
	public function resetPasswordCf(Request $request){
		$data['status'] = 'false';
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 8; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		// dd($request->id);
		if($request->id){
			$data['data'] = User::where('id',$request->id)->first();
			if($data['data']){
				$update = User::where('id',$request->id)->update([
					'password' => bcrypt($randomString)
				]);
				if($update){
					$data['status'] = 'true';
					$data['password'] = $randomString;
				}
			}
		}
		return $data;
    }
}
