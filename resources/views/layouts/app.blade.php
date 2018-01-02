<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="/font/thsarabunnew.css">
    <link type="text/css" rel="stylesheet" href="/font/kanit.css">
    <link rel="shortcut icon" href="/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - ต.อ. นิทรรศ ๘ ทศวรรษเตรียมอุดมศึกษา</title>

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        strong {
            color: red;
            font-size: small;
        }

        .theme-color {
            color: #e866a6;
        }

        #s-intro {
            font-family: "Kanit", sans-serif;
            font-weight: 200;
            font-size: 1.4rem;
            background-color: #f4f5fa;
            padding-left: 5%;
            padding-right: 5%;
        }

        .btn.login {
            font-family: "Kanit", sans-serif;
            font-size: 1em;
            background-color: #ce2965;
        }

        .fullpage {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            /* margin-left: calc(-50vw + 50%); */
        }

        .externalLinkImg {
            width: 32px;
            height: 32px;
            margin-right: 5px;
            border-radius: 100%;
        }

        .fullwidth {
            width: 100%
        }

        .btn.fullwidth {
            margin-bottom: 0.3rem
        }

        @yield('style')
    </style>
</head>
<body>
<nav class="pink lighten-2" role="navigation">
    <div class="nav-wrapper container">
        @if(!Request::is('/'))<a id="logo-container" href="/" class="brand-logo white-text" style="font-size: 2rem;">ต.อ. นิทรรศ ๘ ทศวรรษเตรียมอุดมศึกษา</a>@endif
        <ul class="right hide-on-med-and-down">
            <li{{ Route::current()->getName() == 'index' ? " class=active" : '' }}><a href="/">หน้าแรก</a></li>
            @if(!\App\Http\Controllers\UserController::isLoggedIn())
                {{-- <li{{ Route::current()->getName() == 'login' ? " class=active" : '' }}><a href="/login/">เข้าสู่ระบบ</a></li> --}}
                <li{{ Route::current()->getName() == 'login' ? " class=active" : '' }}><a href="/login/">ลงทะเบียน</a></li>
            @else
                <li><a href="/logout/">ออกจากระบบ</a></li>
            @endif
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a class="center" href="/">หน้าแรก</a></li>
            {{-- TODO: Mobile system redesign --}}
            @if(!\App\Http\Controllers\UserController::isLoggedIn())
                <li><a class="center" href="/login/">เข้าสู่ระบบ</a></li>
            @else
                <li><a class="center" href="/logout/">ออกจากระบบ</a></li>
            @endif
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

@yield('pre-content')

<main class="container">
    @yield('content')
</main>

<footer class="page-footer pink lighten-2">
    <div class="container white-text" style="padding-bottom:1rem;">
        งานกิจกรรมพัฒนาผู้เรียน โรงเรียนเตรียมอุดมศึกษา<br />
        227 ถนนพญาไท แขวงปทุมวัน เขตปทุมวัน กรุงเทพมหานคร 10330<br />
        โทรศัพท์: 02-254-0287 ต่อ 157 | โทรสาร: 02-252-7002<br />

        <br />

        <a href="https://clubs.triamudom.ac.th">
            <img class="externalLinkImg" src="/img/tucmc.png"/>
        </a>
        <a href="mailto:triam.club@gmail.com">
            <img class="externalLinkImg" src="/img/mail.png"/>
        </a>
        <a href="https://www.facebook.com/TriamUdomOPH/">
            <img class="externalLinkImg" src="/img/facebook.png"/>
        </a>
        <br/>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <span class="hide-on-screen">โรงเรียนเตรียมอุดมศึกษา | คณะกรรมการงานกิจกรรมพัฒนาผู้เรียน</span>
        </div>
    </div>
</footer>

<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/js/materialize.min.js"></script>

@yield('script')
<script>
    $(document).ready(function(){
        $(".button-collapse").sideNav();
        @yield('startup-js')
    });
</script>

</body>
</html>