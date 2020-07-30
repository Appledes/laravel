<!--指定繼承layout.master母模板-->
@extends('layout.master')

<!--傳送資料到母模板,並指定變數為title-->
@section('title',$title)

<!--傳送資料到母模板,並指定變數為content-->
@section('content')

        <div class="container">
                <h2>{{$title}}</h2>

                <!--錯誤訊息模板元件-->
                @include('components.validationErrorMessage')

                <form action="/user/auth/sign-in" method="post">
                        <label>
                        Email:
                        <input type="text"
                                name="email"
                                placeholder="Email"
                                value="{{old('email')}}"
                        >
                        </label>

                        <label>
                        密碼:
                        <input type="password"
                                name="password"
                                placeholder="密碼"
                        >
                        </label>

                        <button type="submit">登入</button>

                        <!--csrf_token欄位-->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
       
                       
@endsection