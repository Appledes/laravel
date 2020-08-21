<?php

//命名空間
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator; //驗證器
use Hash; //雜湊
use App\Shop\Entity\User; //使用者Eloquent ORM Model
//use DB;

class UserAuthController extends Controller{

     //登入
     public function signInPage(){
        $binding=[
            'title'=>'登入',
        ];
        return view('auth.signIn',$binding);
    }

      //處理登入資料
      public function signInProcess(){
        //接收輸入資料
        $input=request()->all();

        //驗證規則
        $rules=[
            //Email
            'email'=>[
                'required',
                'max:150',
                'email'
            ],

            //密碼
            'password'=>[
                'required',
                'min:1',
            ],

        ];

        //啟用紀錄SQL語法
        // DB::connection()->enableQueryLog();

        //撈取使用者資料
        $User=User::where('email',$input['email'])->firstOrFail();
                //  ->where('type','G')
                //  ->firstOrFail();  
      
        //列印出資料庫目前所有執行的SQL語法
        //dd(DB::getQueryLog());
        //exit;

        //檢查密碼是否正確
        $is_password_correct=Hash::check($input['password'],$User->password);

        if(!$is_password_correct){
            //密碼錯誤回傳錯誤訊息
            $error_message=[
                'msg'=>[
                   '密碼驗證錯誤'
               ],
           ];
           return redirect('/user/auth/sign-in')
                ->withErrors($error_message)
                ->withInput(); 
              
       }
            //session紀錄會員編號
            session()->put('user_id',$User->id);

            //重新導向到原先使用者造訪頁面,沒有嘗試造訪頁則重新導向回首頁
            return redirect()->intended('/user/auth/sign-in');
           
        $validator=Validator::make($input,$rules);
            if($validator->fails()){
                //資料驗證錯誤
                return redirect('/user/auth/sign-in')
                    ->withErrors($validator)
                    ->withInput();          
            }
            
          
    }

    //註冊頁
    public function signUpPage(){
        $binding=[
            'title'=>'註冊',
        ];
        return view('auth.signUp',$binding);
    }

    //處理註冊資料
    public function signUpProcess(){ 
        
        //接收輸入資料
        $input=request()->all();
        //var_dump('$input');
        //exit;

        //驗證規則
        $rules=[
            //暱稱
            'nickname'=>[
                'required',
                'max:50',
            ],
            //Email
            'email'=>[
                'required',
                'max:150',
                'email',
            ],
            
            //密碼
            'password'=>[
                'required',
                'same:password_confirmation',
                'min:1',
            ],

            //密碼驗證
            'password_confirmation'=>[
                'required',
                'min:1',
            ],

            //帳號類型
            'type'=>[
                'required',
                'in:G,A',
            ],

        ];

        //驗證資料
        $validator=Validator::make($input,$rules);

        if($validator->fails()){
            //資料驗證錯誤
            return redirect('/user/auth/sign-up')
                ->withErrors($validator)
                ->withInput();          
        }

        //密碼加密
        $input['password']=Hash::make($input['password']);

        //新增會員資料
        $Users=User::create($input);
        
        //寄送註冊通知信

    }

    //登出
    public function signOut(){
        //處理登出資料
        session()->forget('user_id');

        
        $binding=[
            'title'=>'登出',
        ];
       
        return view('auth.signOut',$binding);
    } 
    
}

   















































  