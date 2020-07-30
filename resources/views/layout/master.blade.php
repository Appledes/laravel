<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')-Shop Laravel</title>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" defer></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css">

    </head>

    <body>
        <header>
                <ul class="nav">
                                @if(session()->has('user_id'))
                                        <li><a href="/user/auth/sign-out">登出</a></li>
                                @else
                                        <li><a href="/user/auth/sign-in">登入</a></li>&nbsp&nbsp
                                        <li><a href="/user/auth/sign-up">註冊</a></li> 
                                @endif
                </ul>
        </header>

        <div class="container">
             @yield('content')
        </div>

        <footer>
            <a href="#">聯絡我們</a>
        </footer>
    </body>
</html>