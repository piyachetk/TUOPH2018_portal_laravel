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
    <meta name="keywords" content="Triam Udom Open House TU OpenHouse เตรียมอุดม นิทรรศการ ต.อ. นิทรรศ"/>
    <meta name="description" content="งานนิทรรศการที่ยิ่งใหญ่ที่สุดในประวัติศาสตร์โรงเรียนเตรียมอุดมศึกษา 11-13 มกราคม 2561"/>
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

        h3, h4, h5 {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
        }

        .theme-color {
            color: #e866a6;
        }

        #header .subtitle {
            font-weight: 100;
        }

        @media screen and (min-width: 769px) {
            #header {
                width: 100%;
                height: 95vh;
                background: #CA849C url("/img/background.jpg") no-repeat center center;
                background-size: cover;
                position: relative;
                min-height: 400px;

                padding: 100px;
                color: white;
            }

            .th {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                padding-top: 30px;
                align-items: flex-end;
            }

            .left-item { margin-right: 50px; }

            .subtitle { font-size: 2.5em; }

            .date { margin-top: 70px; }
        }

        @media screen and (max-width: 768px) {
            #header .container {
                width: 100vw;
                position: relative;
                left: 50%;
                right: 50%;
                margin-left: -50vw;
                margin-right: -50vw;
            }

            #header {
                width: 100%;
                position: relative;

                text-align: center;
                color: black;
            }
        }

        #s-intro {
            font-family: "Kanit", sans-serif;
            font-weight: 200 !important;
            font-size: 1.4rem !important;
            background-color: #f4f5fa;
            padding-left: 5%;
            padding-right: 5%;
        }

        .btn.login, .btn.logout {
            font-family: "Kanit", sans-serif;
            font-size: 1em;
            background-color: #ce2965;
        }

        .nav {
            font-family: "Kanit", sans-serif;
        }

        .light-text {
            font-weight: 200;
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

        .nobr {
            white-space: nowrap;
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
@if(!Request::is('/'))
<nav class="nav pink lighten-2" role="navigation">
    <div class="nav-wrapper container">
        @if(!Request::is('/'))
            <a id="logo-container" href="/" class="brand-logo white-text hide-on-small-only" style="font-size: 1.8rem;">ต.อ. นิทรรศ ๘ ทศวรรษเตรียมอุดมศึกษา</a>
            <a id="logo-container" href="/" class="brand-logo white-text hide-on-med-and-up" style="font-size: 1.8rem;">ต.อ. นิทรรศ</a>
        @endif
        <ul class="right hide-on-med-and-down light-text">
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
                <li><a class="center" href="/login/">ลงทะเบียน</a></li>
            @else
                <li><a class="center" href="/logout/">ออกจากระบบ</a></li>
            @endif
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
@endif

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