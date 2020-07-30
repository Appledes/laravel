<?php

//首頁
Route::get('/','HomeController@indexPage');

//使用者
Route::group(['prefix' => 'user'],function(){
     //使用者驗證
    Route::group(['prefix' => 'auth'],function(){
        //使用者註冊頁面
        Route::get('/sign-up', 'UserAuthController@signUpPage');

        //使用者資料新增
        Route::post('/sign-up', 'UserAuthController@signUpProcess');

        //使用者登入頁面
        Route::get('/sign-in', 'UserAuthController@signInPage');

        //使用者登入處理
        Route::post('/sign-in', 'UserAuthController@signInProcess');

        //使用者登出
        Route::get('/sign-out', 'UserAuthController@signOut');

    });

});


//商品
Route::group(['prefix' => 'merchandise'],function(){
    //01 商品資料新增merchandise/create
    Route::get('/create', 'MerchandiseController@merchandiseCreateProcess');
            //->middleware(['user.auth.admin']);

    //04 商品管理清單檢視merchandise/manage
    Route::get('/manage', 'MerchandiseController@merchandiseManageListPage');
            //->middleware(['user.auth.admin']);
            
    //05 商品清單檢視merchandise
    Route::get('/', 'MerchandiseController@merchandiseListPage');
    
 
    
    //指定商品
    Route::group(['prefix' => '{merchandise_id}'],function(){
        //02 商品單品編輯頁面檢視merchandise/1/edit
        Route::get('/edit', 'MerchandiseController@merchandiseItemEditPage');
                //->middleware(['user.auth.admin']);

        //03 商品單品資料修改merchandise/1
        Route::put('/', 'MerchandiseController@merchandiseItemUpdateProcess');
                //->middleware(['user.auth.admin']);

        //06 商品單品檢視merchandise/1
        Route::get('/', 'MerchandiseController@merchandiseItemPage'); 
        
        //07 購買商品merchandise/1/buy
        Route::post('/buy', 'MerchandiseController@merchandiseItemBuyProcess');
                //->middleware(['user.auth']);


    });

});


//交易
Route::get('/transaction','TransactionController@transactionListPage');
        //->middleware(['user.auth']);




//無群組版本
//首頁
/*Route::get('/','HomeController@indexPage');*/

//使用者
/*Route::get('/user/auth/sign-up', 'UserAuthController@signUpPage');
Route::post('/user/auth/sign-up', 'UserAuthController@signUpProcess');
Route::get('/user/auth/sign-in', 'UserAuthController@signInPage');
Route::post('/user/auth/sign-in', 'UserAuthController@signInProcess');
Route::get('/user/auth/sign-out', 'UserAuthController@signOut');
Route::get('/merchandise','MerchandiseController@merchandiseListPage');
Route::get('/merchandise/create','MerchandiseController@merchandiseCreateProcess');
Route::get('/merchandise/manage','MerchandiseController@merchandiseManageListPage');
Route::get('/merchandise/{merchandise_id}','MerchandiseController@merchandiseItemPage');
Route::get('/merchandise/{merchandise_id}','MerchandiseController@merchandiseItemEditPage');
Route::put('/merchandise/{merchandise_id}','MerchandiseController@merchandiseItemUpdateProcess');
Route::post('/merchandise/{merchandise_id}/buy','MerchandiseController@merchandiseItemBuyProcess');*/

//交易
//Route::get('/transaction','TransactionController@transactionListPage');



/* group
//首頁
Route::get('/','HomeController@indexPage');

//使用者
Route::group(['prefix' => 'user'],function(){
     //使用者驗證
    Route::group(['prefix' => 'auth'],function(){
        //使用者註冊頁面
        Route::get('/sign-up', 'UserAuthController@signUpPage');
        //使用者資料新增
        Route::post('/sign-up', 'UserAuthController@signUpProcess');
        Route::get('/sign-in', 'UserAuthController@signInPage');
        Route::post('/sign-in', 'UserAuthController@signInProcess');
        Route::post('/sign-in', 'UserAuthController@signInProcess');
        Route::get('/sign-out', 'UserAuthController@signOut');
    });
});

//商品
Route::group(['prefix' => 'merchandise'], function(){
    Route::get('/','MerchandiseController@merchandiseListPage');
    Route::get('/create','MerchandiseController@merchandiseCreateProcess');
    Route::get('/manage','MerchandiseController@merchandiseManageListPage');
    
    Route::group(['prefix' => '{merchandise_id}'], function(){
        Route::get('/','MerchandiseController@merchandiseItemPage');
        Route::get('/','MerchandiseController@merchandiseItemEditPage');
        Route::put('/','MerchandiseController@merchandiseItemUpdateProcess');
        Route::post('/buy','MerchandiseController@merchandiseItemBuyProcess');

    });


});

//交易
Route::get('/transaction','TransactionController@transactionListPage');

*/










