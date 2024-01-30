<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\flash;
use App\invs;
use App\User;
use App\Award;
use App\balance;
use App\Transactions;


class RefundController extends Controller
{
    public function index(Request $request, $id){
    	$data['product'] = flash::where('id',$id)->first();
    	if($data['product']){
    		$data['id'] = $id;
    		$shop_id = $data['product']->shop_id;
    		$data['rows'] = [];
    		$invs = invs::where('status',2)
    						->where('shop_id',$shop_id)
    						->get();
    		// dd($invs);
    		foreach ($invs as $invs_key => $invs_value) {
    			foreach ($invs_value->inv_products as $product_key => $product_value) {
    				if($product_value['product_id'] == $id && $product_value['type'] == 'flashsale'){
    					$amount = $product_value['amount'];
		    			$key = array_keys(array_column($data['rows'], 'user_id'), $invs_value->user_id);
		    			if($key){
		    				$data['rows'][$key[0]]['amount'] += $amount;
		    			}else{
		    				$user = User::select('id','name','surname','email','phone')->where('id',$invs_value->user_id)->first();
		    				$temp = [
		    					'user_id' => $user->id,
		    					'amount' => $amount,
		    					'user' => $user
		    				];
		    				array_push($data['rows'],$temp);
		    			}
    				}
    				
    			}
    		}
    		// dd($data);
    		return view('admin.refund',$data);
    	}
    	dd('no data');
    }

    public function refund(Request $request, $id){
    	$data['status'] = 'false';
	 	$product = flash::where('id',$id)->first();
	 	if($product){
	 		$invs = invs::where('status',2)
    						->where('shop_id',$product->shop_id)
    						->get();
    		$arr = [];
    		foreach ($invs as $invs_key => $invs_value) {
    			$status = false;
    			$amout = 0;
    			$totalPrice = 0;

    			foreach ($invs_value->inv_products as $product_key => $product_value) {
    				if($product_value['product_id'] == $id && $product_value['type'] == 'flashsale'){
    					if(isset($arr[$invs_value->user_id])){
    						$arr[$invs_value->user_id]['amount'] += intval($product_value['amount']);
    						array_push($arr[$invs_value->user_id]['inv_ref'], '"'.$invs_value->inv_ref.'"');
    					}else{
    						$arr[$invs_value->user_id]['user_id'] = $invs_value->user_id;
    						$arr[$invs_value->user_id]['amount'] = intval($product_value['amount']);
    						$arr[$invs_value->user_id]['inv_ref'] = array('"'.$invs_value->inv_ref.'"');
    						$arr[$invs_value->user_id]['price'] = intval($product_value['price']);
    					}
    					$status = true;
    				}
    			}
    			if($status){
					$invs_value->update([
						'status' => 54
					]);
    			}
    		}
    		foreach ($arr as $key => $value) {
    			$inv_ref = '['.implode(',',$value['inv_ref']).']';

    			// if have user_id
    			if(in_array($value['user_id'], $request->user)){
					Award::insert([
						'user_id' => $value['user_id'],
						'product_id' => $product->id,
						'amount' => 1,
						'type' => 'win',
						'inv_ref' => $inv_ref,
						'price' => $value['price']
					]);
					$value['amount']--;
				}
				if($value['amount'] > 0){
					$totalRefund = $value['amount']*$value['price'];
					Award::insert([
						'user_id' => $value['user_id'],
						'product_id' => $product->id,
						'amount' => $value['amount'],
						'type' => 'lose',
						'inv_ref' => $inv_ref,
						'price' => $totalRefund
					]);
					$wallet = balance::where('user_id',$value['user_id'])->first();
					$wallet->update([
						'credit' => intval($wallet->credit)+$totalRefund
					]);
					Transactions::insert([
						'type' => 'wallet refund',
						'user_id' => $value['user_id'],
						'total' => $totalRefund,
						'status' => 2,
						'inv_id' => $inv_ref,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
					]);

				}
    		}
    		$data['status'] = 'true';
	 	}
		return $data;
    }
}
