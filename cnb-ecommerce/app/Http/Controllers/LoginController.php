<?php
        namespace App\Http\Controllers;
        use Illuminate\Routing\Controllers;
        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\DB;



    class LoginController extends Controller{

        protected $redirectTo = RouteServiceProvider::HOME;

        public function getIndex(){//check during logged in
            if(Auth::check()){
                if($USER_TYPE != 1){//don't be a admin
                    return view('pages.home'); //continue to home page
                }
            }
              else{
                    return view('pages.home');//Roll back to login page
                }
        }

            public function postProcess(Request $request){
                $email = $request->input('email');
                $pass = $request->input('password');
                if(Auth::attempt(['email' => $email,'password'=> $pass])){
                    $request->session()->put('data',$request->input());
                    // return $request->session()->get('data');
                }

                else{

                    return response()->json(['message'=>"Error!! Email or password Incorrect. Please try again"],400);
                }
            }
            public function logout() {
                Auth::logout();
                return view('pages.home');
              }
    }