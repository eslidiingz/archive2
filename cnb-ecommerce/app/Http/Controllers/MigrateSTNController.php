<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invs;
use DateTime;
use App\Product;
use App\Category;
use App\SubCategory;
use App\balance;
use App\Order;
use App\Orderdetail;
use App\Payment;
use App\Paymenttype;
use App\Address;
use App\Province;
use App\flash;
use App\Mobilebanking;
use App\PreOrder;
use App\shipping;
use App\shipping_details;
use App\Transactions;
use App\shipping_type;
use App\Shops as shops;
use App\T10wallet;
use App\User;
use App\Wishlist;
use flashSales;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Date;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use stdClass;

class MigrateSTNController extends Controller {

    public function index(Request $request) {
        $a_dup_email = array('stang_sg92@hotmail.com','develop@mip.co.th','tuytuytuyza@hotmail.com','kornwatsatorn@hotmail.com','ch.chinjung@hotmail.com','pollathorn@hotmail.com','tan_071@hotmail.com','0851993756@gmail.com','watcharathat@gmail.com','myandmin_flook@hotmail.com','pongwud@hotmail.com','watcharathat@sparkts.com','craftster.z@gmail.com','info@sparkts.com','pongwudp@gmail.com','fernniee@hotmail.com','n_danial18@hotmail.com','mamamopangjibi@gmail.com','at56532@gmail.com','poo@multiinno.com','fluketoti@gmail.com','0851993759@gmail.com','0851993756@gmail.com','ieaui@hotmail.com','toeyjwrnrs@hotmail.com','0941541234@hotmail.com','dasds@dasdas.com','0123456789@gmail.com','0945678945@hotmail.com','papangkorn@hotmail.com');

        $a_dup_email = array('0945678945@hotmail.com','0123456789@gmail.com','dasds@dasdas.com','0941541234@hotmail.com');

        $s_dt = new DateTime();

        DB::connection('mysql2')->statement('DELETE FROM category WHERE category_id > 58');
        DB::connection('mysql2')->statement('TRUNCATE TABLE category_map_id');
        DB::connection('mysql2')->statement('ALTER TABLE category AUTO_INCREMENT = 10001');

        DB::connection('mysql2')->statement('DELETE FROM sub_category WHERE sub_category_id > 431');
        DB::connection('mysql2')->statement('TRUNCATE TABLE sub_category_map_id ');
        DB::connection('mysql2')->statement('ALTER TABLE sub_category AUTO_INCREMENT = 10001');

        DB::connection('mysql2')->statement('DELETE FROM users WHERE id > 3507');
        DB::connection('mysql2')->statement('TRUNCATE TABLE users_map_id ');
        DB::connection('mysql2')->statement('ALTER TABLE users AUTO_INCREMENT = 10001');

        DB::connection('mysql2')->statement('DELETE FROM addresses WHERE id > 496');
        DB::connection('mysql2')->statement('TRUNCATE TABLE addresses_map_id ');
        DB::connection('mysql2')->statement('ALTER TABLE addresses AUTO_INCREMENT = 10001');

        DB::connection('mysql2')->statement('DELETE FROM shops WHERE id > 2925');
        DB::connection('mysql2')->statement('TRUNCATE TABLE shops_map_id ');
        DB::connection('mysql2')->statement('ALTER TABLE shops AUTO_INCREMENT = 10001');

        DB::connection('mysql2')->statement('DELETE FROM product_s WHERE id > 10853');
        DB::connection('mysql2')->statement('TRUNCATE TABLE product_s_map_id ');
        DB::connection('mysql2')->statement('ALTER TABLE product_s AUTO_INCREMENT = 20001');

        DB::connection('mysql2')->statement('DELETE FROM shippings WHERE ship_id > 1132');
        DB::connection('mysql2')->statement('ALTER TABLE shippings AUTO_INCREMENT = 10001');

        DB::connection('mysql2')->statement('DELETE FROM shipping_details WHERE shipde_id > 2488');
        DB::connection('mysql2')->statement('TRUNCATE TABLE shipping_details_map_id ');
        DB::connection('mysql2')->statement('ALTER TABLE shipping_details AUTO_INCREMENT = 10001');

        DB::connection('mysql2')->statement('DELETE FROM invs WHERE id > 3488');
        DB::connection('mysql2')->statement('TRUNCATE TABLE invs_map_id ');
        DB::connection('mysql2')->statement('ALTER TABLE invs AUTO_INCREMENT = 10001');

        DB::connection('mysql2')->statement('DELETE FROM balances WHERE id > 1685');
        DB::connection('mysql2')->statement('TRUNCATE TABLE balance_map_id ');
        DB::connection('mysql2')->statement('ALTER TABLE balances AUTO_INCREMENT = 10001');

        $a_cat = Category::orderBy('category_id', 'asc')->get();
        if( sizeof( $a_cat ) > 0 ) {
            foreach ($a_cat as $k_cat => $v_cat) {
                $a_new_cat = array('category_name'              =>       $v_cat['category_name'],
                                    'description'           =>      $v_cat['description'],
                                    'digital'         =>      $v_cat['digital'],
                                    'banner'             =>      $v_cat['banner'],
                                    'data_brands'             =>      $v_cat['data_brands'],
                                    'data_vendors'              =>      $v_cat['data_vendors'],
                                    'data_subdets'                      =>      $v_cat['data_subdets']
                                );
                $i_new_cat_id = DB::connection('mysql2')->table('category')->insertGetId(
                    $a_new_cat
                );

                DB::connection('mysql2')->insert('insert into category_map_id (old_category_id, new_category_id) values (?, ?)', [$v_cat['category_id'], $i_new_cat_id]);

                // product_s
                $a_sub_cat = SubCategory::where('category', '=', $v_cat['category_id'])->get();
                if( sizeof( $a_sub_cat ) > 0 ) {
                    foreach ($a_sub_cat as $k_sub_cat => $v_sub_cat) {
                        $a_new_sub_cat = array('sub_category_name'             =>      $v_sub_cat['sub_category_name'],
                                            'category'                =>      $i_new_cat_id,
                                            'brand'               =>      $v_sub_cat['brand'],
                                            'digital'     =>      $v_sub_cat['digital'],
                                            'banner'            =>      $v_sub_cat['banner']
                                        );
                        $i_new_sub_cat_id = DB::connection('mysql2')->table('sub_category')->insertGetId(
                            $a_new_sub_cat
                        );
                        DB::connection('mysql2')->insert('insert into sub_category_map_id (old_sub_category_id, new_sub_category_id) values (?, ?)', [$v_sub_cat['sub_category_id'], $i_new_sub_cat_id]);
                    }
                }
            }
        }

        $a_user = User::get();
        $i_cnt = 1;
        foreach ($a_user as $k_user => $v_user) {
            echo $i_cnt.' - '.$v_user['name'].' - '.$v_user['surname'].' - '.$v_user['email'];

            $a_chk_user = DB::connection('mysql2')->table('users')->where('email', '=', $v_user['email'])->first();
            // echo '<pre>';
            // print_r($a_chk_user); 
            // echo '</pre>'; exit;

            if( isset( $a_chk_user ) ) {
                $i_new_user_id = $a_chk_user->id;
            } else {
                $a_new_user = array('name'              =>       $v_user['name'],
                                    'surname'           =>      $v_user['surname'],
                                    'user_type'         =>      $v_user['user_type'],
                                    'email'             =>      $v_user['email'],
                                    'phone'             =>      $v_user['phone'],
                                    'g_id'              =>      $v_user['g_id'],
                                    'f_id'                      =>      $v_user['f_id'],
                                    'email_verified_at'         =>      $v_user['email_verified_at'],
                                    'password'              =>      $v_user['password'],
                                    'user_pic'              =>      $v_user['user_pic'],
                                    'remember_token'        =>      $v_user['remember_token'],
                                    'created_at'            =>      $s_dt,
                                    'updated_at'            =>      $s_dt,
                                    'sex'                   =>      $v_user['sex'],
                                    'dateofbirth'           =>      $v_user['dateofbirth'],
                                    'type'                  =>      $v_user['type'],
                                    'kyc_pic'               =>      $v_user['kyc_pic'],
                                    'kyc_status'            =>      $v_user['kyc_status'],
                                    'wishlist'              =>      $v_user['wishlist'],
                                    'ref_code'              =>      $v_user['ref_code'],
                                    'bank_id'               =>      $v_user['bank_id'],
                                    'bank_number'           =>      $v_user['bank_number'],
                                    'bank_name'             =>      $v_user['bank_name'],
                                    'bank_category'         =>      $v_user['bank_category']
                                );
                $i_new_user_id = DB::connection('mysql2')->table('users')->insertGetId(
                    $a_new_user
                );
                DB::connection('mysql2')->insert('insert into users_map_id (old_user_id, new_user_id) values (?, ?)', [$v_user['id'], $i_new_user_id]);
            }

            // addresses
            $a_addr = Address::where('user_id', '=', $v_user['id'])->get();
            if( sizeof( $a_addr ) > 0 ) {
                foreach ($a_addr as $k_addr => $v_addr) {
                    $a_new_addr = array('user_id'             =>       $i_new_user_id,
                                        'name'                =>      $v_addr['name'],
                                        'surname'             =>      $v_addr['surname'],
                                        'tel'                 =>      $v_addr['tel'],
                                        'address1'            =>      $v_addr['address1'],
                                        'address2'            =>      $v_addr['address2'],
                                        'district'            =>      $v_addr['district'],
                                        'city'                =>      $v_addr['city'],
                                        'zipcode'             =>      $v_addr['zipcode'],
                                        'country'             =>      $v_addr['country'],
                                        'status'              =>      $v_addr['status'],
                                        'created_at'          =>      $s_dt,
                                        'updated_at'          =>      $s_dt,
                                        'status_address'      =>      $v_addr['status_address'],
                                        'latlong'             =>      $v_addr['latlong'],
                                        'is_last_ship'        =>      $v_addr['is_last_ship']
                                    );
                    $i_new_addr_id = DB::connection('mysql2')->table('addresses')->insertGetId(
                        $a_new_addr
                    );
                    DB::connection('mysql2')->insert('insert into addresses_map_id (old_addr_id, new_addr_id) values (?, ?)', [$v_addr['id'], $i_new_addr_id]);
                }
            }

            $a_shop = shops::where('user_id', '=', $v_user['id'])->get();
            if( sizeof( $a_shop ) > 0 ) {
                foreach ($a_shop as $k_shop => $v_shop) {
                    $a_new_shop = array('user_id'             =>      $i_new_user_id,
                                        'shop_name'           =>      $v_shop['shop_name'],
                                        'shop_pic'            =>      $v_shop['shop_pic'],
                                        'description'         =>      $v_shop['description'],
                                        'payment'             =>      $v_shop['payment'],
                                        't10_payment_id'      =>      $v_shop['t10_payment_id'],
                                        'bank_code'           =>      $v_shop['bank_code'],
                                        'bank_number'         =>      $v_shop['bank_number'],
                                        'Influencer'          =>      $v_shop['Influencer'],
                                        'created_at'          =>      $s_dt,
                                        'updated_at'          =>      $s_dt,
                                        'bank_name'           =>      $v_shop['bank_name'],
                                        'bank_category'       =>      $v_shop['bank_category'],
                                        'approve_shop'        =>      $v_shop['approve_shop'],
                                        'influence_date'      =>      $v_shop['influence_date'],
                                        'ship_period'         =>      $v_shop['ship_period'],
                                        'shop_sts'            =>      $v_shop['shop_sts']
                                    );
                    $i_new_shop_id = DB::connection('mysql2')->table('shops')->insertGetId(
                        $a_new_shop
                    );
                    DB::connection('mysql2')->insert('insert into shops_map_id (old_shop_id, new_shop_id) values (?, ?)', [$v_shop['id'], $i_new_shop_id]);

                    // product_s
                    $a_product = Product::where('shop_id', '=', $v_shop['id'])->get();
                    if( sizeof( $a_product ) > 0 ) {
                        foreach ($a_product as $k_product => $v_product) {
                            $a_new_product = array('shop_id'             =>      $i_new_shop_id,
                                                'name'                =>      $v_product['name'],
                                                'description'         =>      $v_product['description'],
                                                'category_id'         =>      $v_product['category_id'],
                                                'sub_category_id'     =>      $v_product['sub_category_id'],
                                                'brand_id'            =>      $v_product['brand_id'],
                                                'warranty_type'       =>      $v_product['warranty_type'],
                                                'product_unit'        =>      $v_product['product_unit'],
                                                'barcode'             =>      $v_product['barcode'],
                                                'product_weight'      =>      $v_product['product_weight'],
                                                'product_L'           =>      $v_product['product_L'],
                                                'product_W'           =>      $v_product['product_W'],
                                                'product_H'           =>      $v_product['product_H'],
                                                'product_option'      =>      json_encode( $v_product['product_option'] ),
                                                'product_img'         =>      json_encode( $v_product['product_img'] ),
                                                'created_at'          =>      $s_dt,
                                                'updated_at'          =>      $s_dt,
                                                'status_goods'        =>      $v_product['status_goods'],
                                                'sales'               =>      $v_product['sales'],
                                                'receive_product'     =>      $v_product['receive_product'],
                                                'note'                =>      $v_product['note'],
                                                'sold_amt'            =>      $v_product['sold_amt'],
                                                'rating'              =>      $v_product['rating'],
                                                'shipty_id'           =>      $v_product['shipty_id']
                                            );
                            // print_r($a_new_product);
                            $i_new_product_id = DB::connection('mysql2')->table('product_s')->insertGetId(
                                $a_new_product
                            );
                            DB::connection('mysql2')->insert('insert into product_s_map_id (old_product_id, new_product_id) values (?, ?)', [$v_product['id'], $i_new_product_id]);
                        }
                    }

                    // shippings
                    $a_shipping = shipping::where('shop_id', '=', $v_shop['id'])->get();
                    if( sizeof( $a_shipping ) > 0 ) {
                        foreach ($a_shipping as $k_shipping => $v_shipping) {
                            $a_new_shipping = array('shop_id'               =>      $i_new_shop_id,
                                                'ship_default'              =>      $v_shipping['ship_default'],
                                                'ship_price'                =>      $v_shipping['ship_price'],
                                                'shipde_id'                 =>      $v_shipping['shipde_id'],
                                                'shipty_id'                 =>      $v_shipping['shipty_id'],
                                                'ship_name'                 =>      $v_shipping['ship_name'],
                                                'created_at'                =>      $s_dt,
                                                'updated_at'                =>      $s_dt
                                            );
                            $i_new_shipping_id = DB::connection('mysql2')->table('shippings')->insertGetId(
                                $a_new_shipping
                            );
                        }
                    }

                    // shipping_details
                    $a_shipping_detail = shipping_details::where('shipty_id','=','4')->where('shop_id', '=', $v_shop['id'])->get();
                    if( sizeof( $a_shipping_detail ) > 0 ) {
                        foreach ($a_shipping_detail as $k_shipping_detail => $v_shipping_detail) {
                            $a_new_shipping_detail = array('shop_id'               =>      $i_new_shop_id,
                                                'shipde_price'                     =>      $v_shipping_detail['shipde_price'],
                                                'shipde_wide'                      =>      $v_shipping_detail['shipde_wide'],
                                                'shipde_high'                      =>      $v_shipping_detail['shipde_high'],
                                                'shipde_long'                      =>      $v_shipping_detail['shipde_long'],
                                                'shipde_weight'                    =>      $v_shipping_detail['shipde_weight'],
                                                'shipty_id'                        =>      $v_shipping_detail['shipty_id'],
                                                'created_at'                       =>      $s_dt,
                                                'updated_at'                       =>      $s_dt
                                            );
                            $i_new_shipping_detail_id = DB::connection('mysql2')->table('shipping_details')->insertGetId(
                                $a_new_shipping_detail
                            );
                            DB::connection('mysql2')->insert('insert into shipping_details_map_id (old_ship_detail_id, new_ship_detail_id) values (?, ?)', [$v_shipping_detail['shipde_id'], $i_new_shipping_detail_id]);
                        }
                    }
                }
            }

            // BALANCE
            if( $i_new_user_id > 10000 ) {
                $a_balance = Balance::where('user_id', '=', $i_new_user_id)->get();
                if( sizeof( $a_balance ) > 0 ) {
                    foreach ($a_balance as $k_balance => $v_balance) {
                        $a_new_balance = array('user_id'             =>       $i_new_user_id,
                                            'credit'                 =>      $v_balance['credit'],
                                            'point'                  =>      $v_balance['point'],
                                            'coin'                   =>      $v_balance['coin'],
                                            'seller_credit'          =>      $v_balance['seller_credit'],
                                            'created_at'             =>      $s_dt,
                                            'updated_at'             =>      $s_dt,
                                            'status'                 =>      $v_balance['status']
                                        );
                        $i_new_balance_id = DB::connection('mysql2')->table('balances')->insertGetId(
                            $a_new_balance
                        );
                        DB::connection('mysql2')->insert('insert into balance_map_id (old_balance_id, new_balance_id) values (?, ?)', [$v_balance['id'], $i_new_balance_id]);
                    }
                }
            } else {
                echo ' Balance user id - '.$i_new_user_id;
            }
            echo '<hr>';
            $i_cnt++;
        }

        $a_user_mapping = $a_key_user = array();
        $r_user_mapping = DB::connection('mysql2')->table('users_map_id')->get();
        if( sizeof( $r_user_mapping ) > 0 ) {
            foreach ($r_user_mapping as $k_user_mapping => $v_user_mapping) {
                $a_user_mapping[$v_user_mapping->old_user_id] = $v_user_mapping->new_user_id;
            }
        }
        $a_key_user = array_keys($a_user_mapping);
        // echo '<pre>';
        // print_r($a_user_mapping);
        // echo '</pre>'; exit;

        $a_shop_mapping = $a_key_shop = array();
        $r_shop_mapping = DB::connection('mysql2')->table('shops_map_id')->get();
        if( sizeof( $r_shop_mapping ) > 0 ) {
            foreach ($r_shop_mapping as $k_shop_mapping => $v_shop_mapping) {
                $a_shop_mapping[$v_shop_mapping->old_shop_id] = $v_shop_mapping->new_shop_id;
            }
        }
        $a_key_shop = array_keys($a_shop_mapping);

        $a_product_mapping = $a_key_product = array();
        $r_product_mapping = DB::connection('mysql2')->table('product_s_map_id')->get();
        if( sizeof( $r_product_mapping ) > 0 ) {
            foreach ($r_product_mapping as $k_product_mapping => $v_product_mapping) {
                $a_product_mapping[$v_product_mapping->old_product_id] = $v_product_mapping->new_product_id;
            }
        }
        $a_key_product = array_keys($a_product_mapping);

        $a_invs = invs::get();
        if( sizeof( $a_invs ) > 0 ) {
            foreach ($a_invs as $k_invs => $v_invs) {
                echo $v_invs['inv_ref'].'<hr>';

                if( in_array( $v_invs['user_id'], $a_key_user) ) {
                    $v_invs['user_id'] = $a_user_mapping[$v_invs['user_id']];
                }
                if( in_array( $v_invs['shop_id'], $a_key_shop) ) {
                    $v_invs['shop_id'] = $a_shop_mapping[$v_invs['shop_id']];
                }
                // echo gettype($v_invs['inv_products']); exit;
                if( sizeof( $v_invs['inv_products'] ) > 0 ) {
                    foreach ($v_invs['inv_products'] as $k_inv_product => $v_inv_product) {
                        // echo $v_inv_product['product_id'].'<hr>';
                        $v_invs['inv_products'][$k_inv_product]['product_id'] = $a_key_product[$v_inv_product['product_id']];
                    }
                }
                $s_inv_product = json_encode( $v_invs['inv_products'] );

                $a_new_invs = array('inv_ref'                          =>      $v_invs['inv_ref'],
                                    'user_id'                          =>      $v_invs['user_id'],
                                    'shop_id'                          =>      $v_invs['shop_id'],
                                    'inv_products'                     =>      $s_inv_product,
                                    'shipping_cost'                    =>      $v_invs['shipping_cost'],
                                    'payment'                          =>      $v_invs['payment'],
                                    'campaign_id'                      =>      $v_invs['campaign_id'],
                                    'shipping_id'                      =>      $v_invs['shipping_id'],
                                    'tracking_number'                  =>      $v_invs['tracking_number'],
                                    'track_at'                         =>      $v_invs['track_at'],
                                    'total'                            =>      $v_invs['total'],
                                    'note'                             =>      $v_invs['note'],
                                    'coupon_id'                        =>      $v_invs['coupon_id'],
                                    'status'                           =>      $v_invs['status'],
                                    'shipping_note'                    =>      $v_invs['shipping_note'],
                                    'created_at'                       =>      $s_dt,
                                    'updated_at'                       =>      $s_dt,
                                    'address'                          =>      $v_invs['address'],
                                    'transfer_img'                     =>      $v_invs['transfer_img'],
                                    'rating_peview'                    =>      $v_invs['rating_peview'],
                                    'transfer_slip'                    =>      $v_invs['transfer_slip'],
                                    'uidmp'                            =>      $v_invs['uidmp'],
                                    'inv_no'                           =>      $v_invs['inv_no'],
                                    'shipty_id'                        =>      $v_invs['shipty_id'],
                                    'total_weight'                     =>      $v_invs['total_weight']
                                    
                                );
                $i_new_inv_id = DB::connection('mysql2')->table('invs')->insertGetId(
                    $a_new_invs
                );
                DB::connection('mysql2')->insert('insert into invs_map_id (old_inv_id, new_inv_id) values (?, ?)', [$v_invs['id'], $i_new_inv_id]);
            }

            $i_cnt++;
        }

        $r_inv_ref_dup = DB::connection('mysql2')->table('invs')->where( DB::raw('inv_ref IN (select inv_ref from invs where id < 10000) ') )->get();
        if( sizeof( $r_inv_ref_dup ) > 0 ) {
            foreach ($r_inv_ref_dup as $k_inv_ref_dup => $v_inv_ref_dup) {
                echo 'INV Duplicate: '.$v_inv_ref_dup['inv_ref'].'<hr>';
            }
        }
        exit;
    }

    public function add(Request $request) {
        $time = new DateTime();
    }
}
