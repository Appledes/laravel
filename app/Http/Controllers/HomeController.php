<?php

//命名空間
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator; //驗證器
use Hash; //雜湊
use App\Shop\Entity\User; //使用者Eloquent ORM Model
//use DB;

class HomeController extends Controller{
    //首頁
    public function indexPage(){
        $binding=[
            'title'=>'首頁',
        ];
        return view('auth.home',$binding);
    }
}
