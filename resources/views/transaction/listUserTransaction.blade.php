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

        <table class="table">
        <tr>
            <th>商品名稱</th>
            <th>圖片</th>
            <th>單價</th>
            <th>數量</th>
            <th>總金額</th>
            <th>購買時間</th>
        </tr>
        
        @foreach($TransactionPaginate as $Transaction)
            <tr>
                <td>
                    
                    {{ $Transaction->Merchandise->name }}
                    </a>
                </td>

                <td>
                   
                    <img src="{{$Transaction->Merchandise->photo or '/assets/images/default-merchandise.png'}}"/>
                    </a>
                </td>

                <td>{{$Transaction->price}}</td>
                <td>{{$Transaction->buy_count}}</td>
                <td>{{$Transaction->total_price}}</td>
                <td>{{$Transaction->created_at}}</td>
                
            </tr>
            @endforeach
        </table>

     <!--分頁頁數按鈕-->
     {{$TransactionPaginate->links()}}
</div>
@endsection
