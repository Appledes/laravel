<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Entity\User;
use Hash;

class PostController extends Controller
{
    public function create(Request $request){ 
        
        //驗證
        $input = $request -> validate([
            'nickname'=>['required','max:50',],
            'email'=>['required','max:150','email',],
            'password'=>['required','same:password_confirmation','min:1',],
            'password_confirmation'=>['required','min:1',],
            'type'=>['required','in:G,A',],    
            ]);

        //加密
        $input['password']=bcrypt($request->password);
        //新增資料
        $Users=User::create($input);
        //將json輸入的東西顯示出來
        return response()->json(['User' => $Users]);
    }

    public function login(Request $request){ 
        
        //驗證
        $input=$request->only('email','password');
        
        $Users=User::where('email',$input['email'])->first();
        
        if (is_null($Users)){
            return response(['msg'=>'Email錯誤']);
        }

        if (!Hash::check($input['password'],$Users->password)){
            return response(['msg'=>'密碼錯誤']);
        }
        
        return response()->json([
            'id' => $Users->id,
            'nickname' => $Users->nickname,
            'msg' => '0'
        ]);
    }
}
